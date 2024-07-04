<?php
$lists = [
    ["title" => 'About The Summer Web Development Program', 'body' => "Cencadian Educational Inc., a Canadian nonprofit, aims to offer inclusive learning opportunities. This summer, we're launching a Web Development program, providing tech internships for students and affordable or free web development for local organizations."],
    ["title" => 'Internship Opportunities for Youths', 'body' => "Are you a student eager for real-world Web Development experience? Join Cencadian's Summer program. Learn from mentors, get hands-on experience, and enhance your portfolio."],
    ["title" => 'Web Presence Opportunities for Businesses', 'body' => "Are you a small or medium-sized business or community organization needing web development services?
                                    Through the Summer Web Development Program, Cencadian might be able to offer you a solution at little
                                    or no cost. Our mission is to forge connections and support organizations making an impact in the community."],
];
?>

<section class="slider__area">
    <div class="swiper-container slider__active slider__ac">
        <div class="swiper-wrapper">
            <div class="swiper-slide slider__single">
                <div class="slider__bg" data-background="{{ asset('front/assets/pexels-kassiamelox-19899183.jpg') }}"></div>
                <div class="container">
                    <div class="row text-white d-flex justify-content-center text-center">
                        <?php
                        foreach ($lists as $list) {
                            ?>
                        <div class="col-lg-4 p-2">
                            <div class="slider__conten">
                                <h3 class="title p-2" style="background-color: #1b1e71; color: white; border-radius: 5px">{{ $list['title'] }}</h3>
                                <div class="border border-white border-top-0 p-3 mb-2">
                                    {{ $list['body'] }}
                                    {{--                                            <p class="text-white"></p>--}}
                                </div>
                                <a class='btn' href='#about'>Learn More about Cencadian</a>

                            </div>
                        </div>

                            <?php

                        }
                        ?>
                    </div>
                </div>

                <div class="slider__shape">
                    <img src="{{ asset('front/assets/img/slider/slider_shape01.png') }}" alt="">
                    <img src="{{ asset('front/assets/img/slider/slider_shape02.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
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
                        <!-- <div class="content">
                            <h6 class="circle rotateme">Years Of - Experience 25 -</h6>
                        </div> -->
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
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 ">
                    <div class="services-item shine-animate-item">
                        <div class="services-thumb">
                            <a class='shine-animate' href='services-details.html'><img style="object-fit: contain" src="{{ asset('front/assets/undraw_website_builder_re_ii6e.svg') }}" alt=""></a>
                        </div>
                        <div class="services-content">
                            <div class="icon">
                                <i class="flaticon-profit"></i>
                            </div>
                            <h4 class="title"><a href='services-details.html'>St. Boniface Lawn and Window Care</a></h4>
                            <p>Asdf</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8" style="height: 100%">
                    <div class="services-item shine-animate-item">
                        <div class="services-thumb">
                            <a class='shine-animate' href='services-details.html'><img style="object-fit: contain" src="{{ asset('front/assets/undraw_mobile_content_xvgr.svg') }}" alt=""></a>
                        </div>
                        <div class="services-content">
                            <div class="icon">
                                <i class="flaticon-investment-1"></i>
                            </div>
                            <h4 class="title"><a href='services-details.html'>Little to no Cost</a></h4>
                            <p>The 2024 Cencadian Summer Web Development Program is aimed to provide Web Development Services at little to no cost to new or existing small to medium scale organizations within the community that might not be able to afford the huge cost of web development and maintenance.  </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="services-item shine-animate-item">
                        <div class="services-thumb">
                            <a class='shine-animate' href='services-details.html'><img style="object-fit: contain" src="{{ asset('front/assets/undraw_everyday_design_gy64.svg') }}" alt=""></a>
                        </div>
                        <div class="services-content">
                            <div class="icon">
                                <i class="flaticon-pie-chart"></i>
                            </div>
                            <h4 class="title"><a href='services-details.html'>Community Impact</a></h4>
                            <p>By focusing on local businesses and organizations that might not otherwise afford web development, we aim to strengthen community ties and foster economic growth.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="services-item shine-animate-item">
                        <div class="services-thumb">
                            <a class='shine-animate' href='services-details.html'><img style="object-fit: contain" src="{{ asset('front/assets/undraw_search_re_x5gq.svg') }}" alt=""></a>
                        </div>
                        <div class="services-content">
                            <div class="icon">
                                <i class="flaticon-light-bulb"></i>
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
                    <img src="{{ asset('front/assets/undraw_showing_support_re_5f2v.svg') }}" alt="">
                    <img src="{{ asset('front/assets/img/images/choose_img02.jpg') }}" alt="" data-parallax='{"x" : 50 }'>
                    <img src="{{ asset('front/assets/img/images/choose_img_shape.png') }}" alt="" class="alltuchtopdown">
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

                            <div style="display:flex; justify-content:center width:100%">
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
<section class="request-area request-bg" data-background="{{ asset('front/assets/pexels-kassiamelox-19899183.jpg') }}">
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
