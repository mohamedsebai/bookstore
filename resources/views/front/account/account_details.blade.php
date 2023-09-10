@extends('front.master')
@section('title', 'account-details')

@section('content')

    <main>
      <section
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>حسابي</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="{{route('front.home.index')}}">الرئيسية</a> /
            <span class="text-gray">حسابي</span>
          </div>
        </div>
      </section>

      <section
        class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5"
      >
      @include('front.templates.account_controle')
  
        <div class="profile__left mt-4 mt-md-0 w-100">
          <div class="profile__tab-content active">


            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
              @csrf
            </form>



            @if (session('status') === 'profile-updated')
                <div class="alert alert-success">{{session('status')}}</div> 
            @endif

            
            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')
              <div class="d-flex gap-3 mb-3">

                <div class="w-100">
                  <label class="fw-bold mb-2" for="name">
                    الاسم  <span class="required">*</span>
                  </label>
                  <input type="text" class="form__input" id="name" name="name" value="{{Auth::user()->name}}" />
                </div>
              </div>

              <div class="w-100 mb-3">
                <label class="fw-bold mb-2" for="email">
                  البريد الالكتروني<span class="required">*</span>
                </label>
                <input type="text" class="form__input" id="email" name="email" value="{{Auth::user()->email}}"/>
                
              </div>

              @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! Auth::user()->hasVerifiedEmail())
                <div>
                    <p class="btn btn-primary text-sm mt-2 text-gray-800 dark:text-gray-200">
                        Your email address is unverified

                        <button form="send-verification" class="btn btn-warning underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            Click here to re-send the verification email
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 btn btn-success">
                            A new verification link has been sent to your email address
                        </p>
                    @endif
                </div>
            @endif

              <button class="primary-button">save</button>
            </form>





            @if (session('status') === 'password-updated')
                <div class="btn btn-success mt-5 mb-5" >{{ session('status') }}</div>
            @endif

              <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('put')
          
              <fieldset>

                <legend class="fw-bolder">تغيير كلمة المرور</legend>

                <div class="w-100 mb-3">
                  <label class="fw-bold mb-2" for="curr-password">
                    كلمة المرور الحالية (اترك الحقل فارغاً إذا كنت لا تودّ
                    تغييرها)
                  </label>
                  <input type="text" class="form__input" id="curr-password" name="current_password"/>
                  @error('current_password')
                    <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>

                <div class="w-100 mb-3">
                  <label class="fw-bold mb-2" for="curr-password">
                    كلمة المرور الجديدة (اترك الحقل فارغاً إذا كنت لا تودّ
                    تغييرها)
                  </label>
                  <input type="text" class="form__input" id="curr-password" name="password"/>
                  @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>


                <div class="w-100 mb-3">
                  <label class="fw-bold mb-2" for="curr-password">
                    تأكيد كلمة المرور الجديدة
                  </label>
                  <input type="text" class="form__input" id="curr-password" name="password_confirmation"/>
                  @error('password_confirmation')
                    <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>


                <button class="primary-button">تغيير كلمة المرور</button>
              </fieldset>
            </form>

          </div>
        </div>
      </section>
    </main>
@endsection