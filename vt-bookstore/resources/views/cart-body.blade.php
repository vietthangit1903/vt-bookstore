<div class="container cart-container">
    @if ($amount > 0)
        <header class="entry-header space-top-2 space-bottom-1 mb-2">
            <h1 class="entry-title font-size-7">Your cart: {{ $amount }} book(s)</h1>
        </header>
        <div class="row pb-8">
            <div id="primary" class="content-area">
                <main id="main" class="site-main ">
                    <div class="page type-page status-publish hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="custom-table">
                                    <table class="shop_table shop_table_responsive cart">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                                <th class="product-remove">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cartDetails as $item)
                                                <tr class="woocommerce-cart-form__cart-item cart_item">
                                                    <td class="product-name" data-title="Product">
                                                        <div class="d-flex align-items-center">
                                                            <a href="">
                                                                <img src="{{ asset($item->book->bookImages[0]->image_path) }}"
                                                                    class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                                    alt=""
                                                                    style="width: 90px; height: 138px; object-fit: contain">
                                                            </a>
                                                            <div class="ml-3 m-w-200-lg-down">
                                                                <a
                                                                    href="{{ route('bookDetail', ['book_id' => $item->book->id]) }}">{{ $item->book->name }}</a>
                                                                <a href="#"
                                                                    class="text-gray-700 font-size-2 d-block"
                                                                    tabindex="0">{{ $item->book->author->name }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-price" data-title="Price">
                                                        <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">$</span>{{ $item->price }}</span>
                                                    </td>
                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="quantity d-flex align-items-center">

                                                            <div class="border px-3 width-120">
                                                                <div class="js-quantity">
                                                                    <div class="d-flex align-items-center">
                                                                        <label
                                                                            class="screen-reader-text sr-only">Quantity</label>
                                                                        <a class="js-minus text-dark"
                                                                            href="javascript:;">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="10px" height="1px">
                                                                                <path fill-rule="evenodd"
                                                                                    fill="rgb(22, 22, 25)"
                                                                                    d="M-0.000,-0.000 L10.000,-0.000 L10.000,1.000 L-0.000,1.000 L-0.000,-0.000 Z" />
                                                                            </svg>
                                                                        </a>
                                                                        <input type="number"
                                                                            class="input-text qty quantity text js-result form-control text-center border-0"
                                                                            step="1" min="1" max="{{ ($item->book->stock + $item->quantity )}}"
                                                                            name="quantity" data-id="{{$item->id}}" data-csrf="{{ csrf_token() }}"
                                                                            value="{{ $item->quantity }}"
                                                                            title="Book quantity">
                                                                        <a class="js-plus text-dark"
                                                                            href="javascript:;">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                width="10px" height="10px">
                                                                                <path fill-rule="evenodd"
                                                                                    fill="rgb(22, 22, 25)"
                                                                                    d="M10.000,5.000 L6.000,5.000 L6.000,10.000 L5.000,10.000 L5.000,5.000 L-0.000,5.000 L-0.000,4.000 L5.000,4.000 L5.000,-0.000 L6.000,-0.000 L6.000,4.000 L10.000,4.000 L10.000,5.000 Z" />
                                                                            </svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal" data-title="Total">
                                                        <span class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">$</span>{{ $item->quantity * $item->price }}</span>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="{{ route('user.deleteSingleCartDetail') }}"
                                                            class="remove-cart-detail" aria-label="Remove this item"
                                                            data-id="{{ $item->id }}"
                                                            data-csrf="{{ csrf_token() }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                width="15px" height="15px">
                                                                <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                                                    d="M15.011,13.899 L13.899,15.012 L7.500,8.613 L1.101,15.012 L-0.012,13.899 L6.387,7.500 L-0.012,1.101 L1.101,-0.012 L7.500,6.387 L13.899,-0.012 L15.011,1.101 L8.613,7.500 L15.011,13.899 Z" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>
            <div id="secondary" class="sidebar cart-collaterals order-1" role="complementary">
                <div id="cartAccordion" class="border border-gray-900 bg-white mb-5">
                    <div class="p-4d875 border">
                        <div id="cartHeadingOne" class="cart-head">
                            <a class="d-flex align-items-center justify-content-between text-dark" href="#"
                                data-toggle="collapse" data-target="#cartCollapseOne" aria-expanded="true"
                                aria-controls="cartCollapseOne">
                                <h3 class="cart-title mb-0 font-weight-medium font-size-3">Cart Totals</h3>
                                <svg class="mins" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="2px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                        d="M0.000,-0.000 L15.000,-0.000 L15.000,2.000 L0.000,2.000 L0.000,-0.000 Z" />
                                </svg>
                                <svg class="plus" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="15px" height="15px">
                                    <path fill-rule="evenodd" fill="rgb(22, 22, 25)"
                                        d="M15.000,8.000 L9.000,8.000 L9.000,15.000 L7.000,15.000 L7.000,8.000 L0.000,8.000 L0.000,6.000 L7.000,6.000 L7.000,-0.000 L9.000,-0.000 L9.000,6.000 L15.000,6.000 L15.000,8.000 Z" />
                                </svg>
                            </a>
                        </div>
                        <div id="cartCollapseOne" class="mt-4 cart-content collapse show"
                            aria-labelledby="cartHeadingOne" data-parent="#cartAccordion">
                            <table class="shop_table shop_table_responsive">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>{{ $total }}</span>
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
                                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span
                                                    class="woocommerce-Price-currencySymbol">$</span>{{ $total }}</span></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="wc-proceed-to-checkout">
                    <a href="#"
                        class="checkout-button button alt wc-forward btn btn-dark btn-block rounded-0 py-4">Proceed
                        to checkout</a>
                </div>
            </div>
        </div>
    @else
        <div class="my-9 text-center">
            <h3 class="text-dark my-5">Your cart is empty</h3>
        </div>
    @endif
</div>
