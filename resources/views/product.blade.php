@extends('layouts.app')

@section('content')

<div class="banner pb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="banner__content">
                    <h6>£{{ $product->price }}</h6>
                    <h1>{{ $product->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection