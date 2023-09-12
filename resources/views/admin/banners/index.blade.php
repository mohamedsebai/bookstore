


@extends('adminlte::page')

@section('title', 'banners')

@section('content_header')
    
    <h2 class="text-center">banners List</h2>
@stop

@section('content')
    

        
        <a class="btn btn-danger mb-5" href="{{route('admin.banners.create')}}">Add new banner</a>

        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bordered w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>banner Img</th>
                <th>Status</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($banners)
                @forelse ($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td><img src="{{ url('admin/assets/images/banners/' . $banner->img)  }}" width="50" alt="banner-img"></td>
                        <td>
                            {!! $banner->status == 0 ? '<div class="btn btn-danger">Not visiable</div>' : '<div class="btn btn-success">Visiable</div>' !!}
                        </td>
                        <td>
                        <a href="{{ route('admin.banners.updateStatus', ['banner' => $banner->id, 'status' =>  $banner->status == 1 ? 0 : 1 ]) }}"
                                class="btn btn-warning  custom-btn">
                               change status
                            </a>

                        <form action="{{route('admin.banners.destroy', $banner->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no banners yet</div>
                @endforelse
            @endisset
            
            


        </tbody>
        </table>

<div class="container">
         <div class="row">
            <div class="col-12 mt-5">
                @if ($banners->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $banners->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $banners->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $banners->getUrlRange(1, $banners->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $banners->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $banners->currentPage() == $banners->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $banners->nextPageUrl() }}" aria-label="Next">
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