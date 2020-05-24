@extends('layouts.app')

@section('content')
    <div class="banner pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner__content">
                        <h1>404 Page not found</h1>
                        <a href="{{ route('pages.home') }}" class="btn btn-secondary">Back to homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection