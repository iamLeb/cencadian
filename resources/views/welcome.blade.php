

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
<!-- header-area -->
<header class="transparent-header">
    <div class="tg-header__top">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tg-header__top-info left-side list-wrap">
                        <li><i class="flaticon-phone-call"></i><a href="tel:0123456789">+1 (204) 930 0378</a></li>
                        <li><i class="flaticon-pin"></i>Winnipeg, Manitoba, Canada</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="tg-header__top-right list-wrap">
                        <li><i class="flaticon-envelope"></i><a href="mailto:admin@cencadian.ca">admin@cencadian.ca</a></li>
                        <li><i class="flaticon-time"></i>Mon-Fri: 09:00am - 04:00pm</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="tg-header__area">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href='index.html'>
                                    <img src="{{ asset('front/assets/img/logo-black.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="active"><a href='/'>Home</a></li>
                                    <li><a href='#about'>About Us</a></li>
                                    <li><a href='#contact'>Contact Us</a></li>
                                    <li><a href='/login'>Login </a></li>


                                    <li class="menu-item-has-children"><a href="#">Signup</a>
                                        <ul class="sub-menu">
                                            <li><a href='/register?key=company'>Company Register</a></li>
                                            <li><a href='/register?key=intern'>Intern Application</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="tgmenu__action d-none d-md-block">
                                <ul class="list-wrap">
                                    <li class="header-search">
                                        <a href="javascript:void(0)" class="search-open-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                                <path d="M19 19.0002L14.657 14.6572M14.657 14.6572C15.3999 13.9143 15.9892 13.0324 16.3912 12.0618C16.7933 11.0911 17.0002 10.0508 17.0002 9.00021C17.0002 7.9496 16.7933 6.90929 16.3913 5.93866C15.9892 4.96803 15.3999 4.08609 14.657 3.34321C13.9141 2.60032 13.0322 2.01103 12.0616 1.60898C11.0909 1.20693 10.0506 1 9.00002 1C7.94942 1 6.90911 1.20693 5.93848 1.60898C4.96785 2.01103 4.08591 2.60032 3.34302 3.34321C1.84269 4.84354 0.999817 6.87842 0.999817 9.00021C0.999817 11.122 1.84269 13.1569 3.34302 14.6572C4.84335 16.1575 6.87824 17.0004 9.00002 17.0004C11.1218 17.0004 13.1567 16.1575 14.657 14.6572Z" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="offCanvas-menu">
                                        <a href="javascript:void(0)" class="menu-tigger">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                                <path d="M0 2C0 0.895431 0.895431 0 2 0C3.10457 0 4 0.895431 4 2C4 3.10457 3.10457 4 2 4C0.895431 4 0 3.10457 0 2Z" fill="currentcolor" />
                                                <path d="M0 9C0 7.89543 0.895431 7 2 7C3.10457 7 4 7.89543 4 9C4 10.1046 3.10457 11 2 11C0.895431 11 0 10.1046 0 9Z" fill="currentcolor" />
                                                <path d="M0 16C0 14.8954 0.895431 14 2 14C3.10457 14 4 14.8954 4 16C4 17.1046 3.10457 18 2 18C0.895431 18 0 17.1046 0 16Z" fill="currentcolor" />
                                                <path d="M7 2C7 0.895431 7.89543 0 9 0C10.1046 0 11 0.895431 11 2C11 3.10457 10.1046 4 9 4C7.89543 4 7 3.10457 7 2Z" fill="currentcolor" />
                                                <path d="M7 9C7 7.89543 7.89543 7 9 7C10.1046 7 11 7.89543 11 9C11 10.1046 10.1046 11 9 11C7.89543 11 7 10.1046 7 9Z" fill="currentcolor" />
                                                <path d="M7 16C7 14.8954 7.89543 14 9 14C10.1046 14 11 14.8954 11 16C11 17.1046 10.1046 18 9 18C7.89543 18 7 17.1046 7 16Z" fill="currentcolor" />
                                                <path d="M14 2C14 0.895431 14.8954 0 16 0C17.1046 0 18 0.895431 18 2C18 3.10457 17.1046 4 16 4C14.8954 4 14 3.10457 14 2Z" fill="currentcolor" />
                                                <path d="M14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9Z" fill="currentcolor" />
                                                <path d="M14 16C14 14.8954 14.8954 14 16 14C17.1046 14 18 14.8954 18 16C18 17.1046 17.1046 18 16 18C14.8954 18 14 17.1046 14 16Z" fill="currentcolor" />
                                            </svg>
                                        </a>
                                    </li>
{{--                                    <li class="header-btn"><a class='btn' href='contact.html'>let’s Talk</a></li>--}}
                                </ul>
                            </div>
                            <div class="mobile-nav-toggler">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                    <path d="M0 2C0 0.895431 0.895431 0 2 0C3.10457 0 4 0.895431 4 2C4 3.10457 3.10457 4 2 4C0.895431 4 0 3.10457 0 2Z" fill="currentcolor" />
                                    <path d="M0 9C0 7.89543 0.895431 7 2 7C3.10457 7 4 7.89543 4 9C4 10.1046 3.10457 11 2 11C0.895431 11 0 10.1046 0 9Z" fill="currentcolor" />
                                    <path d="M0 16C0 14.8954 0.895431 14 2 14C3.10457 14 4 14.8954 4 16C4 17.1046 3.10457 18 2 18C0.895431 18 0 17.1046 0 16Z" fill="currentcolor" />
                                    <path d="M7 2C7 0.895431 7.89543 0 9 0C10.1046 0 11 0.895431 11 2C11 3.10457 10.1046 4 9 4C7.89543 4 7 3.10457 7 2Z" fill="currentcolor" />
                                    <path d="M7 9C7 7.89543 7.89543 7 9 7C10.1046 7 11 7.89543 11 9C11 10.1046 10.1046 11 9 11C7.89543 11 7 10.1046 7 9Z" fill="currentcolor" />
                                    <path d="M7 16C7 14.8954 7.89543 14 9 14C10.1046 14 11 14.8954 11 16C11 17.1046 10.1046 18 9 18C7.89543 18 7 17.1046 7 16Z" fill="currentcolor" />
                                    <path d="M14 2C14 0.895431 14.8954 0 16 0C17.1046 0 18 0.895431 18 2C18 3.10457 17.1046 4 16 4C14.8954 4 14 3.10457 14 2Z" fill="currentcolor" />
                                    <path d="M14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9Z" fill="currentcolor" />
                                    <path d="M14 16C14 14.8954 14.8954 14 16 14C17.1046 14 18 14.8954 18 16C18 17.1046 17.1046 18 16 18C14.8954 18 14 17.1046 14 16Z" fill="currentcolor" />
                                </svg>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href='/'>
                                    <img src="{{ asset('front/assets/img/logo-black.png') }}" alt="Logo">
                                </a>
                            </div>
                            <div class="tgmobile__search">
                                <form action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <div class="tgmobile__menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="tgmobile__menu-bottom">
                                <div class="contact-info">
                                    <ul class="list-wrap">
                                        <li><a href="mailto:info@apexa.com">info@iamLeb.com</a></li>
                                        <li><a href="tel:0123456789">+1 (204) 111 1111</a></li>
                                    </ul>
                                </div>
                                <div class="social-links">
                                    <ul class="list-wrap">
                                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-search -->
    <div class="search__popup">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search__wrapper">
                        <div class="search__close">
                            <button type="button" class="search-close-btn">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="search__form">
                            <form action="#">
                                <div class="search__input">
                                    <input class="search-input-field" type="text" placeholder="Type keywords here">
                                    <span class="search-focus-border"></span>
                                    <button>
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-popup-overlay"></div>
    <!-- header-search-end -->
    <!-- offCanvas-menu -->
    <div class="offCanvas__info">
        <div class="offCanvas__close-icon menu-close">
            <button><i class="far fa-window-close"></i></button>
        </div>
        <div class="offCanvas__logo mb-30">
            <a href='/'>
                <img src="{{ asset('front/assets/img/logo-black.png') }}" alt="Logo">
            </a>
        </div>
        <div class="offCanvas__side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p>Winnipeg, Manitoba <br> Canada</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p>+1 (204) 111 1111</p>
                <p>+1 (204) 111 1111</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p>info@iamLeb.com</p>
                <p>contact@iamleb.com</p>
            </div>
        </div>
        <div class="offCanvas__social-icon mt-30">
            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div class="offCanvas__overly"></div>
    <!-- offCanvas-menu-end -->
</header>
<!-- header-area-end -->
<!-- main-area -->
<main class="fix">
    <!-- banner-area -->
    <section class="banner-area banner-bg" data-background="{{ asset('front/assets/pexels-kassiamelox-19899183.jpg') }}">
        <div class="row justify-content-center">
            <div class="col-lg-12 d-flex text-center justify-center">
                <h2 class="p-2" style="width:100%; font-size:48px" data-aos="fade-up" data-aos-delay="200"><span style="color:#14176C; font-family: 'Titan One', sans-serif">2024 Cencadian Summer Web Development Program</span></h2>
            </div>

            <?php
                $lists = [
                    [
                        'category' => 'gen',
                        'title' => 'About The Summer Web Development Program',
                        'body' => "Cencadian Educational Incorporated is a Canadian not-for-profit organization seeking to provide engagement
                        and learning opportunities for students of all ages that are accessible for all. This year, Cencadian is
                        kickstarting the Summer Web Development program, offering tech internship opportunities to students, as well as
                        low or no-cost web development for local organizations."
                    ],

                    [
                        'category' => 'intern',
                        'title' => 'Internship Opportunities for Youths',
                        'body' => "Are you a student looking to gain real-world experience in Web Development? Cencadian's Summer Web Development
                        program might be the perfect fit for you. Learn from experienced mentors, gain hands-on experience, and add
                        to your portfolio! Apply to join our team today!"
                    ],

                    [
                        'category' => 'company',
                        'title' => 'Web Presence Opportunities for Businesses',
                        'body' => "Are you a small or medium-sized business or community organization needing web development services?
                        Through the Summer Web Development Program, Cencadian might be able to offer you a solution at little
                        or no cost. Our mission is to forge connections and support organizations making an impact in the community."
                    ],
                ];
            ?>

            <div class="row justify-content-around">

                <?php
                    foreach ($lists as $list) {
                        ?>
                            <div class="col-md-3 bg-opacity-75 bg-secondary rounded d-flex flex-column">
                                <h4 class="text-white text-center pt-3"><span style="color:#14176C; font-weight:bold">{{ $list['title'] }}</span></h4>
                                <p class="text-white text-center">
                                    {{ $list['body'] }}
                                </p>
                                <div class="d-flex justify-content-center mb-1">
                                <?php
                                    if($list['category'] === 'gen') {
                                        ?><a class='btn align-self-center' data-aos-delay='600' data-aos='fade-up' href='#about'>Learn More</a><?php
                                    } else if ($list['category'] === 'intern') {
                                        ?><a class='btn align-self-center' data-aos-delay='600' data-aos='fade-up' href='/register?key=intern'>Apply Now</a><?php
                                    }else if ($list['category'] === 'company') {
                                            ?><a class='btn align-self-center' data-aos-delay='600' data-aos='fade-up' href='/register?key=company'>Sign up</a> <?php
                                    }
                                ?>
                                </div>
                            </div>

                        <?php

                    }
                ?>
            </div>
        </div>

        <div class="banner-scroll" style="margin-left:3px">
                <a href="#about">Scroll Down <span><i class="fas fa-arrow-right"></i></span></a>
        </div>
    </section>
    <!-- banner-area-end -->
    <!-- brand-area -->
    <!-- <div class="brand-area">
        <div class="container">
            <div class="swiper-container brand-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('front/assets/img/brand/brand_img01.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('front/assets/img/brand/brand_img02.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('front/assets/img/brand/brand_img03.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('front/assets/img/brand/brand_img04.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('front/assets/img/brand/brand_img05.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('front/assets/img/brand/brand_img06.png') }}" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="{{ asset('front/assets/img/brand/brand_img03.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    brand-area -->
    <!-- about-area -->
    <section id="about" class="about-area pt-120 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-wrap">
                        <div class="mask-img-wrap">
                            <img src="{{ asset('front/assets/undraw_searching_re_3ra9.svg') }}" alt="">
                        </div>
                        <div class="shape">
                            <img src="{{ asset('front/assets/img/images/about_shape01.png') }}" alt="">
                        </div>
                        <div class="experience-year">
                            <div class="icon">
                                <i class="flaticon-trophy"></i>
                            </div>
{{--                            <div class="content">--}}
{{--                                <h6 class="circle rotateme">5 Years Experience</h6>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title mb-35 tg-heading-subheading animation-style3">
                            <span class="sub-title"></span>
                            <h2 class="title tg-element-title">About the Summer Web Development Program

                            </h2>
                        </div>
                        <div class="about-list">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-target"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Organizations</h4>
                                        <p>We bring your dream into reality</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-profit"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Interns</h4>
                                        <p>Get Real-World Experience In Web Development</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <p>This summer, from June 3 to August 23, 2024, join us at the forefront of digital innovation with the Cencadian Summer Web Development Program. Dedicated to fostering the growth of small to medium scale organizations, we offer comprehensive web development services at little to no cost. Whether you're looking to launch a new website or enhance an existing one, our program is designed to bridge the gap between technological opportunity and affordability.</p>
{{--                        <div class="about-bottom">--}}
{{--                            <div class="author-wrap">--}}
{{--                                <div class="thumb">--}}
{{--                                    <img src="{{ asset('front/assets/img/images/author_img.png') }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="content">--}}
{{--                                    <img src="{{ asset('front/assets/img/images/sign.png') }}" alt="">--}}
{{--                                    <h4 class="title">Martinaze <span>, CEO</span></h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <a class='btn btn-two' href='about.html'>Read More</a>--}}
{{--                        </div>--}}
                        <div class="about-shape-wrap">
                            <img src="{{ asset('front/assets/img/images/about_shape03.png') }}" alt="">
                            <img src="{{ asset('front/assets/img/images/about_shape04.png') }}" alt="" class="ribbonRotate">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-left-shape">
            <img src="{{ asset('front/assets/img/images/about_shape02.png') }}" alt="">
        </div>
    </section>
    <!-- about-area-end -->
    <!-- services-area -->
    <section class="services-area services-bg" data-background="{{ asset('front/assets/img/bg/services_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                        <span class="sub-title">WHAT WE OFFER</span>
                        <h2 class="title tg-element-title">We Offer Solutions for Small to Medium-Sized Organizations</h2>
                    </div>
                </div>
            </div>
            <div class="services-item-wrap">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="services-item shine-animate-item" style="height: 36rem">
                            <div class="services-thumb">
                                <a class='shine-animate' href='services-details.html'><img style="object-fit: contain" src="{{ asset('front/assets/undraw_building_websites_i78t.svg') }}" alt=""></a>
                            </div>
                            <div class="services-content">
                                <div class="icon">
                                    <i class="fa fa-laptop"></i>
                                </div>
                                <h4 class="title"><a href='services-details.html'>Web Development Solutions</a></h4>
                                <p>At Cencadian, we create custom web solutions to fit your business perfectly, whether it's an e-commerce site, corporate page, or dynamic app. Our experienced team turns your vision into digital reality.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="services-item shine-animate-item" style="height: 36rem">
                            <div class="services-thumb">
                                <a class='shine-animate' href='services-details.html'><img style="object-fit: contain" src="{{ asset('front/assets/undraw_savings_re_eq4w.svg') }}" alt=""></a>
                            </div>
                            <div class="services-content">
                                <div class="icon">
                                    <i class="flaticon-financial-profit"></i>
                                </div>
                                <h4 class="title"><a href='services-details.html'>Little to no Cost</a></h4>
                                <p>The 2024 Cencadian Summer Web Development Program is aimed to provide Web Development Services at little to no cost to new or existing small to medium scale organizations within the community that might not be able to afford the huge cost of web development and maintenance.  </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="services-item shine-animate-item" style="height: 36rem">
                            <div class="services-thumb">
                                <a class='shine-animate' href='services-details.html'><img style="object-fit: contain" src="{{ asset('front/assets/undraw_showing_support_re_5f2v.svg') }}" alt=""></a>
                            </div>
                            <div class="services-content">
                                <div class="icon">
                                    <i class="flaticon-handshake"></i>
                                </div>
                                <h4 class="title"><a href='services-details.html'>Community Impact</a></h4>
                                <p>By focusing on local businesses and organizations that might not otherwise afford web development, we aim to strengthen community ties and foster economic growth.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="services-item shine-animate-item" style="height: 36rem">
                            <div class="services-thumb">
                                <a class='shine-animate' href='services-details.html'><img style="object-fit: contain" src="{{ asset('front/assets/undraw_outer_space_re_u9vd.svg') }}" alt=""></a>
                            </div>
                            <div class="services-content">
                                <div class="icon">
                                    <i class="flaticon-startup"></i>
                                </div>
                                <h4 class="title"><a href='services-details.html'>Competitive Advantage</a></h4>
                                <p>Local businesses, startups, and entrepreneurs who lack the financial resources for extensive web development services will gain a competitive edge through affordable access to professional websites, enabling them to reach a wider audience and thrive in the digital landscape. </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="display:flex; justify-content:center width:100%">
                    <a href="/register?key=company" class="btn" style="width:100%; justify-content:center">Sign Up as Client Company</a>
                <div>
            </div>

        </div>
    </section>
    <!-- services-area-end -->
    <!-- choose-area -->
    <section class="choose-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-0 order-lg-2">
                    <div class="choose-img-wrap">
                        <img src="{{ asset('front/assets/undraw_educator_re_ju47.svg') }}" alt="">
{{--                        <img src="{{ asset('front/assets/img/images/choose_img02.jpg') }}" alt="" data-parallax='{"x" : 50 }'>--}}
{{--                        <img src="{{ asset('front/assets/img/images/choose_img_shape.png') }}" alt="" class="alltuchtopdown">--}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-content">
                        <div class="section-title white-title mb-30 tg-heading-subheading animation-style3">
                            <span class="sub-title">Real-world experience, Real-world success!</span>
                            <h2 class="title tg-element-title">Program Features for Interns</h2>
                        </div>
                        <div class="choose-list">
                            <ul class="list-wrap">
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-light-bulb"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Comprehensive Training</h4>
                                        <p> Interns will be equipped with the skills needed to handle diverse tasks ranging from content management to advanced web design and functionality enhancements.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-handshake"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Real Projects, Real Impact</h4>
                                        <p>Work on actual projects for real clients within the community, providing substantial portfolio-building experiences and tangible benefits to local businesses.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="flaticon-startup"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Leadership and Employment Skills</h4>
                                        <p>Web development interns will gain leadership abilities and tangible skills through project ownership, client interaction and problem solving, equipping them for future leadership and professional roles.</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="flaticon-suitcase"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Support and Mentorship</h4>
                                        <p>Receive guidance and support from experienced web developers and industry professionals. Our mentorship covers technical skills, project management, and client interaction.</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon">
                                        <i class="flaticon-talk"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Community Engagement and Networking</h4>
                                        <p>Interns will engage with organizations in the community, providing networking opportunities for future growth.</p>
                                    </div>
                                </li>

                                <div style="display:flex; justify-content:center; width:100%">
                                    <a href="/register?key=intern" class="btn" style="width:100%; justify-content:center">Sign Up as Intern</a>
                                <div>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose-shape-wrap">
            <img src="{{ asset('front/assets/img/images/choose_shape01.png') }}" alt="" data-aos="fade-right" data-aos-delay="400">
            <img src="{{ asset('front/assets/img/images/choose_shape02.png') }}" alt="" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- choose-area-end -->

    <!-- project-area -->
    <section class="project-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                        <span class="sub-title">Join Us</span>
                        <h2 class="title tg-element-title">Discover What's Possible with Cencadian Summer Web Development</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-item-wrap">
            <div class="container custom-container-two">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-md-6">
                        <div class="project-item">
                            <div class="project-thumb">
                                <a href='project-details.html'><img src="{{ asset('front/assets/img/project/project_img01.jpg') }}" alt=""></a>
                            </div>
                            <div class="project-content">
                                <div class="left-side-content">
                                    <h4 class="title"><a href='project-details.html'>For Businesses</a></h4>
                                    <p>If you're a small to medium scale organization within the community, apply now to have our interns take your web presence to the next level.</p>
                                </div>
                                <div class="link-arrow">
                                    <a href='./register?key=company'>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="project-item">
                            <div class="project-thumb">
                                <a href='project-details.html'><img src="{{ asset('front/assets/img/project/project_img02.jpg') }}" alt=""></a>
                            </div>
                            <div class="project-content">
                                <div class="left-side-content">
                                    <h4 class="title"><a href='project-details.html'>For Aspiring Developers</a></h4>
                                    <p>Looking for a summer internship? Apply for our program to gain invaluable experience and make a difference in the community.</p>
                                </div>
                                <div class="link-arrow">
                                    <a href='project-details.html'>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-md-6">
                        <div class="project-item">
                            <div class="project-thumb">
                                <a href='project-details.html'><img src="{{ asset('front/assets/img/project/project_img03.jpg') }}" alt=""></a>
                            </div>
                            <div class="project-content">
                                <div class="left-side-content">
                                    <h4 class="title"><a href='project-details.html'>Inventory Management</a></h4>
                                    <span>Inventory Tracking</span>
                                </div>
                                <div class="link-arrow">
                                    <a href='project-details.html'>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-xl-3 col-md-6">
                        <div class="project-item">
                            <div class="project-thumb">
                                <a href='project-details.html'><img src="{{ asset('front/assets/img/project/project_img04.jpg') }}" alt=""></a>
                            </div>
                            <div class="project-content">
                                <div class="left-side-content">
                                    <h4 class="title"><a href='project-details.html'>Business Accounting</a></h4>
                                    <span>Financing Management</span>
                                </div>
                                <div class="link-arrow">
                                    <a href='project-details.html'>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 15" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.6293 3.27957C17.7117 2.80341 17.4427 2.34763 17.0096 2.17812C16.9477 2.15385 16.8824 2.13552 16.8144 2.12376L6.96081 0.419152C6.41654 0.325049 5.89911 0.689856 5.80491 1.23411C5.71079 1.77829 6.07564 2.29578 6.61982 2.38993L14.0946 3.68295L1.36574 12.6573C0.914365 12.9756 0.806424 13.5995 1.12467 14.0509C1.44292 14.5022 2.06682 14.6102 2.51819 14.2919L15.247 5.31753L13.954 12.7923C13.8598 13.3365 14.2247 13.854 14.7689 13.9482C15.3131 14.0422 15.8305 13.6774 15.9248 13.1332L17.6293 3.27957Z" fill="currentcolor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="project-content-bottom">
                            <p>We successfully cope with tasks of varying complexity, <br> provide long-term guarantees and regularly</p>
                            <a class='btn' href='project-details.html'>See All Projects</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="project-shape-wrap">
            <img src="{{ asset('front/assets/img/project/project_shape01.png') }}" alt="" class="alltuchtopdown">
            <img src="{{ asset('front/assets/img/project/project_shape02.png') }}" alt="" class="rotateme">
        </div>
    </section>
    <!-- project-area-end -->
    <!-- request-area -->
    <section id="contact" class="request-area request-bg" data-background="{{ asset('front/assets/pexels-kassiamelox-19899183.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="request-content text-center tg-heading-subheading animation-style3">
                        <h2 class="title tg-element-title">Apply Now</h2>
                        <p style="color: white" class="text-stone-50">Don't miss this opportunity to enhance your skills and make a significant impact in your local business community. Applications for businesses seeking web development and aspiring interns are now open!</p>
                        <div class="content-bottom">
                            <a href="/register?key=company" class="btn">Sign Up as Company</a>
                            <a href="/register?key=intern" class="btn" style="background: rgb(62, 64, 115)" >Apply as Intern</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="request-shape">
            <img src="{{ asset('front/assets/img/images/request_shape01.png') }}" alt="" data-aos="fade-right" data-aos-delay="400">
            <img src="{{ asset('front/assets/img/images/request_shape02.png') }}" alt="" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- request-area-end -->

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
                            <div class="fw-logo mb-25">
                                <a href='/'><img src="{{ asset('front/assets/img/logo-black.png') }}" alt=""></a>
                            </div>
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
