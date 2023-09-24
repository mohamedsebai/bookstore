


@extends('adminlte::page')

@section('title', 'orders')

@section('content_header')

    <h2 class="text-center">orders List</h2>
@stop

@section('content')

<a class="btn btn-warning mb-5" href="{{ route('admin.orders.create') }}">Add Order</a>
        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bordered w-100">
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
                <th>Status</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($orders)
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td><img src="{{ url('admin/assets/images/products/' . $order->product->img) }}" width="100" alt="alt"></td>
                        <td>{{ $order->product->title }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->discount }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->status == 0 ? 'Not Complated if user complate his checkout it will be complated' : 'Complated'  }}</td>
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
                    <div class="alert alert-danger">There is no orders yet</div>
                @endforelse
            @endisset




        </tbody>
        </table>

<div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @if ($orders->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $orders->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $orders->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $orders->getUrlRange(1, $orders->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $orders->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $orders->currentPage() == $orders->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $orders->nextPageUrl() }}" aria-label="Next">
                            <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Next') }} </span>
                        </a>
                        </li>
                        </ul>
                    </nav>
                @endif
            </div>
        </div>



    </div>

    </div>

@stop
