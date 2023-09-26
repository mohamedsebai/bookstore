@extends('front.master')
@section('title', 'shop')

@section('content')

    <main>
      <div
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>المتجر</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="{{route('front.home.index')}}">الرئيسية</a> /
            <span class="text-gray">المتجر</span>
          </div>
        </div>
      </div>

      <div class="section-container d-block d-lg-flex gap-5 shop mt-5 pt-5">
        <div class="shop__filter mb-4">
          <div class="mb-4">
            <h6 class="shop__filter-title">بتدور علي ايه؟</h6>
            <form action="">
              <div class="filter__search position-relative">
                <input
                  class="w-100 py-1 ps-2"
                  type="text"
                  placeholder="بتدور علي ايه؟"
                />
                <div
                  class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center"
                >
                  <i class="fa-solid fa-magnifying-glass"></i>
                </div>
              </div>
            </form>
          </div>
          <div>

          </div>
        </div>
        <div class="shop__products w-100">
          <div class="row products__list">
            @foreach ($products as $product)
            <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
                <div class="product__header mb-3">
                  <a href="{{route('front.single.product.index', $product->id)}}">
                    <div class="product__img-cont">
                      <img
                        class="product__img w-100 h-100 object-fit-cover"
                        src="{{url('admin/assets/images/products/' , $product->img)}}"
                        data-id="white"
                      />
                    </div>
                  </a>
                  <div
                    class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white"
                  >
                    وفر {{ $product->discount }}
                  </div>
                  <div
                    class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white"
                  >
                    <i class="fa-regular fa-heart"></i>
                  </div>
                </div>
                <div class="product__title text-center">
                  <a
                    class="text-black text-decoration-none"
                    href="{{route('front.single.product.index', $product->id)}}"
                  >
                  {{ $product->title }}
                  </a>
                </div>
                <div class="product__author text-center">{{ $product->auther }}</div>
                <div
                  class="product__price text-center d-flex gap-2 justify-content-center flex-wrap"
                >
                  <span class="product__price product__price--old">
                    {{ $product->price }}
                  </span>
                  <span class="product__price"> {{ $product->price - $product->discount }}</span>
                </div>
              </div>
            @endforeach
          </div>

          <div class="container">
            <div class="row">
                <div class="col-12 mt-5">
                    @if ($products->hasPages())
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                            <li class="page-item {{ $products->currentPage() == 1 ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                                <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                <span class="sr-only"> {{ ('lang.Previous') }} </span>
                                </a>
                            </li>
                            @foreach ( $products->getUrlRange(1, $products->lastPage()) as $pageLink)
                            @php
                                //fuck you php iam mohamed seabeai
                                $pageString = strstr($pageLink, 'page=' , false);
                                $rev = strrev($pageString);
                                $pageNum = strstr($rev, '=' , true);
                                $pageNum = strrev($pageNum);
                            @endphp
                                <li class="page-item {{ substr($pageLink, -1) == $products->currentPage() ? 'active': '' }}">
                                    <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="page-item {{  $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                                <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                <span class="sr-only"> {{ ('lang.Next') }} </span>
                            </a>
                            </li>
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
      </div>
    </main>
@endsection
