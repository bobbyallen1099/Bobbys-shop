@extends('admin.layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Admin</li>
        <li class="breadcrumb-item" aria-current="page">Products</li>
    </ol>
</nav>
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
            {{ Session::get('message') }}
            @if(Session::has('name'))
                <strong>'{{ Session::get('name') }}'</strong>
            @endif
        </div>
    @endif
    <div class="d-flex justify-content-between mb-4">
        <h2>Products</h2>
        <div>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add new product</a>
        </div>
    </div>

    <div class="card white card-body p-0">
        <table class="table m-0">
            <thead>
                <tr>
                    <th class="border-top-0">Product</th>
                    <th class="border-top-0">Price</th>
                    <th class="border-top-0" width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="circle mr-2 {{ check_if_product_is_live($product) ? "success" : "danger" }}"></div>
                                <a href="{{ route('admin.products.show', $product) }}">
                                    {{ $product->title }}
                                </a>
                            </div>
                        </td>
                        <td>
                            £{{ $product->price }}
                        </td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-xs">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
