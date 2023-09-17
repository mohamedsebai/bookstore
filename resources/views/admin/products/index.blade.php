


@extends('adminlte::page')

@section('title', 'products')

@section('content_header')

    <h2 class="text-center">products List</h2>
@stop

@section('content')

        <a class="btn btn-danger mb-5" href="{{route('admin.products.create')}}">Add new product</a>

        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bordered w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>img</th>
                <th>title</th>
                <th>descreption</th>

                <th>auther</th>
                <th>price</th>
                <th>discount</th>
                <th>quantity</th>
                <th>product_code</th>
                <th>pages_num</th>

                <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($products)
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{ url('admin/assets/images/products/' . $product->img) }}" width="100" alt="alt"></td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->descreption }}</td>
                        <td>{{ $product->auther }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->pages_num }}</td>
                        <td>
                        <a href="{{route('admin.products.edit', $product->id)}}"
                            class="btn btn-primary custom-btn"><i class="fa fa-close">
                                </i>Edit
                        </a>
                        <a href="{{route('admin.products.show', $product->id)}}"
                            class="btn btn-primary custom-btn"><i class="fa fa-close">
                                </i>WishList
                        </a>
                        <form action="{{route('admin.products.destroy', $product->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no products yet</div>
                @endforelse
            @endisset




        </tbody>
        </table>

<div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @if ($products->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $products->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $products->getUrlRange(1, $products->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $products->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
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
