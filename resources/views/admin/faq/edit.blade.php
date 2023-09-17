@extends('adminlte::page')

@section('title', 'faq')

@section('content_header')

    <h2 class="text-center">Edit FAQ</h2>

@stop

@section('content')

<div class="container">



            <a class="btn btn-warning mb-5" href="{{ route('admin.faq.index') }}">FAQ list</a>


            @if (session('message'))
                <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
            @endif

            <form action="{{route('admin.faq.update', $faq->id)}}" method="POST" class="w-75">
                @csrf
                @method('PUT')
            <div class="form-group">
                <label>Question:</label>
                <input class="form-control" type="text" name="question" placeholder="Type question"
                value="{{$faq->question}}" >
                @error('question')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Answer:</label>
                <input class="form-control" type="text" name="answer" placeholder="Type answer"
                value="{{$faq->answer}}" >
                @error('answer')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="update">
            </form>

</div>

@endsection
