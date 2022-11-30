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
        if ($order->paymentMethod != 'vnpay')
            return redirect()->route('user.order-detail', ['order_id' => $order->id]);
        return $this->RedirectVNPayPayment($order);
    }

    public function payOrderVNPay($order_id)
    {
        $user = Auth::user();
        $order = Order::where([
            ['user_id', '=', $user->id],
            ['id', '=', $order_id],
        ])->first();
        if ($order) {
            $order->paymentMethod = 'vnpay';
            $order->save();
            return $this->RedirectVNPayPayment($order);
        }
        return back()->with('info', 'Your order is not found.');
    }

    public function RedirectVNPayPayment(Order $order)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $vnp_Url = env('VNPAY_URL');
        $vnp_Returnurl = env('VNPAY_RETURN_URL');
        $vnp_TmnCode = env('VNPAY_TMN_CODE'); //Mã website tại VNPAY 
        $vnp_HashSecret = env('VNPAY_HASH_SECRECT'); //Chuỗi bí mật

        $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Payment for book order with id is " . $order->id;
        $vnp_OrderType = "Book";
        $vnp_Amount = $order->totalPrice * 100 * 24645;
        $vnp_Locale = "en";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        $vnp_ExpireDate = date('YmdHis', strtotime("+1 day"));

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
            "vnp_ExpireDate" => $vnp_ExpireDate,
        );

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
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        header('Location: ' . $vnp_Url);
        die();
    }

    public function VNPayReturn()
    {
        $vnp_HashSecret = env('VNPAY_HASH_SECRECT'); //Chuỗi bí mật
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $order_id = $inputData['vnp_TxnRef'];
        $order = Order::find($order_id);
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                $order->paymentStatus = "Paid";
                $order->transactionId = $inputData['vnp_TransactionNo'];
                $order->transDate = $inputData['vnp_PayDate'];
                $order->save();
                return redirect()->route('user.order-detail', ['order_id' => $order->id]);
            } else {
                return redirect()->route('user.order-detail', ['order_id' => $order->id, 'orderFailed' => true]);
            }
        } else {
            return redirect()->route('user.order-detail', ['order_id' => $order->id, 'orderFailed' => true]);
        }
    }

    public function showOrderList()
    {
        $user = Auth::user();
        $order = Order::whereBelongsTo($user)->paginate(10);
        return view('user.order-list', ['paginator' => $order]);
    }

    public function showOrderDetail($order_id, Request $request)
    {
        $user = Auth::user();
        $orderFailed = $request->query('orderFailed');
        $order = Order::where([
            ['user_id', '=', $user->id],
            ['id', '=', $order_id],
        ])->first();
        if ($order) {
            $orderDetails = OrderDetail::whereBelongsTo($order)->get();
            $data = [
                'order' => $order,
                'orderDetails' => $orderDetails
            ];
            if($orderFailed)
            $data['orderFailed'] = true;
            return view('user.order-detail', $data);
        }
        return back()->with('info', 'Your order is not found.');
    }
}
