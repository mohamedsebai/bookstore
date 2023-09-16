


@extends('adminlte::page')

@section('title', 'products')

@section('content_header')

    <h2 class="text-center">Product FAQ</h2>
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
                <th>Questions</th>
                <th>Answer</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @isset($faq_answers)
                @forelse ($faq_answers as $faq_answer)
                    <tr>
                        <td>{{ $faq_answer->id }}</td>
                        <td>{{ $faq_answer->question->question }}</td>
                        <td>{{ $faq_answer->answer }}</td>
                    </tr>
                @empty
                    <div class="alert alert-danger">There is no products yet</div>
                @endforelse
            @endisset




        </tbody>
        </table>

    </div>

@stop
