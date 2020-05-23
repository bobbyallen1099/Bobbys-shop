@extends('layouts.app')

@section('content')
    <div class="banner home-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner__content">
                        <h1>Welcome to Bobby's shop!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi imperdiet venenatis vehicula. Morbi feugiat metus quis dui feugiat egestas. Aliquam erat volutpat. Fusce ut erat dui. Nam at orci at quam dignissim finibus at eget tellus. Vivamus maximus nisl a nisl dapibus placerat. Praesent dignissim ex non dolor malesuada iaculis. Phasellus mollis urna eget massa iaculis, id pulvinar tellus posuere. Aliquam consequat vestibulum eros, eget pellentesque ipsum auctor tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <h3 class="text-primary">Our featured items</h3>
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
    </div>
@endsection