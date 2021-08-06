@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex">
                        {{ __('Upload Excel File') }}

                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary ml-auto">Return to products</a>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('alert-type') }}" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ route('products.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-file">
                                <input type="file" name="attachment" class="custom-file-input" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choose Excel file...</label>
                                @error('attachment')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="btn btn-sm btn-primary">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
