


@extends('adminlte::page')

@section('title', 'carts')

@section('content_header')

    <h2 class="text-center">carts order List</h2>
@stop

@section('content')


        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bcarted w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>img</th>
                <th>prd title</th>
                <th>order user</th>
                <th>price</th>
                <th>discount</th>
                <th>quantity</th>
                <th>Total</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($cart)
                @forelse ($cart->user->orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td><img src="{{ url('admin/assets/images/products/' . $order->product->img) }}" width="100" alt="alt"></td>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->discount }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->total }}</td>
                        <td>
                            <a href="{{route('admin.orders.edit', $order->id)}}" class="btn btn-primary custom-btn"><i class="fa fa-close"></i>Edit</a>
                            <form action="{{route('admin.orders.destroy', $order->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no carts yet</div>
                @endforelse
            @endisset




        </tbody>
        </table>


    </div>

    </div>

@stop
