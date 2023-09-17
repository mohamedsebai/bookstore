@extends('adminlte::page')

@section('title', 'faq')

@section('content_header')

    <h2 class="text-center">Add FAQ</h2>

@stop

@section('content')

<div class="container">


            <a class="btn btn-warning mb-5" href="{{ route('admin.faq.index') }}">FAQ list</a>


            @if (session('message'))
                <div class="alert alert-success m-2 mb-2 p-0">{{session('message')}}</div>
            @endif


            <form action="{{route('admin.faq.store')}}" method="POST" class="w-75">
                @csrf
            <div class="form-group">
                <label>Question:</label>
                <input class="form-control" type="text" name="question" placeholder="Type question"
                value="{{old('question')}}" >
                @error('question')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Answer:</label>
                <input class="form-control" type="text" name="answer" placeholder="Type answer"
                value="{{old('answer')}}" >
                @error('answer')
                    <div class="alert alert-danger m-2 mb-2 p-0">{{ $message }}</div>
                @enderror
            </div>

            <input type="submit" class="btn btn-primary" value="add">

            </form>


</div>

@endsection
