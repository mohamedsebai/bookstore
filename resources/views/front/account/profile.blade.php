@extends('front.master')
@section('title', 'profile')

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

      <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
        @include('front.templates.account_controle')
        

        
        <div class="profile__left mt-4 mt-md-0 w-100">
          <div class="profile__tab-content active">
            <p class="mb-5">
              مرحبا <span class="fw-bolder">moamenyt</span> (لست
              <span class="fw-bolder">moamenyt</span>?
              <a class="text-danger" href="">تسجيل الخروج</a>)
            </p>

            <p>
              من خلال لوحة تحكم الحساب الخاص بك، يمكنك استعراض
              <a class="text-danger" href="{{route('front.orders.index')}}">أحدث الطلبات</a>،
              والفواتير 
              الخاصة بك، بالإضافة إلى
              <a class="text-danger" href="{{route('front.account.profile')}}">تعديل كلمة المرور وتفاصيل حسابك</a>.
            </p>
          </div>
        </div>
      </section>
    </main>
@endsection