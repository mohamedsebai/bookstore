
@include('front.templates.header_links')
  <!-- Header Content Start -->
  <div>
    <div class="header-container fixed-top border-bottom">
      @include('front.templates.header')
      <!--    -->
      @include('front.templates.nav')

      @include('front.templates.right_sidebar')

      @include('front.templates.left_sidebar')
    </div>


    <!-- News Content Start -->
    <!-- <section class="sales text-center p-2 d-block d-lg-none">
      شحن مجاني للطلبات 💥 عند الشراء ب 699ج او اكثر
    </section> -->

    
    <!-- News Content End -->
  </div>
  <!-- Header Content End -->

  @yield('content')

@include('front.templates.footer')

@include('front.templates.footer_links')
