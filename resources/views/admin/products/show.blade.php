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
    <div class="row">
        <div class="col-md-8">
            <h6>£{{ $product->price }}</h6>
            <h2>{{ $product->title }}</h2>
            <br>
            <blockquote class="blockquote">{{ $product->description }}</blockquote>
        </div>
        <div class="col-md-4">
            <div class="card card-body white p-3">
                <h2>Images</h2>
                <div class="row m-0">
                    @if (!$images->isEmpty())
                        @foreach ($images as $image)
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
                            Add images
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection