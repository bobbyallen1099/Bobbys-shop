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
    <h2 class="mb-4">Update Product</h2>

    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-lg-7">
                <h4>Basic details</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title">
                                Title *
                            </label>
                            <i class="fas fa-font icon-append"></i>
                            <input value="{{ $product->title }}" name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">
                                Description *
                            </label>
                            <i class="fas fa-align-left icon-append"></i>
                            <textarea rows="4" name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="price">
                                Price *
                            </label>
                            <i class="fas fa-pound-sign icon-append"></i>
                            <input value="{{ $product->price }}" name="price" id="price" type="text" class="form-control @error('price') is-invalid @enderror">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h4>Product visibility</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group icon">
                            <label for="category">
                                Category *
                            </label>
                            <i class="fas fa-tag icon-append"></i>
                            <select value="{{ $product->category->id }}" name="category" id="category" class="select2 form-control @error('category') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="start_date">
                                Start date
                            </label>
                            <i class="far fa-calendar-alt icon-append"></i>
                            <input value="{{ $product->start_date }}" name="start_date" id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="end_date">
                                End date
                            </label>
                            <i class="far fa-calendar-alt icon-append"></i>
                            <input value="{{ $product->end_date }}" name="end_date" id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" name="draft" id="draft" @if ($product->live != 1) checked @endif>
                                <span>Draft mode</span>
                            </label>
                            <div class="hint text-muted">When ticked this will only be shown within admin.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Update product</button>
        <a href="{{ route('admin.products.images', $product) }}" class="btn btn-default">Edit Images</a>
    </form>
@endsection

@section('scripts')
@endsection