@extends('layout.master')

@section('title')
    Add new book
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
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Add new book
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-6 col-md-8 col-sm-12">
            <form action="{{ route('admin.add-book') }}" id="addBook" method="POST" enctype="multipart/form-data"
                novalidate>

                <header class="border-bottom px-4 px-md-6 py-4 mb-3">
                    <h2 class="font-size-3 mb-0 d-flex align-items-center">
                        <i class="fa-solid fa-book-open mr-3 font-size-5"></i>Add new book
                    </h2>
                </header>

                <div class="pb-4 pb-md-6">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="category">Category <span class="text-red-1">*</span></label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                                    {{ $category->name }}</option>
                                
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="author">Author <span class="text-red-1">*</span></label>
                        <select class="form-control" name="author_id" id="author">
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" @if (old('author_id') == $author->id) selected @endif>
                                    {{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label id="nameLabel" class="form-label" for="name">Name <span
                                class="text-red-1">*</span></label>
                        <input type="text"
                            class="form-control rounded-0 height-4 px-4 @error('name') is-invalid @enderror"
                            name="name" id="name" aria-describedby="nameLabel" value="{{old('name')}}">
                        <div class="form-message @error('name') invalid-feedback @enderror">
                            @error('name') {{$message}} @enderror
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label id="descriptionLabel" class="form-label" for="description">Description <span
                                class="text-red-1">*</span></label>
                        <textarea class="form-control rounded-0 px-4 @error('description') is-invalid @enderror" name="description" id="description" aria-label="" rows="5"
                            aria-describedby="descriptionLabel">{{trim(old('description'))}}</textarea>
                        <div class="form-message @error('description') invalid-feedback @enderror">
                            @error('description') {{$message}} @enderror
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label id="priceLabel" class="form-label" for="price">Price <span
                                class="text-red-1">*</span></label>
                        <input type="number" class="form-control rounded-0 height-4 px-4 @error('price') is-invalid @enderror" name="price" id="price"
                            aria-describedby="priceLabel" value="{{old('price')}}">
                        <div class="form-message @error('price') invalid-feedback @enderror">
                            @error('price') {{$message}} @enderror
                        </div>

                    </div>

                    <div class="form-group mb-2">
                        <label id="stockLabel" class="form-label" for="stock">Stock <span
                                class="text-red-1">*</span></label>
                        <input type="number" class="form-control rounded-0 height-4 px-4 @error('stock') is-invalid @enderror" name="stock" id="stock"
                            aria-describedby="stockLabel" value="{{old('stock')}}">
                        <div class="form-message @error('stock') invalid-feedback @enderror">
                            @error('stock') {{$message}} @enderror
                        </div>

                    </div>

                    <div class="form-group mb-2">
                        <label for="publisher">Publisher <span class="text-red-1">*</span></label>
                        <select class="form-control" name="publisher_id" id="publisher">
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}"
                                    @if (old('publisher_id') == $publisher->id) selected @endif>{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label id="publishLabel" class="form-label" for="publishDate">Publish date <span
                                class="text-red-1">*</span></label>
                        <input type="date" class="form-control rounded-0 height-4 px-4 @error('publishDate') is-invalid @enderror" name="publishDate"
                            id="publishDate" aria-describedby="publishLabel" value="{{old('publishDate')}}">
                        <div class="form-message @error('publishDate') invalid-feedback @enderror">
                            @error('publishDate') {{$message}} @enderror
                        </div>
                    </div>

                    <div class="form-group mb-2" id="book-images">
                        <label id="imageLabel" class="form-label" for="image">Book Image <span
                                class="text-red-1">*</span> :</label>
                        <input type="file" class="px-4 @error('image.*') is-invalid @enderror" name="image[]" id="firstImage" placeholder="Book image" value="{{old('image.*')}}" multiple>
                        <button type="button" class="btn py-2 rounded-0 btn-dark emptyImage" title="Clear book image">
                            <i class="fa-solid fa-eraser"></i>
                        </button>
                        <div class="form-message @error('image.*') invalid-feedback @enderror">
                            @error('image.*') {{$message}} @enderror
                        </div>
                        <p class="form-text text-muted">Can choose multiple book image to upload</p>
                        {{old('image.*')}}
                    </div>
                    {{-- <button type="button" class="btn py-2 rounded-0 btn-dark addMoreImage mb-4">Add more image</button> --}}


                    <div class="mb-3 text-center">
                        <button type="submit" class="btn py-3 rounded-0 btn-dark btn-block">Add new book</button>
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
                Validator.isRequired('#name', 'Please enter book name'),
                Validator.isRequired('#description', 'Please enter book description'),
                Validator.isRequired('#price', 'Please enter book price'),
                Validator.isConcurrency('#price'),
                Validator.isRequired('#stock', 'Please enter stock of book'),
                Validator.isInteger('#stock', 'Number of book must be interger and greater than zero'),
                // Validator.isGreaterThanEqual('#stock', 0, 'The number of books cannot be negative'),
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
        // $(document).on('click', '.removeImage', function() {
        //     $(this).parent().remove();
        // });
        $(document).on('click', '.emptyImage', function() {
            $('#firstImage').val('');
        });
    </script>
@endsection
