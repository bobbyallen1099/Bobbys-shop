@extends('admin.layouts.app')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.index') }}">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></li>
            <li class="breadcrumb-item" aria-current="page">Edit</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-4">
        <h2>Update user</h2>
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

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf

        <div class="form-group">
            <label for="name">
                Name
            </label>
            <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">
                Email
            </label>
            <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
        </div>


        <div class="form-group">
            <label for="password">
                Change password
            </label>
            <input name="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror">
            <div class="text-muted">Leave password blank to not change</div>
        </div>

        <div class="form-group">
            <label for="password-confirm">
                Confirm password
            </label>
            <input name="password_confirmation" id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
        </div>
    
        <button class="btn btn-primary">Submit</button>

    </form>
@endsection
