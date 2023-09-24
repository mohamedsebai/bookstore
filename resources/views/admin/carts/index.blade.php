


@extends('adminlte::page')

@section('title', 'carts')

@section('content_header')

    <h2 class="text-center">carts List</h2>
@stop

@section('content')


        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bcarted w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>cart user</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($carts)
                @forelse ($carts as $cart)
                    <tr>
                        <td>{{ $cart->id }}</td>
                        <td>{{ $cart->user->name }}</td>
                        <td>
                        <a href="{{route('admin.carts.show', $cart->id)}}" class="btn btn-primary custom-btn"><i class="fa fa-close"></i>show</a>
                        <form action="{{route('admin.carts.destroy', $cart->id)}}" method="post">
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

<div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @if ($carts->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $carts->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $carts->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $carts->getUrlRange(1, $carts->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $carts->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $carts->currentPage() == $carts->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $carts->nextPageUrl() }}" aria-label="Next">
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
