@extends('front.master')
@section('title', 'orders')

@section('content')
<main>
    <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
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
      <div class="profile__right">
        <div class="profile__user mb-3 d-flex gap-3 align-items-center">
          <div class="profile__user-img rounded-circle overflow-hidden">
            <img class="w-100" src="{{url('front/assets/images/user.png')}}" alt="">
          </div>
          <div class="profile__user-name">moamenyt</div>
        </div>
        <ul class="profile__tabs list-unstyled ps-3">
          <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="{{route('front.account.profile')}}">لوحة التحكم</a>
          </li>
          <li class="profile__tab active">
            <a class="py-2 px-3 text-black text-decoration-none" href="{{route('front.orders.index')}}">الطلبات</a>
          </li>
          <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="{{route('front.account.details')}}">تفاصيل الحساب</a>
          </li>
          <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="{{route('front.favourite.index')}}">المفضلة</a>
          </li>
          <li class="profile__tab">
            <a class="py-2 px-3 text-black text-decoration-none" href="">تسجيل الخروج</a>
          </li>
        </ul>
      </div>
      <div class="profile__left mt-4 mt-md-0 w-100">
        <div class="profile__tab-content orders active">
          <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4">
            <p class="m-0">لم يتم تنفيذ اي طلب بعد.</p>
            <a class="primary-button" href="{{ route('front.shop.index') }}">تصفح المنتجات</a>
          </div>

          <table class="orders__table w-100">
            <thead>
              <th class="d-none d-md-table-cell">الطلب</th>
              <th class="d-none d-md-table-cell">التاريخ</th>
              <th class="d-none d-md-table-cell">الحالة</th>
              <th class="d-none d-md-table-cell">الاجمالي</th>
            </thead>
            <tbody>

            @foreach ($orders as $order)
            <tr class="order__item">
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">الطلب:</div>
                  <div><a href="">#{{ $order->id }}</a></div>
                </td>
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">التاريخ:</div>
                  <div>{{ $order->created_at }}</div>
                </td>
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">الحالة:</div>
                  <div>{{ $order->status == 1 ? 'Complated' : 'Not Complated' }}</div>
                </td>
                <td class="d-flex justify-content-between d-md-table-cell">
                  <div class="d-md-none">الاجمالي:</div>
                  <div> {{ $order->total }}</div>
                </td>
              </tr>
            @endforeach



            </tbody>
          </table>
        </div>

      </div>
    </section>
  </main>
@endsection
