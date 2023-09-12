@extends('adminlte::page')

@section('status', 'banners')

@section('content_header')
    
    <h2 class="text-center">Add banner</h2>

@stop

@section('content')

<div class="container">

            
            <a class="btn btn-warning mb-5" href="{{ route('admin.banners.index') }}">banners list</a>


            @if (session('message'))
                <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
            @endif
            <form action="{{route('admin.banners.store')}}" method="POST" class="w-75" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label>Status:</label>
                <select name="status">
                    <option value="0">Not Visiable</option>
                    <option value="1">Visiable</option>
                </select>
                @error('status')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Choose Img:</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="add">
            </form>
      

</div>

@endsection