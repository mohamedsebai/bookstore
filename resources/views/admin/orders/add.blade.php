@extends('adminlte::page')

@section('status', 'orders')

@section('content_header')

    <h2 class="text-center">Add Order</h2>

@stop

@section('content')

<div class="container">


            <a class="btn btn-warning mb-5" href="{{ route('admin.orders.index') }}">orders list</a>


            @if (session('message'))
                <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
            @endif
            <form action="{{route('admin.orders.store')}}" method="POST" class="w-75" enctype="multipart/form-data">
                @csrf

            <div class="form-group">
                <label>price:</label>
                <input class="form-control" type="text" name="price" placeholder="Type price"
                value="{{old('price')}}" >
                @error('price')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label>discount:</label>
                <input class="form-control" type="text" name="discount" placeholder="Type discount"
                value="{{old('discount')}}" >
                @error('discount')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>quantity:</label>
                <input class="form-control" type="text" name="quantity" placeholder="Type quantity"
                value="{{old('quantity')}}" >
                @error('quantity')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>User:</label>
                <select name="user_id">
                    @isset($users)
                        @forelse ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @empty
                            <option value="0" disabled>Nothing you have to check users list</option>
                        @endforelse
                    @endisset
                </select>
            </div>

            <div class="form-group">
                <label>Product:</label>
                <select name="product_id">
                    @isset($products)
                        @forelse ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->title }}</option>
                        @empty
                            <option value="0" disabled>Nothing you have to check product list</option>
                        @endforelse
                    @endisset
                </select>
            </div>



            <input type="submit" class="btn btn-primary" value="add">
            </form>


</div>

@endsection
