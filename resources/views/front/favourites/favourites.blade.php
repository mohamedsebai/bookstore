@extends('front.master')
@section('title', 'favourites')

@section('content')
    <main>
      <div
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>المفضلة</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="{{route('front.home.index')}}">الرئيسية</a> /
            <span class="text-gray">المفضلة</span>
          </div>
        </div>
      </div>

      <div class="my-5 py-5">
        <section class="section-container favourites">
          <table class="w-100">
            <thead>
                <th class="d-none d-md-table-cell"></th>
                <th class="d-none d-md-table-cell"></th>
                <th class="d-none d-md-table-cell">الاسم</th>
                <th class="d-none d-md-table-cell">السعر</th>
                <th class="d-none d-md-table-cell">المخزون</th>
                <th class="d-table-cell d-md-none">product</th>
            </thead>
            <tbody class="text-center">
                @foreach ($products as $product)
                    <tr>
                        <td class="d-block d-md-table-cell">
                        <span class="favourites__remove m-auto">
                            <i class="fa-solid fa-xmark"></i>
                        </span>
                        </td>
                        <td class="d-block d-md-table-cell favourites__img">
                        <img src="{{url('admin/assets/images/products', $product->img)}}" alt="" />
                        </td>
                        <td class="d-block d-md-table-cell">
                        <span href="">{{ $product->title }}</span>
                        </td>
                        <td class="d-block d-md-table-cell">
                        <span class="product__price product__price--old"
                            >{{ $product->price }} </span
                        >
                        <span class="product__price"> {{ $product->price -  $product->discount  }}</span>
                        </td>
                        <td class="d-block d-md-table-cell">
                        <span class="me-2"><i class="fa-solid fa-check"></i></span>
                        <span class="d-inline-block d-md-none d-lg-inline-block">


                        {{ $product->quantity == 0 ? 'غير متوفر بالمخزون   ' : 'متوفر بالمخزون'}}
                             </span>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            </table>
        </section>
        </div>
    </main>
@endsection
