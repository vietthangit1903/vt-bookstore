@extends('layout.master')

@section('title')
    @isset($editBook)
        Update book information
    @else
        Add new book
    @endisset

@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Manage Books</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('admin.dashboard') }}" class="h-primary">Admin dashboard</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    <a href="{{ route('admin.books') }}" class="h-primary">Manage books</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>
                    @isset($editBook)
                        Update book information
                    @else
                        Add new book
                    @endisset
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-6 col-md-8 col-sm-12">
            <form
                @isset($editBook)
                    action="{{ route('admin.update-book', ['id' => $editBook->id]) }}"
                @else
                    action="{{ route('admin.add-book') }}"
                @endisset
                id="addBook" method="POST" enctype="multipart/form-data" novalidate>

                <header class="border-bottom px-4 px-md-6 py-4 mb-3">
                    <h2 class="font-size-3 mb-0 d-flex align-items-center">
                        <i class="fa-solid fa-book-open mr-3 font-size-5"></i>
                        @isset($editBook)
                            Update book information
                        @else
                            Add new book
                        @endisset
                    </h2>
                </header>

                <div class="pb-4 pb-md-6">
                    @csrf
                    @isset($editBook)
                        <input type="hidden" name="id" value="{{ $editBook->id }}">
                    @endisset
                    <div class="form-group mb-2">
                        <label for="category">Category <span class="text-red-1">*</span></label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                            <option value="" selected>--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if (old('category_id') && old('category_id') == $category->id) selected
                                    @else 
                                         @isset($editBook)
                                            @if ($editBook->category_id == $category->id) selected @endif
                                    @endisset @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-message @error('category_id') invalid-feedback @enderror">
                            @error('category_id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="author">Author <span class="text-red-1">*</span></label>
                        <select class="form-control @error('author_id') is-invalid @enderror" name="author_id" id="author_id">
                            <option value="" selected>--</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}"
                                    @if (old('author_id') && old('author_id') == $author->id) selected
                                    @else 
                                         @isset($editBook)
                                            @if ($editBook->author_id == $author->id) selected @endif
                                    @endisset @endif>
                                    {{ $author->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-message @error('author_id') invalid-feedback @enderror">
                            @error('author_id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label id="nameLabel" class="form-label" for="name">Name <span
                                class="text-red-1">*</span></label>
                        <input type="text"
                            class="form-control rounded-0 height-4 px-4 @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameLabel"
                            @if (old('name')) value="{{ old('name') }}"
                            @else 
                                @isset($editBook)
                                value="{{ $editBook->name }}"
                                @endisset @endif>
                        <div class="form-message @error('name') invalid-feedback @enderror">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    @php
                        $description = '';
                        if (old('description')) {
                            $description = old('description');
                        } elseif (isset($editBook)) {
                            $description = $editBook->description;
                        }
                    @endphp
                    <div class="form-group mb-2">
                        <label id="descriptionLabel" class="form-label" for="description">Description <span
                                class="text-red-1">*</span></label>
                        <textarea class="form-control rounded-0 px-4 @error('description') is-invalid @enderror" name="description"
                            id="description" aria-label="" rows="5" aria-describedby="descriptionLabel">{{ $description ? trim($description) : '' }}</textarea>
                        <div class="form-message @error('description') invalid-feedback @enderror">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label id="priceLabel" class="form-label" for="price">Price <span
                                class="text-red-1">*</span></label>
                        <input type="number"
                            class="form-control rounded-0 height-4 px-4 @error('price') is-invalid @enderror" name="price"
                            id="price" aria-describedby="priceLabel"
                            @if (old('price')) value="{{ old('price') }}"
                            @else 
                                @isset($editBook)
                                value="{{ $editBook->price }}"
                                @endisset @endif>
                        <div class="form-message @error('price') invalid-feedback @enderror">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>

                    <div class="form-group mb-2">
                        <label id="stockLabel" class="form-label" for="stock">Stock <span
                                class="text-red-1">*</span></label>
                        <input type="number"
                            class="form-control rounded-0 height-4 px-4 @error('stock') is-invalid @enderror" name="stock"
                            id="stock" aria-describedby="stockLabel"
                            @if (old('stock')) value="{{ old('stock') }}"
                            @else 
                                @isset($editBook)
                                value="{{ $editBook->stock }}"
                                @endisset @endif>
                        <div class="form-message @error('stock') invalid-feedback @enderror">
                            @error('stock')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>

                    <div class="form-group mb-2">
                        <label for="publisher">Publisher <span class="text-red-1">*</span></label>
                        <select class="form-control @error('publisher_id') is-invalid @enderror" name="publisher_id" id="publisher_id">
                            <option value="" selected>--</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}"
                                    @if (old('publisher_id') && old('publisher_id') == $publisher->id) selected
                                    @else 
                                         @isset($editBook)
                                            @if ($editBook->publisher_id == $publisher->id) selected @endif
                                    @endisset @endif>
                                    {{ $publisher->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-message @error('publisher_id') invalid-feedback @enderror">
                            @error('publisher_id')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label id="publishLabel" class="form-label" for="publishDate">Publish date <span
                                class="text-red-1">*</span></label>
                        <input type="date"
                            class="form-control rounded-0 height-4 px-4 @error('publishDate') is-invalid @enderror"
                            name="publishDate" id="publishDate" aria-describedby="publishLabel"
                            @if (old('publishDate')) value="{{ old('publishDate') }}"
                            @else 
                                @isset($editBook)
                                value="{{ $editBook->publishDate }}"
                                @endisset @endif">
                        <div class="form-message @error('publishDate') invalid-feedback @enderror">
                            @error('publishDate')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    @isset($editBook)
                        <p class="form-label">Book images: </p>
                        <div class="d-flex flex-wrap">
                            @foreach ($editBook->bookImages as $image)
                                <div class="mr-3 mb-3 p-2 border border-dark">
                                    <img src="{{ asset($image->image_path) }}"
                                        class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="Book image"
                                        width="90" height="138" style="object-fit: cover">
                                    <a href="{{ route('admin.delete-image') }}"
                                        class="btn py-2 rounded-0 btn-dark removeImage " data-id="{{ $image->id }}"
                                        data-csrf="{{ csrf_token() }}" title="Delete image">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    @endisset

                    <div class="form-group mb-2" id="book-images">
                        <label id="imageLabel" class="form-label" for="image">
                            @isset($editBook)
                                Add more book images
                            @else
                                Book Image
                            @endisset
                            <span class="text-red-1">*</span> :</label>
                        <input type="file" class="px-4 @error('image.*') is-invalid @enderror" name="image[]"
                            id="firstImage" placeholder="Book image" value="{{ old('image.*') }}" multiple>
                        <button type="button" class="btn py-2 rounded-0 btn-dark emptyImage" title="Clear book image">
                            <i class="fa-solid fa-eraser"></i>
                        </button>
                        <div class="form-message @error('image.*') invalid-feedback @enderror">
                            @error('image.*')
                                {{ $message }}
                            @enderror
                        </div>
                        <p class="form-text text-muted">Can choose multiple book image to upload</p>
                        {{ old('image.*') }}
                    </div>
                    {{-- <button type="button" class="btn py-2 rounded-0 btn-dark addMoreImage mb-4">Add more image</button> --}}


                    <div class="mb-3 text-center">
                        @isset($editBook)
                            <button type="submit" class="btn py-3 rounded-0 btn-dark w-40 mr-2">
                                Updates book information
                            </button>
                            <a href="{{ url()->previous() }}" class="btn py-3 rounded-0 btn-primary w-40">Cancel</a>
                        @else
                            <button type="submit" class="btn py-3 rounded-0 btn-dark w-40 mr-2">
                                Add new book
                            </button>
                        @endisset
                    </div>


                </div>
        </div>
        </form>
        </div>
    </main>
@endsection
@section('custom_js')
    <script>
        Validator({
            form: '#addBook',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#category_id', 'Please choose a category'),
                Validator.isRequired('#author_id', 'Please choose an author'),
                Validator.isRequired('#name', 'Please enter book name'),
                Validator.isRequired('#description', 'Please enter book description'),
                Validator.isRequired('#price', 'Please enter book price'),
                Validator.isConcurrency('#price'),
                Validator.isRequired('#stock', 'Please enter stock of book'),
                Validator.isInteger('#stock', 'Number of book must be interger and greater than zero'),
                // Validator.isGreaterThanEqual('#stock', 0, 'The number of books cannot be negative'),
                Validator.isRequired('#publisher_id', 'Please choose a publisher'),
                Validator.isRequired('#publishDate', 'Please enter publish date of book'),
                Validator.isDate('#publishDate', 'Wrong date format'),

            ]
        });
    </script>
    <script>
        // $(document).on('click', '.addMoreImage', function() {
        //     var html = `<div class="mb-2">
    // <input type="file" class="pe-4" name="image[]">
    // <button type="button" class="btn py-2 rounded-0 btn-dark removeImage" title="Delete additional image">
    //     <i class="fa-solid fa-xmark"></i>
    //     </button>
    //     </div>`;
        //     $('#book-images').append(html);
        // });
        $(document).on('click', '.removeImage', function(event) {
            event.preventDefault();
            ajaxDeleteImage(event.currentTarget);
        });
        $(document).on('click', '.emptyImage', function() {
            $('#firstImage').val('');
        });
    </script>
@endsection
