<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\OrderRequest;
use App\Models\Address;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Ol;

class OrderController extends Controller
{
    public function showCheckoutView()
    {
        $user = Auth::user();
        $addresses = Address::where('user_id', $user->id)->get();
        $cartDetails = CartDetail::whereBelongsTo($user)->get();
        $total = 0;
        foreach ($cartDetails as $cartDetail) {
            $total += $cartDetail->price * $cartDetail->quantity;
        }
        $data = [
            'addresses' => $addresses,
            'cartDetails' => $cartDetails,
            'total' => $total
        ];
        return view('user.checkout', $data);
    }

    public function checkout(OrderRequest $request)
    {
        $user = User::find(Auth::id());
        $inputs = $request->validated();
        $address = null;
        if (!$inputs['address_id']) {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $name = "New profile " . date("d-m-Y H:i:s");
            $address = $user->addresses()->create([
                'name' => $name,
                'address' => $inputs['addressDetail'],
                'user_id' => Auth::id(),
            ]);

            if (!$address)
                return back()->withInput($inputs)->with('error', 'An error occurred while creating a new address.');
        } else {
            $address = Address::find($inputs['address_id']);
        }
        $cartDetails = CartDetail::whereBelongsTo($user)->get();
        $total = 0;
        foreach ($cartDetails as $cartDetail) {
            $total += $cartDetail->price * $cartDetail->quantity;
        }
        $order = $user->orders()->create([
            'totalPrice' => $total,
            'paymentMethod' => $inputs['payment_method'],
            'address_id' => $address->id,
        ]);
        foreach ($cartDetails as $cartDetail) {
            $order->order_details()->create([
                'price' => $cartDetail->price,
                'quantity' => $cartDetail->quantity,
                'order_id' => $order->id,
                'book_id' => $cartDetail->book_id,
            ]);
            $cartDetail->delete();
        }
        // Todo: neu payment method la vnpay chuyen huong sang trang vnpay de thanh toan
        // Neu khong chuyen huong den trang order received voi tham so la order id.
        if($order->paymentMethod!= 'vnpay')
            return redirect()->route('user.order-detail', ['order_id' => $order->id]);
        dd('done');
    }

    public function RedirectVNPayPayment(Order $order){
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        $vnp_Url = env('VNPAY_URL');
        $vnp_Returnurl = env('VNPAY_RETURNURL');
        $vnp_TmnCode = env('VNPAY_TMNCODE');//Mã website tại VNPAY 
        $vnp_HashSecret = env('VNPAY_HASHSECRECT'); //Chuỗi bí mật
        
        $vnp_TxnRef = $_POST['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $_POST['order_desc'];
        $vnp_OrderType = $_POST['order_type'];
        $vnp_Amount = $_POST['amount'] * 100;
        $vnp_Locale = $_POST['language'];
        $vnp_BankCode = $_POST['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = $_POST['txtexpire'];
        //Billing
        $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
        $vnp_Bill_Email = $_POST['txt_billing_email'];
        $fullName = trim($_POST['txt_billing_fullname']);
        if (isset($fullName) && trim($fullName) != '') {
            $name = explode(' ', $fullName);
            $vnp_Bill_FirstName = array_shift($name);
            $vnp_Bill_LastName = array_pop($name);
        }
        $vnp_Bill_Address=$_POST['txt_inv_addr1'];
        $vnp_Bill_City=$_POST['txt_bill_city'];
        $vnp_Bill_Country=$_POST['txt_bill_country'];
        $vnp_Bill_State=$_POST['txt_bill_state'];
        // Invoice
        $vnp_Inv_Phone=$_POST['txt_inv_mobile'];
        $vnp_Inv_Email=$_POST['txt_inv_email'];
        $vnp_Inv_Customer=$_POST['txt_inv_customer'];
        $vnp_Inv_Address=$_POST['txt_inv_addr1'];
        $vnp_Inv_Company=$_POST['txt_inv_company'];
        $vnp_Inv_Taxcode=$_POST['txt_inv_taxcode'];
        $vnp_Inv_Type=$_POST['cbo_inv_type'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,
            "vnp_Bill_Mobile"=>$vnp_Bill_Mobile,
            "vnp_Bill_Email"=>$vnp_Bill_Email,
            "vnp_Bill_FirstName"=>$vnp_Bill_FirstName,
            "vnp_Bill_LastName"=>$vnp_Bill_LastName,
            "vnp_Bill_Address"=>$vnp_Bill_Address,
            "vnp_Bill_City"=>$vnp_Bill_City,
            "vnp_Bill_Country"=>$vnp_Bill_Country,
            "vnp_Inv_Phone"=>$vnp_Inv_Phone,
            "vnp_Inv_Email"=>$vnp_Inv_Email,
            "vnp_Inv_Customer"=>$vnp_Inv_Customer,
            "vnp_Inv_Address"=>$vnp_Inv_Address,
            "vnp_Inv_Company"=>$vnp_Inv_Company,
            "vnp_Inv_Taxcode"=>$vnp_Inv_Taxcode,
            "vnp_Inv_Type"=>$vnp_Inv_Type
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }

    public function VNPayReturn(){

    }

    public function showOrderList(){
        $user = Auth::user();
        $order = Order::whereBelongsTo($user)->paginate(10);
        return view('user.order-list', ['paginator' => $order]);
    }

    public function showOrderDetail($order_id){
        $user = Auth::user();
        $order = Order::where([
            ['user_id', '=', $user->id],
            ['id', '=', $order_id],
        ])->first();
        if($order){
            $orderDetails = OrderDetail::whereBelongsTo($order)->get();
            $data = [
                'order' => $order,
                'orderDetails' => $orderDetails
            ];
            return view('user.order-detail', $data);
        }
        return back()->with('info', 'Your order is not found.');
    }

}
