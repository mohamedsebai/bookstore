@extends('adminlte::page')

@section('title', 'products')

@section('content_header')

    <h2 class="text-center">Edit Category</h2>

@stop

@section('content')

<div class="container">


            <a class="btn btn-warning mb-5" href="{{ route('admin.products.index') }}">products list</a>

            @if (session('message'))
                <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
            @endif


            <form action="{{route('admin.products.update', $product->id)}}" method="POST" class="w-75" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Title:</label>
                <input class="form-control" type="text" name="title" placeholder="Type title"
                value="{{$product->title}}" >
                @error('title')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>descreption:</label>
                <textarea class="form-control" name="descreption" type="text" rows="4" cols="50" placeholder="Type descreption">{{ $product->descreption }}</textarea>
                @error('descreption')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>auther:</label>
                <input class="form-control" type="text" name="auther" placeholder="Type auther"
                value="{{$product->auther}}" >
                @error('auther')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>price:</label>
                <input class="form-control" type="text" name="price" placeholder="Type price"
                value="{{$product->price}}" >
                @error('price')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>discount:</label>
                <input class="form-control" type="text" name="discount" placeholder="Type discount"
                value="{{$product->discount}}" >
                @error('discount')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>quantity:</label>
                <input class="form-control" type="text" name="quantity" placeholder="Type quantity"
                value="{{$product->quantity}}" >
                @error('quantity')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>pages_num:</label>
                <input class="form-control" type="text" name="pages_num" placeholder="Type pages_num"
                value="{{$product->pages_num}}" >
                @error('pages_num')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>product_code:</label>
                <input class="form-control" type="text" name="product_code" placeholder="Type product_code"
                value="{{$product->product_code}}" >
                @error('product_code')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>img:</label>
                <input class="form-control" type="file" name="image">
                @error('image')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>


            <input type="submit" class="btn btn-primary" value="update">

            </form>


</div>

@endsection
