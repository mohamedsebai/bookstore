@extends('adminlte::page')

@section('title', 'categories')

@section('content_header')
    
    <h2 class="text-center">Edit Category</h2>

@stop

@section('content')

<div class="container">

    <div class="row">
        <div class="form-box">
            
            <a class="btn btn-warning mb-5" href="{{ route('admin.categories.index') }}">Categories list</a>


            @if (session('message'))
                <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
            @endif
            <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label>Title:</label>
                <input class="form-control" type="text" name="title" placeholder="Type title"
                value="{{$category->title}}" >
                @error('title')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="update">
            </form>
            </div>
        </div>
</div>

@endsection