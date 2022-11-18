@extends('layout.master')

@section('title')
    Manage Book Authors
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Manage Book Authors</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('admin.dashboard') }}" class="h-primary">Admin dashboard</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Manage Book Authors
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-8 col-md-8 col-sm-12 my-5">
            <div class="text-center mb-5">
                <h5 class="font-size-7 font-weight-medium">Manage Book Authors</h5>

            </div>
            <div class="row justify-content-center">
                <div class="col-10">
                    <form action="#" id="authors" method="POST"
                    @isset($editAuthor)
                    action="{{ route('admin.authors', ['id' => $editAuthor->id]) }}"
                @else
                    action="{{ route('admin.authors') }}"
                @endisset>
                        <div class="form-group mb-4">
                            <label id="authorNameLabel" class="form-label" for="authorName">Author's Name
                                <span class="text-red-1">*</span></label>
                            <input type="text"
                                class="form-control rounded-0 height-4 px-4 @error('name') is-invalid @enderror"
                                name="name" id="name" aria-describedby="authorNameLabel"
                                @if (old('name')) value="{{ old('name') }}"
                                @else 
                                    @isset($editAuthor)
                                    value="{{ $editAuthor->name }}"
                                    @endisset @endif>
                            <div class="form-message @error('name') invalid-feedback @enderror">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        @csrf
                        @isset($editAuthor)
                            <input type="hidden" name="id" value="{{ $editAuthor->id }}">
                        @endisset
                        @php
                            $description = '';
                            if (old('description')) {
                                $description = old('description');
                            } elseif (isset($editAuthor)) {
                                $description = $editAuthor->description;
                            }
                        @endphp
                        <div class="form-group mb-4">
                            <label id="authorDescriptionLabel" class="form-label" for="description">Description
                                <span class="text-red-1">*</span></label>
                            <textarea class="form-control rounded-0 px-4 @error('description') is-invalid @enderror" name="description"
                                id="description" placeholder="" aria-label="" rows="5" aria-describedby="authorDescriptionLabel">{{ $description ? trim($description) : '' }}</textarea>
                            <div class="form-message @error('description') invalid-feedback @enderror">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4d75 text-center">
                            @isset($editAuthor)
                                <button type="submit" class="btn py-3 rounded-0 btn-dark w-40 mr-2">
                                    Updates author information
                                </button>
                                <a href="{{ url()->previous() }}" class="btn py-3 rounded-0 btn-primary w-40">Cancel</a>
                            @else
                                <button type="submit" class="btn py-3 rounded-0 btn-dark w-40 mr-2">
                                    Add new author information
                                </button>
                            @endisset

                        </div>

                    </form>
                </div>
            </div>
            {{-- Table --}}
            @include('admin.authors.authors-table')
            {{-- End table --}}
        </div>
    </main>
@endsection

@section('custom_js')
    <script>
        Validator({
            form: '#authors',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#name', "Please enter author's name"),
                Validator.isRequired('#description', "Please enter author's description"),
            ]
        });
    </script>
@endsection
