@extends('front.master')
@section('title', 'account')

@section('content')
    <main>
      <div
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
      </div>

      <div class="page-full pb-5">
        <div class="account account--login mt-5 pt-5">
          <div class="account__tabs w-100 d-flex mb-3">
            <div
              class="account__tab account__tab--login text-center fs-6 py-3 w-50"
            >
              تسجيل الدخول
            </div>
            <div
              class="account__tab account__tab--register text-center fs-6 py-3 w-50"
            >
              حساب جديد
            </div>
          </div>
          <div class="account__login w-100">
            <form class="mb-5" action="{{route('login')}}" method="post">
              @csrf
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

              <div class="login__bottom d-flex justify-content-between mb-3">
                @if (Route::has('password.request'))
                    <a class="login__forget-btn"
                    href="href="{{ route('password.request') }}"">نسيت كلمة المرور؟</a>
                @endif
                <div>
                  <input type="checkbox" name="remember" id="remember"/>
                  <label for="remember">تذكرني</label>
                </div>

              </div>

              <button class="text-center fs-6 py-2 w-100
                      bg-black text-white border-0 rounded-1">تسجيل الدخول
              </button>

              @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
              @endif
            </form>

            
          </div>



          <div class="account__register w-100">
            <form class="mb-5" action="{{ route('register') }}" method="post">
              @csrf
              <div class="input-group rounded-1 mb-3">
                <input
                  name="name"
                  type="text"
                  class="form-control p-3"
                  placeholder="الاسم كامل"
                  aria-label="Username"
                  aria-describedby="basic-addon1"
                />
                <span
                  class="input-group-text login__input-icon"
                  id="basic-addon1"
                >
                  <i class="fa-solid fa-user"></i>
                </span>
              </div>
              @error('name')
                <div class="btn btn-danger m-0 p-0">{{$message}}</div>
              @enderror


              <div class="input-group rounded-1 mb-3">
                <input
                  name="email"
                  type="text"
                  class="form-control p-3"
                  placeholder="البريد الالكتروني"
                  aria-label="Email"
                  aria-describedby="basic-addon1"
                />
                <span class="input-group-text login__input-icon" id="basic-addon1">
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
                  placeholder=" مره اخري كلمة السر"
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

              <button type="submit" class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1">
                حساب جديد
              </button>
            </form>
            <a class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1" href="{{ route('login') }}">
                Already registered?
            </a>
          </div>
          
        </div>
      </div>
    </main>
@endsection




