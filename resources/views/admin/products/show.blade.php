


@extends('adminlte::page')

@section('title', 'show')

@section('content_header')

    <h2 class="text-center">Product Wishlist</h2>
@stop

@section('content')

        <a class="btn btn-danger mb-5" href="{{route('admin.products.index')}}">Products List</a>

        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif


        <table class="table-bordered w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>product</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($favourites)
                @forelse ($favourites as $favourite)
                    <tr>
                        <td>{{ $favourite->id }}</td>
                        <td>{{ $favourite->user->name }}</td>
                        <td><img src="{{ url('admin/assets/images/products/' . $favourite->product->img) }}" width="100" alt="alt"></td>
                    </tr>
                @empty
                    <div class="alert alert-danger">This product is not in any wish list for any user</div>
                @endforelse
            @endisset
        </tbody>
        </table>

    </div>

@stop
