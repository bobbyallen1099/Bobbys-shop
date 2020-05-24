@extends('admin.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin') }}">Admin</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.products.index') }}">Products</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.products.show', $product) }}">{{ $product->title }}</a></li>
            <li class="breadcrumb-item" aria-current="page">Images</li>
        </ol>
    </nav>
@endsection

@section('content')

    <h2>Add images</h2>
    <form action="{{ route('admin.products.storeimages', $product) }}" class="dropzone" id="my-awesome-dropzone">
        @csrf
    </form>
    <br>

    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2>Current images</h2>
        <div>
            <a href="javascript:void(0)" onClick="window.location.reload();" class="btn btn-primary">Reload images</a>
        </div>
    </div>
    @if (!$product->images->isEmpty())
        <div data-product-id="{{ $product->id }}" id="sortable" class="row">
            @foreach ($product->images as $image)
            <div data-image-id="{{ $image->id }}" data-order="{{ $image->order }}" class="image col-md-3 p-2">
                    <div class="image-thumbnail" style="background-image: url('/shop/images/{{ $product->id}}/{{ $image->file_name }}');">
                        <div class="text-right">
                            <form method="POST" action="{{ route('admin.products.deleteimage', [$product, $image]) }}">
                                @csrf
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-danger">No images added</div>
    @endif

    <div class="fixed-bottom">
        <div class="d-flex justify-content-end p-4">
            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-primary">Finish</a>
        </div>
    </div>

@endsection

@section('scripts')
@endsection