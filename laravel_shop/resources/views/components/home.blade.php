<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="https://i.pinimg.com/originals/d6/33/ed/d633ed747062ee3faca9c8b561500469.jpg">
    <title>Male-Fashion | Template</title>

    @include('includes.css')

</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Offcanvas Menu Begin -->
    @include('includes.cavas-menu')
    <!-- Offcanvas Menu End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p><marquee style="color:white;font-size: 20px"> Rose Shop Giữ Gìn Bản Sắc Viêt </marquee></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <!-- <div class="header__top__links"> -->
                                <!-- <a href="http://127.0.0.1:8000/login" class="text-sm text-gray-700 underline">Log in</a> -->
                                <!-- Authentication -->
<!--                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form> -->

            <!--  <a href="#">Sign in</a> -->
            <!-- <a href="#">FAQs</a> -->
            <!-- </div> -->
                               <!--  <div class="header__top__hover">
                                    <span>Usd <i class="arrow_carrot-down"></i></span>
                                    <ul>
                                        <li>USD</li>
                                        <li>EUR</li>
                                        <li>USD</li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="header__logo">
                            <a href="/"><img src="/fashion/img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="/">Trang Chủ</a></li>
                                <li><a href="/shop">Shop</a></li>
                                <li><a href="#">Các Trang</a>
                                    <ul class="dropdown">
                                        <li><a href="/about">Về chúng tôi</a></li>
                                        <!-- <li><a href="detail">Shop Details</a></li> -->
                                        <li><a href="/cart">Giỏ hàng</a></li>
                                        <li><a href="/checkout">Thanh toán</a></li>
                                        <li><a href="/blog-detail">Chi tiết blog</a></li>
                                    </ul>
                                </li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/contact">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__nav__option">
                            <a href="#" class="search-switch"><img src="/fashion/img/icon/search.png" alt=""></a>
                            <a href="#"><img src="/fashion/img/icon/heart.png" alt=""></a>
                            <a href="/showcart"><img src="/fashion/img/icon/cart.png" alt=""> 
                            </a>
                            <div class="price">
                                [<span class="cart-quantity">{{ showCartQuantity() }}</span>]
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </header>
        <!-- Header Section End -->
        @yield('section')
        <!-- Footer Section Begin -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__logo">
                                <a href="#"><img src="/fashion/img/logo.png" alt=""></a>
                            </div>
                            <p>Khách hàng là trọng tâm của mô hình kinh doanh độc đáo của chúng tôi, bao gồm cả thiết kế.</p>
                            <a href="#"><img src="/fashion/img/payment.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                        <div class="footer__widget">
                            <h6>MUA SẮM</h6>
                            <ul>
                                <li><a href="#">Cửa hàng quần áo</a></li>
                                <li><a href="#">Quần áo Xu hướng</a></li>
                                <li><a href="#">Phụ kiện</a></li>
                                <li><a href="#">Giảm giá</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="footer__widget">
                            <h6>MUA SẮM</h6>
                            <ul>
                                <li><a href="#">Liên hệ chúng tôi</a></li>
                                <li><a href="#">Phương thức thanh toán</a></li>
                                <li><a href="#">Chuyển</a></li>
                                <li><a href="#">Trả lại & Trao đổi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                        <div class="footer__widget">
                            <h6>BỨC THƯ MỚI</h6>
                            <div class="footer__newslatter">
                                <p>Hãy là người đầu tiên biết về hàng mới xuất hiện, xem sách, bán hàng và quảng cáo!</p>
                                <form>
                                    <input class="email1" type="text" placeholder="Your email">
                                    <button class="newmail" type="submit"><span class="icon_mail_alt"></span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="footer__copyright__text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <p>Copyright © 2020 - 
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                All rights reserved | Copyright by  <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://devvina.com" target="_blank">Giang Rosé</a>
                            </p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Search Begin -->
        @include('includes.search-begin')     
        <!-- Search End -->
        @include('includes.js')     
        <!-- Js Plugins -->
        @yield('script')
    </body>

    </html>