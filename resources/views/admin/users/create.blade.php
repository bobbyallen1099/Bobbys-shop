@extends('admin.layouts.app')

@section('content')

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

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2>Add new user</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">
                                Name *
                            </label>
                            <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">
                                Email *
                            </label>
                            <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">
                                Password *
                            </label>
                            <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password-confirm">
                                Confirm password *
                            </label>
                            <input name="password_confirmation" id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
