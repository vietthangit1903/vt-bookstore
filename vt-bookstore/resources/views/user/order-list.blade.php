@extends('layout.master')

@section('title')
    Order list
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Order list</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('home') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="#" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Order list
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-8 col-md-8 col-sm-12 my-5">
            <div class="text-center mb-5">
                <h5 class="font-size-7 font-weight-medium">Order list</h5>
            </div>
            @if ($paginator->total() != 0)
                <table class="shop_table shop_table_responsive cart mb-2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Order status</th>
                            <th>Payment method</th>
                            <th>Payment status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginator as $item)
                            <tr class="cart_item">
                                <td>
                                    {{$item->id}}
                                </td>
                                <td>{{date('d/m/Y', strtotime($item->created_at))}}</td>
                                <td>${{$item->totalPrice}}</td>
                                <td>{{$item->orderStatus}}</td>
                                @switch($item->paymentMethod)
                                    @case('vnpay')
                                        <td>Payment via VNPay</td>
                                        @break
                                    @case('chkpayment')
                                        <td>Check payments</td>
                                        @break
                                    @case('cod')
                                        <td>Cash on delivery</td>
                                        @break
                                    @default
                                        
                                @endswitch
                                
                                <td>{{$item->paymentStatus}}</td>
                                <td>
                                    <a href="{{ route('user.order-detail', ['order_id'=>$item->id]) }}" title="View detail order" class="table-link font-size-5"><i
                                            class="fa-solid fa-circle-info"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                @include('layout.pagination')
            @else
            <h4 class="text-center">Your order list is empty</h4>
            @endif

        </div>
    </main>
@endsection
