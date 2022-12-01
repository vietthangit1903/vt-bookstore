

    <ul class="search-list">
        @foreach ($books as $book)
            <li>
                <div class="d-flex align-items-center p-4 border-bottom">
                    <a href="{{ route('bookDetail', ['book_id'=>$book->id]) }}">
                        <img src="{{ asset($book->bookImages[0]->image_path) }}" alt="Book image" width="90"
                            height="138" style="object-fit: contain">
                        <div class="ml-3 m-w-200-lg-down">
                            <a href="{{ route('bookDetail', ['book_id'=>$book->id]) }}">{{ $book->name }}</a>
                            <a href="#" class="text-gray-700 font-size-2 d-block"
                                tabindex="0">{{ $book->author->name }}</a>
                            <p class="text-gray-700 d-block font-size-3">$ {{ $book->price }}</p>
                        </div>
                    </a>
                </div>

            </li>
        @endforeach

