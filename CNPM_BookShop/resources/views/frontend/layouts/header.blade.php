 <!-- Page Preloder -->
 <div id="preloder">
     <div class="loader"></div>
 </div>

 <!-- Offcanvas Menu Begin -->
 <div class="offcanvas-menu-overlay"></div>
 <div class="offcanvas-menu-wrapper">
     <div class="offcanvas__option">
         <div class="offcanvas__links">
             @auth
                 <a href="{{ route('user.logout') }}">Đăng xuất</a>
             @else
                 <a href="{{ route('login.form') }}">Đăng nhập</a>
             @endauth

             {{-- <a href="#">FAQs</a> --}}
         </div>
     </div>
     <div class="offcanvas__nav__option">
         <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
         <a href="#"><img src="img/icon/heart.png" alt=""></a>
         <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
         <div class="price">$0.00</div>
     </div>
     <div id="mobile-menu-wrap"></div>
     <div class="offcanvas__text">
         <p>Miễn phí vận chuyển, Hoàn trả hàng trong vòng 30 ngày.</p>
     </div>
 </div>
 <!-- Offcanvas Menu End -->

 <!-- Header Section Begin -->
 <header class="header">
     <div class="header__top">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 col-md-7">
                     @php
                         $settings = DB::table('settings')->get();
                     @endphp
                     <div class="header__top__left">
                         <p>Miễn phí vận chuyển, Hoàn trả hàng trong vòng 30 ngày.</p>

                     </div>
                 </div>
                 <div class="col-lg-6 col-md-5">
                     <div class="header__top__right">
                         <div class="header__top__links">
                             @auth
                                 <a href="{{ route('user.logout') }}">Đăng xuất</a>
                                 <a href="{{ route('user') }}">Tài khoản</a>
                             @else
                                 <a href="{{ route('login.form') }}">Đăng nhập</a>
                                 <a href="{{ route('register.form') }}">Đăng ký</a>
                             @endauth
                             {{-- <a href="#">FAQs</a> --}}
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="container">
         <div class="row">
             <div class="col-lg-3 col-md-3">
                 <div class="header__logo">
                     <a href="{{ route('home') }}">
                         @php
                             $logo = DB::table('settings')->get();
                         @endphp
                         @foreach ($logo as $key => $logos)
                             <img src="{{ $logos->logo }}" alt="">
                     </a>
                     @endforeach

                 </div>
             </div>
             <div class="col-lg-6 col-md-6">
                <x-MenuComponent />


             </div>
             <div class="col-lg-3 col-md-3">
                 <div class="header__nav__option">
                     <a href="#" class="search-switch"><img src="{{ asset('frontend/img/icon/search.png') }}"
                             alt=""></a>
                     @auth
                         <a href="{{ route('wishlist') }}"><img src="{{ asset('frontend/img/icon/heart.png') }}"
                                 alt=""></a>
                         <a href="{{ route('cart') }}"><img src="{{ asset('frontend/img/icon/cart.png') }}"
                                 alt=""> <span>{{ count(Helper::getAllProductFromCart()) }}</span></a>
                         <div class="price">{{ number_format(Helper::totalCartPrice()), 2 }}VNĐ</div>
                     @else
                     @endauth

                 </div>
             </div>
         </div>
         <div class="canvas__open"><i class="fa fa-bars"></i></div>
     </div>
 </header>
 <!-- Header Section End -->
