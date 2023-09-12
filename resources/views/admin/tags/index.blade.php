


@extends('adminlte::page')

@section('title', 'tags')

@section('content_header')
    
    <h2 class="text-center">tags List</h2>
@stop

@section('content')
    

        
        <a class="btn btn-danger mb-5" href="{{route('admin.tags.create')}}">Add new tag</a>

        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bordered w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($tags)
                @forelse ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>
                        <a href="{{route('admin.tags.edit', $tag->id)}}" class="btn btn-primary custom-btn"><i class="fa fa-close"></i>Edit</a>
                        <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no tags yet</div>
                @endforelse
            @endisset
            
            


        </tbody>
        </table>

<div class="container">
         <div class="row">
            <div class="col-12 mt-5">
                @if ($tags->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $tags->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $tags->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $tags->getUrlRange(1, $tags->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $tags->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $tags->currentPage() == $tags->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $tags->nextPageUrl() }}" aria-label="Next">
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