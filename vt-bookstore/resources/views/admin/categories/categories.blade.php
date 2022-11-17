@extends('layout.master')

@section('title')
    Manage Book Categories
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Manage Book Categories</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('admin.dashboard') }}" class="h-primary">Admin dashboard</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Manage Book Categories
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-8 col-md-8 col-sm-12 my-5">
            <div class="text-center mb-5">
                <h5 class="font-size-7 font-weight-medium">Manage Book Categories</h5>

            </div>
            <form class="form-row justify-content-center mb-3" id="categories" method="POST"
                @isset($editCategory)
                    action="{{ route('admin.add-category', ['id' => $editCategory->id]) }}"
                @else
                    action="{{ route('admin.add-category') }}"
                @endisset>
                <div class="col-md-5 mb-3 mb-md-2">
                    @csrf
                    @isset($editCategory)
                        <input type="hidden" name="id" value="{{ $editCategory->id }}">
                    @endisset
                    <div class="input-group">
                        <input type="text"
                            class="form-control px-5 height-60 
                        @error('name')
                            is-invalid
                        @enderror"
                            name="name" id="name" placeholder="Enter category name here."
                            aria-label="Book categories"
                            @if (old('name')) value="{{ old('name') }}"
                            @else 
                                @isset($editCategory)
                                value="{{ $editCategory->name }}"
                                @endisset @endif>
                        <div class="form-message @error('name') invalid-feedback @enderror">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="col-sm-2 col-md-4 ml-md-2">
                    @isset($editCategory)
                        <button type="submit" class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">
                            Updates category
                        </button>
                        <a href="{{ route('admin.categories') }}" class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">Cancel</a>
                    @else
                        <button type="submit" class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">
                            Add new category
                        </button>
                    @endisset
                </div>
            </form>
            {{-- Table --}}
            @include('admin.categories.categories-table')
            {{-- End table --}}
        </div>
    </main>
@endsection

@section('custom_js')
    <script>
        Validator({
            form: '#categories',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#name', 'Please enter a name of book category')
            ]
        });
    </script>
@endsection
