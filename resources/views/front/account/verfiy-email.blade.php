
@extends('front.master')
@section('title', 'forget-password')

@section('content')
<main class="text-center">

      <div class="">
        Thanks for signing up! Before getting started, 
        could you verify your email address <p> by clicking on the link we 
        just emailed to you? If you didn\'t receive the email, we will 
        gladly send you another</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            A new verification link has been sent to the email 
            address you provided during registration
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" class="mt-5 mb-4">
        @csrf
        <input type="submit" class="btn btn-danger" value="verfiy email">
    </form>

    <form method="POST" action="{{ route('logout') }}" class="mt-5 mb-4">
        @csrf
        <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            Log Out
        </button>
    </form>

</main>
@endsection