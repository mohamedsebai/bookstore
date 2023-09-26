@extends('front.master')

@section('title', 'Home')

@section('content')
  <!-- Page Content Start -->
  <main class="pt-4">
    <!-- Hero Section Start -->
    <section class="section-container hero">
      <div class="owl-carousel hero__carousel owl-theme">

        @isset($sliders)
            @forelse ($sliders as $slider)
            <div class="hero__item">
                <img class="hero__img" src="{{url('admin/assets/images/sliders/'  . $slider->img)}}" alt="">
            </div>
            @empty
            <div class="hero__item">
                <img class="hero__img" src="{{url('front/assets/images/carousel-2.png')}}" alt="">
            </div>
            @endforelse
        @endisset

      </div>
    </section>
    <!-- Hero Section End -->

    <!-- Offer Section Start -->
    <section class="section-container mb-5 mt-3">
      <div class="offer d-flex align-items-center justify-content-between rounded-3 p-3 text-white">
        <div class="offer__title fw-bolder">
          عروض اليوم
        </div>
        <div class="offer__time d-flex gap-2 fs-6">
          <div class="d-flex flex-column align-items-center">
            <span class="fw-bolder">06</span>
            <div>ساعات</div>
          </div>:
          <div class="d-flex flex-column align-items-center">
            <span class="fw-bolder">10</span>
            <div>دقائق</div>
          </div>:
          <div class="d-flex flex-column align-items-center">
            <span class="fw-bolder">13</span>
            <div>ثواني</div>
          </div>
        </div>
      </div>
    </section>
    <!-- Offer Section End -->

    <!-- Products Section Start -->
    <section class="section-container mb-4">
      <div class="owl-carousel products__slider owl-theme">

        @isset($products)
            @forelse ($products as $product)
            <div class="products__item">
                <div class="product__header mb-3">
                  <a href="{{route('front.single.product.index', $product->id)}}">
                    <div class="product__img-cont">
                      <img class="product__img w-100 h-100 object-fit-cover" src="{{url('admin/assets/images/products/'. $product->img)}}" data-id="white">
                    </div>
                  </a>
                  <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                    وفر 10%
                  </div>
                  <div
                    class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                    <i class="fa-regular fa-heart"></i>
                  </div>
                </div>
                <div class="product__title text-center">
                  <a class="text-black text-decoration-none" href="{{route('front.single.product.index', $product->id)}}">
                    {{ $product->title }}
                  </a>
                </div>
                <div class="product__author text-center">
                  {{ $product->auther }}
                </div>
                <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                  <span class="product__price product__price--old">
                    {{ $product->price }}
                  </span>
                  <span class="product__price">
                    {{ $product->price - $product->discount }}
                  </span>
                </div>
              </div>
            @empty
                nothing
            @endforelse
        @endisset



      </div>
    </section>
    <!-- Products Section End -->

    <!-- Categories Section Start -->
    <section class="section-container mb-5">
        <div class="categories row gx-4">

        @isset($banners)
            @foreach ($banners as $banner)
            <div class="col-md-6 p-2">
                <div class="p-4 border rounded-3">
                    <img class="w-100" src="{{url('admin/assets/images/banners/' . $banner->img)}}" alt="">
                </div>
            </div>
            @endforeach
        @endisset
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Best Sales Section Start -->
    <section class="section-container mb-5">
      <div class="products__header mb-4 d-flex align-items-center justify-content-between">
        <h4 class="m-0">الاكثر مبيعا</h4>
        <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
      </div>
      <div class="owl-carousel products__slider owl-theme">
        <div class="products__item">
            @isset($products)
            @forelse ($products as $product)
            <div class="products__item">
                <div class="product__header mb-3">
                  <a href="{{route('front.single.product.index', $product->id)}}">
                    <div class="product__img-cont">
                      <img class="product__img w-100 h-100 object-fit-cover" src="{{url('admin/assets/images/products/'. $product->img)}}" data-id="white">
                    </div>
                  </a>
                  <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                    وفر 10%
                  </div>
                  <div
                    class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                    <i class="fa-regular fa-heart"></i>
                  </div>
                </div>
                <div class="product__title text-center">
                  <a class="text-black text-decoration-none" href="{{route('front.single.product.index', $product->id)}}">
                    {{ $product->title }}
                  </a>
                </div>
                <div class="product__author text-center">
                  {{ $product->auther }}
                </div>
                <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                  <span class="product__price product__price--old">
                    {{ $product->price }}
                  </span>
                  <span class="product__price">
                    {{ $product->price - $product->discount }}
                  </span>
                </div>
              </div>
            @empty
                nothing
            @endforelse
        @endisset
        </div>
      </div>
    </section>
    <!-- Best Sales Section End -->

    <!-- Newest Section Start -->
    <section class="section-container mb-5">
      <div class="products__header mb-4 d-flex align-items-center justify-content-between">
        <h4 class="m-0">وصل حديثا</h4>
        <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
      </div>
      <div class="owl-carousel products__slider owl-theme">
        <div class="products__item">
            @isset($products)
            @forelse ($products as $product)
            <div class="products__item">
                <div class="product__header mb-3">
                  <a href="{{route('front.single.product.index', $product->id)}}">
                    <div class="product__img-cont">
                      <img class="product__img w-100 h-100 object-fit-cover" src="{{url('admin/assets/images/products/'. $product->img)}}" data-id="white">
                    </div>
                  </a>
                  <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                    وفر 10%
                  </div>
                  <div
                    class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                    <i class="fa-regular fa-heart"></i>
                  </div>
                </div>
                <div class="product__title text-center">
                  <a class="text-black text-decoration-none" href="{{route('front.single.product.index', $product->id)}}">
                    {{ $product->title }}
                  </a>
                </div>
                <div class="product__author text-center">
                  {{ $product->auther }}
                </div>
                <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                  <span class="product__price product__price--old">
                    {{ $product->price }}
                  </span>
                  <span class="product__price">
                    {{ $product->price - $product->discount }}
                  </span>
                </div>
              </div>
            @empty
                nothing
            @endforelse
        @endisset
        </div>
      </div>
    </section>
    <!-- Newest Section End -->
  </main>
  <!-- Page Content End -->
@endsection
