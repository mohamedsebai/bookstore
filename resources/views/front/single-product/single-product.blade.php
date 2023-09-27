@extends('front.master')
@section('title', 'single-product')

@section('content')

    <main>
      <!-- Product details Start -->
      <section class="section-container my-5 pt-5 d-md-flex gap-5">
        <div class="single-product__img w-100" id="main-img">
          <img src="{{url('admin/assets/images/products/', $product->img)}}" alt="">
        </div>
        <div class="single-product__details w-100 d-flex flex-column justify-content-between">
          <div>
            <h4>{{ $product->title }}</h4>
            <div class="product__author">{{ $product->auther }}</div>
            <div class="product__author">{{ $product->pages_num }} pages</div>
            <div class="product__price mb-3 text-center d-flex gap-2">
              <span class="product__price product__price--old fs-6 ">
                {{ $product->price }}
              </span>
              <span class="product__price fs-5">
                {{ $product->price - $product->discount }}
              </span>
            </div>
            <div class="d-flex w-100 gap-2 mb-3">


              @if (session('message'))
                  <div class="alert alert-success">{{ session('message') }}</div>
              @endif

              <form action="{{ route('front.cart.store', $product->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="number" name="quantity" class="form-control mt-2 mb-2" placeholder="type quantity">
                </div>

                <input type="submit" class="single-product__add-to-cart primary-button w-100" value="added to your cart">
              </form>
              {{-- <a class="single-product__add-to-cart primary-button w-100" href="{{ route('front.cart.store') }}">ة</a> --}}
            </div>
            <div class="single-product__favourite d-flex align-items-center gap-2 mb-4">
              <i class="fa-regular fa-heart"></i>
              <form action="{{ route('front.cart.addToFav', $product->id) }}" method="post">
                @csrf
                <input type="submit" class="single-product__add-to-cart primary-button w-100" value="added to favourit">
              </form>
            </div>
          </div>
          <div class="single-product__categories">
            <p class="mb-0">رمز المنتج:  {{ $product->product_code }}  </p>
            <div>
            <span>التصنيفات:
                </span>
                @foreach ($categories as $category)
                <a href="{{route('front.shop.index')}}">
                    {{ $category->title }},
                </a>
                @endforeach

            </div>
            <div>
                <span>الوسوم: </span>
                @foreach ($tags as $tag)
                    <a href="{{route('front.shop.index')}}">
                        {{ $tag->title }},
                    </a>
                @endforeach
            </div>
          </div>
        </div>
      </section>
      <!-- Product details End -->

      <!-- Description and questions Start -->
      <section class="section-container">
        <nav class="mb-0 ">
          <div class="nav nav-tabs single-product__nav pb-0 gap-2" id="nav-tab" role="tablist">
            <button class="single-product__tab nav-link active" id="single-product__describtion-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
              الوصف
            </button>
            <button class="single-product__tab nav-link" id="single-product__questions-tab" data-bs-toggle="tab" data-bs-target="#single-product__questions" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
              الاسئلة الشائعة
            </button>
          </div>
        </nav>
        <div class="tab-content pt-4" id="nav-tabContent">
          <div class="tab-pane show active" id="nav-description" role="tabpanel" aria-labelledby="single-product__describtion-tab" tabindex="0">
            {{ $product->title }}
          </div>
          <div class="questions tab-pane" id="single-product__questions" role="tabpanel" aria-labelledby="single-product__questions-tab" tabindex="0">
            <div class="questions__list accordion" id="question__list">

            @foreach ($faqs as $faq)
            <div class="questions__item accordion-item">
                <h2 class="questions__header accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     {{ $faq->question }}
                </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#question__list">
                  <div class="accordion-body">
                    {{ $faq->answer }}

                  </div>
                </div>
              </div>
            @endforeach
            <a class="text-danger" href="{{route('front.refund.policy.index')}}">سياسة الاسترجاع والاستبدال</a>.


            </div>
          </div>
        </div>
      </section>
      <!-- Description and questions End -->

      <!-- Features Start -->
      <section class="section-container py-5">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="{{url('front/assets/images/feature-1.png')}}" alt="">
              </div>
              <div>
                <h6 class="features__item-title m-0">شحن سريع</h6>
                <p class="features__item-text m-0">سعر شحن موحد لجميع المحافظات ويصلك في أقل من 72 ساعة</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="{{url('front/assets/images/feature-2.png')}}" alt="">
              </div>
              <div>
                <h6 class="features__item-title m-0">ضمان الجودة</h6>
                <p class="features__item-text m-0">خامات عالية الجودة ومرونه فى طلبات الاستبدال والاسترجاع</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="{{url('front/assets/images/feature-3.png')}}" alt="">
              </div>
              <div>
                <h6 class="features__item-title m-0">دعم فني</h6>
                <p class="features__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="{{url('front/assets/images/feature-4.png')}}" alt="">
              </div>
              <div>
                <h6 class="features__item-title m-0">استبدال سهل</h6>
                <p class="features__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Features End -->

      <!-- May love Start -->
      <section class="section-container">
        <div class="d-flex gap-4 align-items-center w-100 mb-4">
          <h5 class="m-0">قد يعجبك ايضا...</h5>
          <hr class="flex-grow-1">
        </div>
        <div class="row">
          <div class="products__item col-6 col-md-4 col-lg-3 mb-5">

            @foreach ($products as $all_prdouct)
            <div class="product__header mb-3">
                <a href="{{route('front.single.product.index', $all_prdouct->id)}}">
                  <div class="product__img-cont">
                    <img class="product__img w-100 h-100 object-fit-cover" src="{{url('admin/assets/images/products/', $all_prdouct->img)}}" data-id="white">
                  </div>
                </a>
                <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                  {{ $all_prdouct->discount }}وفر
                </div>
                <div
                  class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                  <i class="fa-regular fa-heart"></i>
                </div>
              </div>
              <div class="product__title text-center">
                <a class="text-black text-decoration-none" href="{{route('front.single.product.index', $all_prdouct->id)}}">
                  {{ $all_prdouct->title }}
                </a>
              </div>
              <div class="product__author text-center">
                {{ $all_prdouct->auther }}
              </div>
              <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                <span class="product__price product__price--old">
                    {{ $all_prdouct->price }}
                </span>
                <span class="product__price">
                    {{ $all_prdouct->price - $all_prdouct->discount}}
                </span>
              </div>
            @endforeach

          </div>
        </div>
      </section>
      <!-- May love End -->

      <!-- Related products Start -->
      <section class="section-container">
        <div class="d-flex gap-4 align-items-center w-100 mb-4">
          <h5 class="m-0">منتجات ذات صلة</h5>
          <hr class="flex-grow-1">
        </div>
        <div class="row">
          <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
            @foreach ($products as $all_prdouct)
            <div class="product__header mb-3">
                <a href="{{route('front.single.product.index', $all_prdouct->id)}}">
                  <div class="product__img-cont">
                    <img class="product__img w-100 h-100 object-fit-cover" src="{{url('admin/assets/images/products/', $all_prdouct->img)}}" data-id="white">
                  </div>
                </a>
                <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                  {{ $all_prdouct->discount }}وفر
                </div>
                <div
                  class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                  <i class="fa-regular fa-heart"></i>
                </div>
              </div>
              <div class="product__title text-center">
                <a class="text-black text-decoration-none" href="{{route('front.single.product.index', $all_prdouct->id)}}">
                  {{ $all_prdouct->title }}
                </a>
              </div>
              <div class="product__author text-center">
                {{ $all_prdouct->auther }}
              </div>
              <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
                <span class="product__price product__price--old">
                    {{ $all_prdouct->price }}
                </span>
                <span class="product__price">
                    {{ $all_prdouct->price - $all_prdouct->discount}}
                </span>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- Related products End -->

      <!-- Users comments Start -->
      <section class="section-container comments mb-5">
        <div class="d-flex gap-4 align-items-center w-100 mb-4">
          <h5 class="m-0">أعرف اراء عملاؤنا</h5>
          <hr class="flex-grow-1">
        </div>
        <div class="comments__slider owl-carousel owl-theme">
          <div class="comments__item">
            <div class="comments__icon">
              <img class="w-100" src="{{url('front/assets/images/quote.png')}}" alt="">
            </div>
            <div class="comments__text mb-3">
              الكتاب جميل جدا
            </div>
            <div class="comments__author d-flex align-items-center gap-2">
              <div class="comments__author-dash"></div>
              <div class="comments__author-name fw-bolder">
                Moamen Sherif
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Users comments End -->
    </main>
@endsection
