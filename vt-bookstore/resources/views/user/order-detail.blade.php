@extends('layout.master')

@section('title')
    Order details
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Order detail</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('home') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="#" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Order details
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="bg-blue-light space-bottom-3">
            <div class="container">
                <div class="py-5 py-lg-7">
                    <h6 class="font-weight-medium font-size-7 text-center mt-lg-1">Order Details</h6>
                </div>
                <div class="max-width-890 mx-auto">
                    <div class="bg-white pt-6 border">
                        <h6 class="font-size-3 font-weight-medium text-center mb-4 pb-xl-1">Thank you. Your order has
                            been received.</h6>
                        <div class="border-bottom mb-5 pb-5 overflow-auto overflow-md-visible">
                            <div class="pl-3">
                                <table class="table table-borderless mb-0 ml-1">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="font-size-2 font-weight-normal py-0">Order ID:
                                            </th>
                                            <th scope="col" class="font-size-2 font-weight-normal py-0">Date:</th>
                                            <th scope="col" class="font-size-2 font-weight-normal py-0 text-md-center">
                                                Total: </th>
                                            <th scope="col" class="font-size-2 font-weight-normal py-0 text-md-center">
                                                Order status: </th>
                                            <th scope="col" class="font-size-2 font-weight-normal py-0 text-md-center">
                                                Payment method:</th>
                                            <th scope="col"
                                                class="font-size-2 font-weight-normal py-0 text-md-right pr-md-4">
                                                Payment status:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="pr-0 py-0 font-weight-medium">#{{ $order->id }}
                                            </th>
                                            <td class="pr-0 py-0 font-weight-medium">
                                                {{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                                            <td class="pr-0 py-0 font-weight-medium">${{ $order->totalPrice }}</td>
                                            <td class="pr-0 py-0 font-weight-medium text-md-center">
                                                {{ $order->orderStatus }}</td>
                                                @php
                                                    $paymentMethod = "";
                                                    switch ($order->paymentMethod) {
                                                        case 'vnpay':
                                                            $paymentMethod = "Payment via VNPay";
                                                            break;
                                                        case 'chkpayment':
                                                            $paymentMethod = "Check payments";
                                                            break;
                                                        case 'cod':
                                                            $paymentMethod = "Cash on delivery";
                                                            break;
                                                        
                                                        default:
                                                            break;
                                                    }
                                                @endphp
                                            <td class="py-0 font-weight-medium text-md-center">{{$paymentMethod}}</td>
                                            <td class="py-0 font-weight-medium text-md-right pr-md-4">{{ $order->paymentStatus }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="border-bottom mb-5 pb-6">
                            <div class="px-3 px-md-4">
                                <div class="ml-md-2">
                                    <h6 class="font-size-3 on-weight-medium mb-4 pb-1">Order Details</h6>
                                    @foreach ($orderDetails as $orderDetail)
                                        <div class="d-flex justify-content-between mb-4">
                                        <div class="d-flex align-items-baseline">
                                            <div>
                                                <h6 class="font-size-2 font-weight-normal mb-1">{{$orderDetail->book->name}}</h6>
                                            </div>
                                            <span class="font-size-2 ml-4 ml-md-8">x{{$orderDetail->quantity}}</span>
                                        </div>
                                        <span class="font-weight-medium font-size-2">${{$orderDetail->quantity * $orderDetail->price}}</span>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="border-bottom mb-5 pb-5">
                            <ul class="list-unstyled px-3 pl-md-5 pr-md-4 mb-0">
                                <li class="d-flex justify-content-between py-2">
                                    <span class="font-weight-medium font-size-2">Subtotal:</span>
                                    <span class="font-weight-medium font-size-2">${{ $order->totalPrice }}</span>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span class="font-weight-medium font-size-2">Shipping:</span>
                                    <span class="font-weight-medium font-size-2">Free Shipping</span>
                                </li>
                                <li class="d-flex justify-content-between pt-2">
                                    <span class="font-weight-medium font-size-2">Payment Method:</span>
                                    <span class="font-weight-medium font-size-2">{{$paymentMethod}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="border-bottom mb-5 pb-4">
                            <div class="px-3 pl-md-5 pr-md-4">
                                <div class="d-flex justify-content-between">
                                    <span class="font-size-2 font-weight-medium">Total</span>
                                    <span class="font-weight-medium fon-size-2">${{ $order->totalPrice }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-3 pl-md-5 pr-md-4 mb-6 pb-xl-1">
                            <div class="row row-cols-1 row-cols-md-2">
                                <div class="col">
                                    <h6 class="font-weight-medium font-size-22 mb-3">Shipping Address
                                    </h6>
                                    <address class="d-flex flex-column mb-0">
                                        <span class="text-gray-600 font-size-2">{{$order->address->address}}</span>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
