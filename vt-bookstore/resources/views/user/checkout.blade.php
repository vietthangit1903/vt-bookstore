@extends('layout.master')

@section('title')
    Shop Order
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Checkout</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('home') }}" class="h-primary">Home</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="#" class="h-primary">Shop</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Checkout
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div id="content" class="site-content bg-blue-light space-bottom-3">
        <div class="col-full container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <article id="post-6" class="post-6 page type-page status-publish hentry">
                        <header class="entry-header space-top-2 space-bottom-1 mb-2">
                            <h4 class="entry-title font-size-7 text-center">Checkout</h4>
                        </header>

                        <div class="entry-content">
                            <div class="woocommerce">
                                <form name="checkout" id="checkout" method="post"
                                    class="checkout woocommerce-checkout row mt-8" action="{{ route('user.checkout') }}" novalidate="novalidate">
                                    @csrf
                                    <div class="col2-set col-md-6 col-lg-7 col-xl-8 mb-6 mb-md-0" id="customer_details">
                                        <div class="px-4 pt-5 bg-white border">
                                            <div class="woocommerce-billing-fields">
                                                <h3 class="mb-4 font-size-3">Billing details</h3>
                                                <div class="woocommerce-billing-fields__field-wrapper row">

                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="fullName_field"
                                                        data-priority="30">
                                                        Full name: {{ Auth::user()->fullName }}
                                                    </p>
                                                    <p class="col-12 mb-4d75 form-row form-row-wide" id="fullName_field"
                                                        data-priority="30">
                                                        Email address: {{ Auth::user()->email }}
                                                    </p>
                                                    <p class="col-12 mb-4d75 form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated"
                                                        id="address_id_field" data-priority="40">
                                                        <label for="address" class="form-label">Address <span
                                                                class="required text-red-1"
                                                                title="required">*</span></label>
                                                        <select name="address_id" id="address_id"
                                                            class="form-control country_to_state country_select  select2-hidden-accessible"
                                                            autocomplete="country" aria-hidden="true">
                                                            <option value="" selected>Select an address…</option>
                                                            @foreach ($addresses as $address)
                                                                <option value="{{ $address->id }}">{{ $address->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </p>
                                                    <div class="col-12 mb-3 form-row form-row-wide address-field validate-required"
                                                        id="address_field" data-priority="50">
                                                        <label id="addressDetailLabel" class="form-label"
                                                            for="addressDetail">Address Detail
                                                            <span class="text-red-1">*</span></label>
                                                        <input type="text"
                                                            class="form-control height-4 rounded-0 px-4 @error('addressDetail') is-invalid @enderror"
                                                            name="addressDetail" id="addressDetail"
                                                            aria-describedby="addressDetailLabel"
                                                            @if (old('addressDetail')) value="{{ old('addressDetail') }}" @endif
                                                            required>
                                                        <div
                                                            class="form-message @error('addressDetail') invalid-feedback @enderror">
                                                            @error('addressDetail')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 id="order_review_heading" class="d-none">Your order</h3>
                                    <div id="order_review"
                                        class="col-md-6 col-lg-5 col-xl-4 woocommerce-checkout-review-order">
                                        <div id="checkoutAccordion" class="border border-gray-900 bg-white mb-5">
                                            <div class="p-4d875 border">
                                                <div id="checkoutHeadingOnee" class="checkout-head">
                                                    <a href="#"
                                                        class="text-dark d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse" data-target="#checkoutCollapseOnee"
                                                        aria-expanded="true" aria-controls="checkoutCollapseOnee">
                                                        <h3 class="checkout-title mb-0 font-weight-medium font-size-3">
                                                            Your order</h3>
                                                        <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15px"
                                                            height="2px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                        </svg>
                                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15px"
                                                            height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div id="checkoutCollapseOnee" class="mt-4 checkout-content collapse show"
                                                    aria-labelledby="checkoutHeadingOnee"
                                                    data-parent="#checkoutAccordion">
                                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                                        <thead class="d-none">
                                                            <tr>
                                                                <th class="product-name">Product</th>
                                                                <th class="product-total">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cartDetails as $item)
                                                                <tr class="cart_item">
                                                                <td class="product-name">
                                                                    {{$item->book->name}} <strong
                                                                        class="product-quantity">x {{$item->quantity}}</strong>
                                                                </td>
                                                                <td class="product-total">
                                                                    <span class="woocommerce-Price-amount amount"><span
                                                                            class="woocommerce-Price-currencySymbol">$</span>{{$item->quantity * $item->price}}</span>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                        <tfoot class="d-none">
                                                            <tr class="cart-subtotal">
                                                                <th>Subtotal</th>
                                                                <td><span class="woocommerce-Price-amount amount"><span
                                                                            class="woocommerce-Price-currencySymbol">$</span>{{$total}}</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="order-total">
                                                                <th>Total</th>
                                                                <td><strong><span
                                                                            class="woocommerce-Price-amount amount"><span
                                                                                class="woocommerce-Price-currencySymbol">$</span>{{$total}}</span></strong>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="p-4d875 border">
                                                <div id="checkoutHeadingOne" class="checkout-head">
                                                    <a href="#"
                                                        class="text-dark d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse" data-target="#checkoutCollapseOne"
                                                        aria-expanded="true" aria-controls="checkoutCollapseOne">
                                                        <h3 class="checkout-title mb-0 font-weight-medium font-size-3">
                                                            Cart Totals</h3>
                                                        <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15px"
                                                            height="2px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                        </svg>
                                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15px"
                                                            height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div id="checkoutCollapseOne" class="mt-4 checkout-content collapse show"
                                                    aria-labelledby="checkoutHeadingOne" data-parent="#checkoutAccordion">
                                                    <table class="shop_table shop_table_responsive">
                                                        <tbody>
                                                            <tr class="checkout-subtotal">
                                                                <th>Subtotal</th>
                                                                <td data-title="Subtotal"><span
                                                                        class="woocommerce-Price-amount amount"><span
                                                                            class="woocommerce-Price-currencySymbol">$</span>{{$total}}</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="order-shipping">
                                                                <th>Shipping</th>
                                                                <td data-title="Shipping">Free Shipping</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="p-4d875 border">
                                                <table class="shop_table shop_table_responsive">
                                                    <tbody>
                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td data-title="Total"><strong><span
                                                                        class="woocommerce-Price-amount amount"><span
                                                                            class="woocommerce-Price-currencySymbol">$</span>{{$total}}</span></strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="p-4d875 border">
                                                <div id="checkoutHeadingThreee" class="checkout-head">
                                                    <a href="#"
                                                        class="text-dark d-flex align-items-center justify-content-between"
                                                        data-toggle="collapse" data-target="#checkoutCollapseThreee"
                                                        aria-expanded="true" aria-controls="checkoutCollapseThreee">
                                                        <h3 class="checkout-title mb-0 font-weight-medium font-size-3">
                                                            Payment</h3>
                                                        <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15px"
                                                            height="2px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                                        </svg>
                                                        <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="15px"
                                                            height="15px">
                                                            <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div id="checkoutCollapseThreee"
                                                    class="mt-4 checkout-content collapse show"
                                                    aria-labelledby="checkoutHeadingThreee"
                                                    data-parent="#checkoutAccordion">
                                                    <div id="payment" class="woocommerce-checkout-payment">
                                                        <ul class="wc_payment_methods payment_methods methods">
                                                            <li class="wc_payment_method payment_method_vnpay">
                                                                <input id="payment_method_vnpay" type="radio"
                                                                    class="input-radio" name="payment_method"
                                                                    value="vnpay" checked="checked">
                                                                <label for="payment_method_vnpay">Direct bank transfer
                                                                    through VNPay
                                                                </label>
                                                                <div class="payment_box payment_method_vnpay"
                                                                    style="display: block;">
                                                                    <p>Make your payment directly into our bank account.
                                                                        Please use your Order ID as the payment
                                                                        reference. Your order won't be shipped until the
                                                                        funds have cleared in our account.</p>
                                                                </div>
                                                            </li>
                                                            <li class="wc_payment_method payment_method_cheque">
                                                                <input id="payment_method_cheque" type="radio"
                                                                    class="input-radio" name="payment_method"
                                                                    value="chkpayment">
                                                                <label for="payment_method_cheque">Check payments
                                                                </label>
                                                                <div class="payment_box payment_method_cheque"
                                                                    style="display: block;">
                                                                    <p>Please send a check to Store Name, Store Street,
                                                                        Store Town, Store State / County, Store
                                                                        Postcode.</p>
                                                                </div>
                                                            </li>
                                                            <li class="wc_payment_method payment_method_cod">
                                                                <input id="payment_method_cod" type="radio"
                                                                    class="input-radio" name="payment_method"
                                                                    value="cod">
                                                                <label for="payment_method_cod">Cash on delivery
                                                                </label>
                                                                <div class="payment_box payment_method_cod"
                                                                    style="display: block;">
                                                                    <p>Pay with cash upon delivery.</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row place-order">
                                            <button type="submit"
                                                class="button alt btn btn-dark btn-block rounded-0 py-4">Place
                                                order</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </article>

                </main>

            </div>

        </div>

    </div>
@endsection
@section('custom_js')
    <script>
        Validator({
            form: '#checkout',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#addressDetail', 'Please enter your address detail'),
                Validator.maxLength('#addressDetail', 255,
                    'Your address detail length must not exceed 255 words'),
            ]
        });
        $(document).ready(function() {
            $(document).on('change', 'select#address_id', function(event) {
                var addressDetailInput = $('input#addressDetail');
                $.ajax({
                    method: "GET",
                    url: "http://127.0.0.1:8000/user/ajax-address",
                    data: {
                        id: this.value
                    }
                }).done(function(response) {
                    addressDetailInput.val(response.addressDetail)
                }).fail(function() {
                    addressDetailInput.val("")
                });
            });
        });
    </script>
@endsection
