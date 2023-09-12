@extends('adminlte::page')

@section('title', 'branches')

@section('content_header')
    
    <h2 class="text-center">Edit branch</h2>

@stop

@section('content')

<div class="container">


            
            <a class="btn btn-warning mb-5" href="{{ route('admin.branches.index') }}">branches list</a>


            @if (session('message'))
                <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
            @endif
            <form action="{{route('admin.branches.update', $branch->id)}}" method="POST" class="w-75">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label>City:</label>
                <input class="form-control" type="text" name="city" placeholder="Type city"
                value="{{$branch->city}}" >
                @error('city')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Street:</label>
                <input class="form-control" type="text" name="street" placeholder="Type street"
                value="{{$branch->street}}" >
                @error('street')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input class="form-control" type="text" name="phone" placeholder="Type phone"
                value="{{$branch->phone}}" >
                @error('phone')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="update">
            </form>

</div>

@endsection