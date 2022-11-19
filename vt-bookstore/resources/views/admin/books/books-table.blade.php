<div class="custom-table">

    @if ($paginator->total() == 0)
        <div class="text-center mb-5">
            <h5 class="font-size-7 font-weight-medium">List of books is empty</h5>
        </div>
    @else
        <table class="shop_table shop_table_responsive cart mb-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($paginator as $book)
                    <tr class="cart_item">
                        <td>{{ $book->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.update-book', ['id'=>$book->id]) }}" class="border-dark">
                                    <img 
                                    src="{{asset($book->bookImages[0]->image_path)}}"
                                        class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image "
                                        alt="Book image" width="90" height="138" style="object-fit: cover">
                                </a>
                                <div class="ml-3 m-w-200-lg-down">
                                    <a href="{{ route('admin.update-book', ['id'=>$book->id]) }}">{{ $book->name }}</a>
                                    <a href="{{ route('admin.authors', ['id' => $book->author->id]) }}"
                                        class="text-gray-700 font-size-2 d-block"
                                        tabindex="0">{{ $book->author->name }}</a>
                                </div>
                            </div>
                        </td>
                        <td>$ {{ $book->price }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>
                            <a href="{{ route('admin.update-book', ['id'=>$book->id]) }}" title="Edit book" class="table-link font-size-5 mr-2"><i
                                    class="fa-solid fa-pen"></i></a>
                            <a href="#" class="table-link font-size-5 delete" data-id="{{ $book->id }}"
                                data-csrf="{{ csrf_token() }}" data-name="{{ $book->name }}"
                                data-reload-url="{{ url()->current() }}" title="Delete book"><i
                                    class="fa-solid fa-xmark"></i></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        @include('layout.pagination')
    @endif

</div>
