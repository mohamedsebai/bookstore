<div class="profile__right mb-5">
          <div class="profile__user mb-3 d-flex gap-3 align-items-center">
            <div class="profile__user-img rounded-circle overflow-hidden">
              <img class="w-100" src="{{url('front/assets/images/user.png')}}" alt="" />
            </div>
            <div class="profile__user-name">moamenyt</div>
          </div>
          <ul class="profile__tabs list-unstyled ps-3">
            <li class="profile__tab active">
              <a class="py-2 px-3 text-black text-decoration-none" href="{{route('front.account.profile')}}">لوحة التحكم</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="{{route('front.orders.index')}}">الطلبات</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="{{route('front.orders.details')}}">تفاصيل الحساب</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="{{route('front.favourite.index')}}">المفضلة</a>
            </li>
            <li class="profile__tab">
              <form action="{{route('logout')}}" method="post">
                @csrf
                <input type="submit" class="btn btn-danger m-0 p-0" value="logout">
              </form>
            </li>
          </ul>
        </div>