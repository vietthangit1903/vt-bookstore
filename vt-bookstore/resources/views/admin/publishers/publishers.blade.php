@extends('layout.master')

@section('title')
    Manage Publishers
@endsection

@section('breadcrumb')
    <div class="page-header border-bottom">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center py-4">
                <h1 class="page-title font-size-3 font-weight-medium m-0 text-lh-lg">Manage Publishers</h1>
                <nav class="woocommerce-breadcrumb font-size-2">
                    <a href="{{ route('admin.dashboard') }}" class="h-primary">Admin dashboard</a>
                    <span class="breadcrumb-separator mx-1"><i class="fas fa-angle-right"></i></span>Manage Publishers
                </nav>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <main id="content">
        <div class="container col-lg-8 col-md-8 col-sm-12 my-5">
            <div class="text-center mb-5">
                <h5 class="font-size-7 font-weight-medium">Manage Publishers</h5>

            </div>
            <form class="form-row justify-content-center mb-3" id="publishers" method="POST"
                @isset($editPublisher)
                    action="{{ route('admin.publishers', ['id' => $editPublisher->id]) }}"
                @else
                    action="{{ route('admin.publishers') }}"
                @endisset>
                <div class="col-md-5 mb-3 mb-md-2">
                    @csrf
                    @isset($editPublisher)
                        <input type="hidden" name="id" value="{{ $editPublisher->id }}">
                    @endisset
                    <div class="input-group">
                        <input type="text"
                            class="form-control px-5 height-60 
                        @error('name')
                            is-invalid
                        @enderror"
                            name="name" id="name" placeholder="Enter publisher's name here."
                            aria-label="Book publishers"
                            @if (old('name')) value="{{ old('name') }}"
                            @else 
                                @isset($editPublisher)
                                value="{{ $editPublisher->name }}"
                                @endisset @endif>
                        <div class="form-message @error('name') invalid-feedback @enderror">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="col-sm-2 col-md-4 ml-md-2">
                    @isset($editPublisher)
                        <button type="submit" class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">
                            Updates publisher
                        </button>
                        <a href="{{ route('admin.publishers') }}" class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">Cancel</a>
                    @else
                        <button type="submit" class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">
                            Add new publisher
                        </button>
                    @endisset
                </div>
            </form>
            {{-- Table --}}
            @include('admin.publishers.publishers-table')
            {{-- End table --}}
        </div>
    </main>
@endsection

@section('custom_js')
    <script>
        Validator({
            form: '#publishers',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#name', 'Please enter a name of publisher')
            ]
        });
    </script>
@endsection
