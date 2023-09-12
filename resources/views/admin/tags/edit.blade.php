@extends('adminlte::page')

@section('title', 'tags')

@section('content_header')
    
    <h2 class="text-center">Edit tag</h2>

@stop

@section('content')

<div class="container">


            
            <a class="btn btn-warning mb-5" href="{{ route('admin.tags.index') }}">tags list</a>


            @if (session('message'))
                <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
            @endif
            <form action="{{route('admin.tags.update', $tag->id)}}" method="POST" class="w-75">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label>Title:</label>
                <input class="form-control" type="text" name="title" placeholder="Type title"
                value="{{$tag->title}}" >
                @error('title')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="update">
            </form>

</div>

@endsection