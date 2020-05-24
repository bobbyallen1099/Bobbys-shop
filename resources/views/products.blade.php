@extends('layouts.app')

@section('content')
    <div class="banner pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner__content">
                        <h1>Our products</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 p-2">
                    <a href="{{ route('pages.products.product', $product) }}" class="product-thumbnail">
                        <div class="product-thumbnail__image"  style="background-image: url('/shop/images/{{ $product->id}}/{{ $product->images->first()->file_name }}');">
                            <div class="btn btn-primary product-thumbnail__button">View item</div>
                        </div>
                        <div class="product-thumbnail__content">
                            <div class="product-thumbnail__content--category">{{ $product->category->name }}</div>
                            <div class="product-thumbnail__content--title">{{ $product->title }}</div>
                            <div class="product-thumbnail__content--price">£{{ $product->price }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection