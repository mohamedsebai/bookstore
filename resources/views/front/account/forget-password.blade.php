@extends('front.master')
@section('title', 'forget-password')

@section('content')

<main>
      <section
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
      </section>

<p> 
                فقدت كلمة المرور الخاصة بك؟ الرجاء إدخال عنوان البريد الإلكتروني
                الخاص بك. ستتلقى رابطا لإنشاء كلمة مرور جديدة عبر البريد
                الإلكتروني.
    </p>

    @if (session('status'))
        <div class="btn btn-success">{{session('status')}}</div> 
    @endif
            <form action="{{ route('password.email') }}" method="POST" style="margin: 100px" >
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                @error('email')
                    <div class="btn btn-danger m-0 p-0">{{$message}}</div>
                @enderror
                <button class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
                    
                Email Password Reset Link
                </button>
        </form> 


</main>
    



@endsection