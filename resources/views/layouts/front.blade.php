
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from apexa-html-demo.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 May 2024 01:43:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cencadian Summer Web Development</title>
    <meta name="description" content="Apexa - Business Consulting HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/assets/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/main.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
</head>
<body>
<!--Preloader-->
<div id="preloader">
    <div id="loader" class="loader">
        <div class="loader-container">
            <div class="loader-icon"><img src="{{ asset('front/assets/img/favicon.png') }}" alt="Preloader"></div>
        </div>
    </div>
</div>
<!--Preloader-end -->
<!-- Scroll-top -->
<button class="scroll__top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->
@include('components.front.header')
<!-- main-area -->
<main class="fix">
    @include('components.front.main')
</main>
<!-- main-area-end -->
<!-- footer-area -->
<footer>
    <div class="footer-area">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            {{--                            <div class="fw-logo mb-25">--}}
                            {{--                                <a href='index.html'><img src="{{ asset('front/assets/img/logo/logo.png') }}" alt=""></a>--}}
                            {{--                            </div>--}}
                            <div class="footer-content">
                                <p>Contact us for more information!</p>
                                <div class="footer-social">
                                    <ul class="list-wrap">
                                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">Contact Information</h4>
                            <div class="footer-info-list">
                                <ul class="list-wrap">
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-phone-call"></i>
                                        </div>
                                        <div class="content">
                                            <a href="tel:0123456789">+1 (204) 930 0378</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <a href="admin@cencadian.ca">admin@cencadian.ca</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-pin"></i>
                                        </div>
                                        <div class="content">
                                            <p>Winnipeg, Manitoba, Canada.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h4 class="fw-title">Top Links</h4>
                            <div class="footer-link-list">
                                <ul class="list-wrap">
                                    <li><a href='#'>Homepage</a></li>
                                    <li><a href='#about'>About</a></li>
                                    <li><a href='#contact'>Apply</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-shape">
            <img src="{{ asset('front/assets/img/images/footer_shape01.png') }}" alt="" data-aos="fade-right" data-aos-delay="400">
            <img src="{{ asset('front/assets/img/images/footer_shape02.png') }}" alt="" data-aos="fade-left" data-aos-delay="400">
            <img src="{{ asset('front/assets/img/images/footer_shape03.png') }}" alt="" data-parallax='{"x" : 100 , "y" : -100 }'>
        </div>
    </div>
</footer>
<!-- footer-area-end -->
<!-- JS here -->
<script src="{{ asset('front/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.odometer.min.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.appear.js') }}"></script>
<script src="{{ asset('front/assets/js/gsap.js') }}"></script>
<script src="{{ asset('front/assets/js/ScrollTrigger.js') }}"></script>
<script src="{{ asset('front/assets/js/SplitText.js') }}"></script>
<script src="{{ asset('front/assets/js/gsap-animation.js') }}"></script>
<script src="{{ asset('front/assets/js/jquery.parallaxScroll.min.js') }}"></script>
<script src="{{ asset('front/assets/js/swiper-bundle.js') }}"></script>
<script src="{{ asset('front/assets/js/ajax-form.js') }}"></script>
<script src="{{ asset('front/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('front/assets/js/aos.js') }}"></script>
<script src="{{ asset('front/assets/js/main.js') }}"></script>
<script>
    const text = document.querySelector('.circle');
    text.innerHTML = text.textContent.replace(/\S/g, "<span>$&</span>");
    const element = document.querySelectorAll('.circle span');
    for (let i = 0; i < element.length; i++) {
        element[i].style.transform = "rotate(" + i * 17 + "deg)"
    }
</script>
</body>
</html>
