@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <h4>
                        {{ $product->price }}
                    </h4>
                    <h3>
                        {{ $product->title }}
                    </h3>
                </div>
            @endforeach
        </div>
    </div>
@endsection