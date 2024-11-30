<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W3DK2P4B');</script>

    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3R7G5BFS1C"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3R7G5BFS1C');
    </script>


    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>{{ isset($metaTitle) ? $metaTitle.' | Laravel Blogs' : 'Laravel Blogs' }}</title>

    <meta name="description" content="{{ $metaDescription ?? 'Laravel Blogs' }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'Laravel Blogs, Laravel, Blogs' }}">
    <meta property="og:title" content="{{ $metaTitle ?? 'Laravel Blogs' }}">
    <meta property="og:description" content="{{ $metaDescription ?? 'Laravel Blogs' }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/android-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-icon-144x144.png" />

    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@400;500;600;700;800&family=Barlow:wght@400;500;600;700&family=Roboto+Slab:wght@400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/simple-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/color/color-four.css') }}" />

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
    <body class="bg-white-smoke">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3DK2P4B"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

        <div class="preloader">
            <div class="preloader-inner">
                <div class="preloader-icon">
                    <span></span>
                    <span></span>
                </div><!-- /preloader-icon -->
            </div><!-- /preloader-inner -->
        </div>

        <div class="site-content">
            <header class="site-header default-header-style style-one intro-element">
                <div class="header-download-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="download-area-content">
                                    <div class="download-text">"Stay tuned! We're soon uploading our premium courses for free!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-top-area">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="intro-socail-share">
                                    <div class="share-alt"><span class="fa fa-share-alt"></span></div>
                                    <div class="socail-share">
                                        <a href="#"><span class="fab fa-facebook-f"></span></a>
                                        <a href="#"><span class="fab fa-twitter"></span></a>
                                        <a href="#"><span class="fab fa-instagram"></span></a>
                                        <a href="#"><span class="fab fa-pinterest-p "></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="site-branding text-center">
                                    <a href="{{ route('home') }}"  wire:navigate.hover>
                                        <img src="{{ asset('logo.png') }}" alt="LaravelBlogs Logo" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="header-right-area">
                                    <div class="search-wrap">
                                        <div class="search-btn">
                                            <i class="fas fa-search"></i>
                                        </div>
                                        <div class="search-form">
                                            <form action="#">
                                                <input type="search" placeholder="Search">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="hamburger-menus">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="navigation-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="site-navigation">
                                    <nav class="navigation">
                                        <div class="menu-wrapper">
                                            <div class="menu-content">
                                                <ul class="mainmenu">
                                                    <li><a wire:navigate.hover href="{{ route('home') }}">Home</a></li>
                                                    <li><a wire:navigate.hover href="{{ route('article.tutorials') }}">Premium Tutorials</a></li>
                                                    <li><a wire:navigate.hover href="{{ route('article.courses') }}">Courses</a></li>
                                                    <li><a wire:navigate.hover href="{{ route('article.tips') }}">Quick Tips</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mobile-sidebar-menu sidebar-menu">
                    <div class="overlaybg"></div>
                </div>
            </header>
            <div id="sticky-header" class="active"></div>



            @yield('content')

            <div class="subscribe-section style-two bg-white pd-t-100-i">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="subscribe-section-content mr-0">
                                <div class="section-header">
                                    <h2 class="title">Subscribe</h2>
                                    <p>Subscribe Now To Get Daily Updates</p>
                                </div>
                                <div class="subscribe-form">
                                    <!-- Subscribe form -->
                                    <form class="dv-form" id="mc-form">
                                        <div class="form-group">
                                            <input id="mc-email" name="EMAIL" placeholder="Email Address" type="email" />
                                            <button class="btn btn-default" name="Subscribe" id="subscribe-btn" type="submit">
                                                Subscribe
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="site-footer bg-white pd-t-100">
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                        Start Footer Widget Area
                    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="footer-widget-area">
                    <div class="container">
                        <div class="row">
                            <!--~~~~~ Start Widget Location ~~~~~-->
                            <div class="col-lg-4 col-md-6">
                                <aside class="widget bt-location-widget">
                                    <div class="widget-content">
                                        <a class="footer-logo" href="index09.html">
                                            <img src="{{ asset('logo.png') }}" alt="Footer Logo">
                                        </a>
                                        <div class="info-box">
                                            <p>
                                                Dannmondi 15 number Sheen Darus Salam. 112/B Road 8A,
                                                Dhanmondi.
                                            </p>
                                        </div>
                                        <div class="info-box">
                                            <p>
                                                <a href="mailto:admin@laravelblogs.com">admin@laravelblogs.com</a>
                                            </p>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                            <!--~./ end location widget ~-->

                            <!--~~~~~ Start Widget Links ~~~~~-->
{{--                            <div class="col-lg-2 col-md-6">--}}
{{--                                <aside class="widget widget_links">--}}
{{--                                    <h2 class="widget-title">Quick Links</h2>--}}
{{--                                    <div class="widget-content">--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="#">About Us</a></li>--}}
{{--                                            <li><a href="#">Contact Us</a></li>--}}
{{--                                            <li><a href="#">Careers</a></li>--}}
{{--                                            <li><a href="#">Services</a></li>--}}
{{--                                            <li><a href="#">Stories</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </aside>--}}
{{--                            </div>--}}
{{--                            <!--~./ end links widget ~-->--}}
{{--                            <!--~~~~~ Start Widget Links ~~~~~-->--}}
{{--                            <div class="col-lg-2 col-md-6">--}}
{{--                                <aside class="widget widget_links">--}}
{{--                                    <h2 class="widget-title">Categories</h2>--}}
{{--                                    <div class="widget-content">--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="#">Lifestyle</a></li>--}}
{{--                                            <li><a href="#">Travel</a></li>--}}
{{--                                            <li><a href="#">Food & Drinks</a></li>--}}
{{--                                            <li><a href="#">Inspiration</a></li>--}}
{{--                                            <li><a href="#">Decoration</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </aside>--}}
{{--                            </div>--}}
{{--                            <!--~./ end links widget ~-->--}}

{{--                            <!--~~~~~ Start Instagram Widget~~~~~-->--}}
{{--                            <div class="col-lg-4 col-md-6">--}}
{{--                                <aside class="widget bt-instafeed-widget style-four">--}}
{{--                                    <h4 class="widget-title">Instagram</h4>--}}
{{--                                    <div class="widget-content">--}}
{{--                                        <ul id="instafeed">--}}
{{--                                            <li class="feed-item">--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="assets/images/widget/instagram/3/1.jpg" alt="#">--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="feed-item">--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="assets/images/widget/instagram/3/2.jpg" alt="#">--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="feed-item">--}}
{{--                                                <a href="#">--}}
{{--                                                    <img src="assets/images/widget/instagram/3/3.jpg" alt="#">--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <a href="#">visit us on instagram</a>--}}
{{--                                    </div>--}}
{{--                                </aside>--}}
{{--                            </div>--}}
                            <!--~./ end instagram widget ~-->
                        </div>
                    </div>
                </div>
                <!--~./ end footer widgets area ~-->

                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                                            Start Footer Bottom Area
                                    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div class="footer-bottom-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="footer-bottom-content">
                                    <div class="copyright-text text-center">
                                        <p>
                                            Copyright - 2024
                                            <a href="{{ route('home') }}">Laravel Blogs</a>
                                        </p>
                                    </div>
                                    <!--~./ end copyright text ~-->
                                </div>
                            </div>
                            <!--~./ col-12 ~-->
                        </div>
                    </div>
                </div>
                <!--~./ end footer bottom area ~-->
            </footer>

        </div>

        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>
        <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/simple-scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
        <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/ResizeSensor.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/scrolla.jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    @livewireScripts
    </body>
</html>
