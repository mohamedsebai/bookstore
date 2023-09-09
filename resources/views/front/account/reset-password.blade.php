@extends('front.master')
@section('title', 'forget-password')

@section('content')

<main>
      <section
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >

    @if (session('status'))
        <div class="btn btn-success">{{session('status')}}</div> 
    @endif
           <form method="POST" action="{{ route('password.store') }}" style="margin: 100px" >
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="input-group rounded-1 mb-3">
                    <input
                    name="email"
                    type="text"
                    class="form-control p-3"
                    placeholder="البريد الالكتروني"
                    aria-label="Email"
                    aria-describedby="basic-addon1"
                    />
                    <span
                    class="input-group-text login__input-icon"
                    id="basic-addon1"
                    >
                    <i class="fa-solid fa-envelope"></i>
                    </span>
                </div>
                @error('email')
                    <div class="btn btn-danger m-0 p-0">{{$message}}</div>
                @enderror
                <div class="input-group rounded-1 mb-3">
                    <input
                    name="password"
                    type="password"
                    class="form-control p-3"
                    placeholder="كلمة السر"
                    aria-label="Password"
                    aria-describedby="basic-addon1"
                    />
                    <span
                    class="input-group-text login__input-icon"
                    id="basic-addon1"
                    >
                    <i class="fa-solid fa-key"></i>
                    </span>
                </div>
                @error('password')
                    <div class="btn btn-danger m-0 p-0">{{$message}}</div>
                @enderror

                <div class="input-group rounded-1 mb-3">
                    <input
                    name="password_confirmation"
                    type="password"
                    class="form-control p-3"
                    placeholder="كلمة السر"
                    aria-label="Password"
                    aria-describedby="basic-addon1"
                    />
                    <span
                    class="input-group-text login__input-icon"
                    id="basic-addon1"
                    >
                    <i class="fa-solid fa-key"></i>
                    </span>
                </div>
                @error('password_confirmation')
                    <div class="btn btn-danger m-0 p-0">{{$message}}</div>
                @enderror

                <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
                    
                reset password
                </button>
        </form> 

      </section>
</main>

@endsection