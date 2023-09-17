


@extends('adminlte::page')

@section('title', 'faq')

@section('content_header')

    <h2 class="text-center">FAQ List</h2>
@stop

@section('content')



        <a class="btn btn-danger mb-5" href="{{route('admin.faq.create')}}">Add new FAQ</a>

        @if (session('message'))
            <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
        @endif
        <table class="table-bordered w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Answer</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($faq)
                @forelse ($faq as $faq_question)
                    <tr>
                        <td>{{ $faq_question->id }}</td>
                        <td>{{ $faq_question->question }}</td>
                        <td>{{ $faq_question->answer }}</td>
                        <td>
                        <a href="{{route('admin.faq.edit', $faq_question->id)}}" class="btn btn-primary custom-btn"><i class="fa fa-close"></i>Edit</a>
                        <form action="{{route('admin.faq.destroy', $faq_question->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="delete" class="btn btn-danger">
                        </form>
                    </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no faq yet</div>
                @endforelse
            @endisset




        </tbody>
        </table>

<div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @if ($faq->hasPages())
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                        <li class="page-item {{ $faq->currentPage() == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $faq->previousPageUrl() }}" aria-label="Previous">
                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                            <span class="sr-only"> {{ ('lang.Previous') }} </span>
                            </a>
                        </li>
                        @foreach ( $faq->getUrlRange(1, $faq->lastPage()) as $pageLink)
                        @php
                            //fuck you php iam mohamed seabeai
                            $pageString = strstr($pageLink, 'page=' , false);
                            $rev = strrev($pageString);
                            $pageNum = strstr($rev, '=' , true);
                            $pageNum = strrev($pageNum);
                        @endphp
                            <li class="page-item {{ substr($pageLink, -1) == $faq->currentPage() ? 'active': '' }}">
                                <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                </a>
                            </li>
                        @endforeach
                        <li class="page-item {{  $faq->currentPage() == $faq->lastPage() ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $faq->nextPageUrl() }}" aria-label="Next">
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
