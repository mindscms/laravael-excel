@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex">
                        {{ __('Products') }}
                        <form action="{{ route('products.export') }}" method="post" class="ml-auto">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Export</button>
                            <a href="{{ route('products.import') }}" class="btn btn-sm btn-success">Import</a>
                        </form>

                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('alert-type') }}" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Type code</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->type_code }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No products found</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">{{ $products->links() }}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
