<header class="border-bottom px-4 px-md-6 py-4">
    <h2 class="font-size-3 mb-0 d-flex align-items-center"><i class="fa-solid fa-bag-shopping mr-3 font-size-5"></i>Your
        book cart {{ $amount ? "($amount)" : '' }}</h2>
</header>

@if ($amount > 0)
@foreach ($cartDetails as $item)
    <div class="px-4 py-5 px-md-6 border-bottom">
        <div class="media">
            <a href="{{ route('bookDetail', ['book_id' => $item->book->id]) }}" class="d-block"><img src="{{asset($item->book->bookImages[0]->image_path)}}" class="img-fluid"
                    alt="image-description" style="width: 120px; height: 180px; object-fit: contain"></a>
            <div class="media-body ml-4d875">
                <h2 class="woocommerce-loop-product__title h6 text-lh-md mb-1 text-height-2 crop-text-2">
                    <a href="{{ route('bookDetail', ['book_id' => $item->book->id]) }}" class="text-dark">{{$item->book->name}}</a>
                </h2>
                <div class="font-size-2 mb-1 text-truncate"><a href="#" class="text-gray-700">{{$item->book->author->name}}</a>
                </div>
                <div class="price d-flex align-items-center font-weight-medium font-size-3">
                    <span class="woocommerce-Price-amount amount">{{$item->quantity}} x <span
                            class="woocommerce-Price-currencySymbol">$</span>{{$item->price}} = ${{$item->quantity * $item->price}}</span>
                </div>
            </div>
            <div class="mt-3 ml-3">
                <a href="{{ route('user.deleteSingleCartDetail') }}" class="btn rounded-0 btn-dark delete-detail" data-id="{{$item->id}}" data-csrf="{{ csrf_token() }}"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </div>
@endforeach
    
    <div class="px-4 py-5 px-md-6 d-flex justify-content-between align-items-center font-size-3">
        <h4 class="mb-0 font-size-3">Subtotal:</h4>
        <div class="font-weight-medium">${{$total}}</div>
    </div>
    <div class="px-4 mb-8 px-md-6">
        <a href="{{ route('cart') }}" class="btn btn-block py-4 rounded-0 btn-outline-dark mb-4">View Cart</a>
        <a href="{{ route('user.checkout') }}" class="btn btn-block py-4 rounded-0 btn-dark">Checkout</a>
    </div>
@else
    <div class="px-4 mb-8 px-md-6 text-center">
        <h3 class="text-dark my-5">Your cart is empty</h3>
    </div>
@endif
