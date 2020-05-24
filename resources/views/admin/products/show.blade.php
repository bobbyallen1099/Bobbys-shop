@extends('admin.layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin') }}">Admin</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.products.index') }}">Products</a></li>
        <li class="breadcrumb-item" aria-current="page">{{ $product->title }}</li>
    </ol>
</nav>
@endsection

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex">
            <h2 class="d-flex align-items-center"><span class="badge badge-primary m-0 mr-3">{{ $product->category->name }}</span>{{ $product->title }}</h2>
            <h2 class="text-muted ml-3">£{{ $product->price }}</h2>
        </div>
        <div>
            <a href="{{ route('pages.products.product', $product) }}" class="btn btn-default"><i class="fas fa-fw fa-external-link-alt"></i> View on website</a>
            <a href="{{ route('admin.products.confirmdelete', $product) }}" class="btn btn-danger"><i class="fas fa-fw fa-trash-alt"></i>Delete product</a>
            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary"><i class="fas fa-fw fa-pencil-alt"></i> Edit product</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <blockquote class="blockquote">{{ $product->description }}</blockquote>
        </div>
        <div class="col-md-4">
            <div class="card card-body white p-3">
                <h2>Product images</h2>
                <div class="row m-0">
                    @if (!$product->images->isEmpty())
                        @foreach ($product->images as $image)
                            <div class="col-md-4 p-1">
                                <div class="image-thumbnail" style="background-image: url('/shop/images/{{ $product->id}}/{{ $image->file_name }}');"></div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 px-1">
                            <div class="alert alert-danger">No images added</div>
                        </div>
                    @endif
                    <div class="col-12 py-1 px-1">
                        <a href="{{ route('admin.products.images', $product) }}" class="btn btn-primary btn-block">
                            Edit images
                        </a>
                    </div>
                </div>
            </div>
            <br>
            <div class="card card-body white p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h2 class="m-0">Product visibility</h2>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">Edit</a>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="text-muted">Start Date</div>
                        <div>
                            {{ $product->start_date? $product->start_date : "No start date"}}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted">End Date</div>
                        <div>
                            {{ $product->end_date? $product->end_date : "No end date" }}
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="text-muted">Draft mode</div>
                        <div>@if ($product->live != 1) On @else Off @endif</div>
                    </div>
                    <div class="col-6">
                        <div class="text-muted">Live now</div>
                        <div><div class="circle mr-2 {{ check_if_product_is_live($product) ? "success" : "danger" }}"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection