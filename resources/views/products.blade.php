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
                <div class="col-md-4">
                    <a href="{{ route('pages.products.product', $product) }}">
                        <h4>
                            {{ $product->price }}
                        </h4>
                        <h3>
                            {{ $product->title }}
                        </h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection