@extends('front.master')
@section('title', 'account-details')

@section('content')

<div class="container m-5 py-5">
<main>
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="mb-4">
        This is a secure area of the application. 
        Please confirm your password before continuing.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        
        <div class="form-control">
            <input type="password" name="password" class="form-control">
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <input type="submit" class="btn btn-primary mb-3 mt-2" value="confirm">

    </form>

</main>
</div>

@endsection