@extends('admin.layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Admin</li>
        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
    </ol>
</nav>
@endsection

@section('content')

<h1>Dashboard</h1>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div class="row">
    <div class="col-md-3">
        <div class="card card-body">
            <a href="{{ route('admin.products.index') }}">Products</a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body">
            <a href="{{ route('admin.users.index') }}">Users</a>
        </div>
    </div>
</div>
@endsection
