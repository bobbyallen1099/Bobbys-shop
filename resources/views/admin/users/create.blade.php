@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="card card-body">
            <div class="d-flex justify-content-between mb-4">
                <h2>Add new user</h2>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.users.create') }}">
                @csrf

                <div class="form-group">
                    <label for="name">
                        Name *
                    </label>
                    <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror">
                </div>

                <div class="form-group">
                    <label for="email">
                        Email *
                    </label>
                    <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror">
                </div>

                <div class="form-group">
                    <label for="password">
                        Password *
                    </label>
                    <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="password-confirm">
                        Confirm password *
                    </label>
                    <input name="password_confirmation" id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                </div>
            
                <button class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection
