@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>
                    {{ $product->price }}
                </h4>
                <h3>
                    {{ $product->title }}
                </h3>
            </div>
        </div>
    </div>
@endsection