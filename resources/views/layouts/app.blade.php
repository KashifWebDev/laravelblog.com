<!DOCTYPE html>
<html lang="en">
<head>
    <?php $desc = 'Discover the ultimate resource for Laravel and PHP development. Access in-depth tutorials, expert coding tips, and the latest tools and trends to elevate your skills. Stay ahead with insights into cutting-edge techniques and best practices for building robust, scalable web applications."

This version includes strategic keywords like "ultimate resource," "in-depth tutorials," "cutting-edge techniques," and "scalable web applications" to improve search rankings while keeping the content engaging and informative'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="{{ $metaDescription ?? $desc }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'Laravel Blogs, Laravel, Blogs' }}">
    <meta property="og:title" content="{{ $metaTitle ?? 'Laravel Blogs' }}">
    <meta property="og:description" content="{{ $metaDescription ?? $desc }}, LaravelBlogs, Laravel Blogs, LaravelDaily, Laravel Daily" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="{{ isset($ogType) ? 'article' : 'website' }}" />
    <meta property="og:image" content="{{ isset($metaPic) ? $metaPic : asset('logo.png') }}" />
    <meta name="description" content="{{ $metaDescription ?? $desc }}" />
    <meta itemprop="name" content="{{ $metaTitle ?? 'Laravel Blogs' }}" />
    <meta itemprop="description" content="{{ $metaDescription ?? $desc }}, LaravelDaily, Laravel Dail" />
    <meta itemprop="image" content="{{ isset($metaPic) ? $metaPic : asset('logo.png') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $metaTitle ?? 'Laravel Blogs' }}" />
    <meta name="twitter:description" content="{{ $metaDescription ?? $desc }}, LaravelBlogs, Laravel Blogs, LaravelDaily, Laravel Daily" />
    <meta name="twitter:image" content="{{ isset($metaPic) ? $metaPic : asset('logo.png') }}" />
    <meta name="google-adsense-account" content="ca-pub-6248375401510068">
    <link rel="canonical" href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/template/favicon.svg') }}">
    <title>{{ isset($metaTitle) ? $metaTitle.' | Laravel Blogs' : 'Laravel Blogs' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3DK2P4B"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<header class="header sticky-bar bg-gray-900">
    <div class="container">
        <div class="main-header">
            <div class="header-logo"><a class="d-flex" wire:navigate.hover href="{{ route('home') }}"><img class="logo-night" alt="Laravel Blogs" src="{{ asset('logo.png') }}"><img class="d-none logo-day" alt="GenZ" src="assets/imgs/template/logo-day.svg"></a></div>
            <div class="header-nav">
                <nav class="nav-main-menu d-none d-xl-block">
                    <ul class="main-menu">
                        <li><a class="color-gray-500" wire:navigate.hover href="{{ route('home') }}">Home</a></li>
                        <li><a class="color-gray-500" wire:navigate.hover href="{{ route('article.tutorials') }}">Free Premium Articles</a></li>
                        <li>
                            <a class="color-gray-500" wire:navigate.hover href="{{ route('courses.index') }}">
                                Free Premium Courses
                                <span class="badge rounded-pill bg-primary ms-1">New</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar bg-gray-900">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="mobile-logo border-gray-800"><a class="d-flex" href="index.html"><img class="logo-night" alt="GenZ" src="assets/imgs/template/logo.svg"><img class="d-none logo-day" alt="GenZ" src="assets/imgs/template/logo-day.svg"></a></div>
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav class="mt-15">
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a href="index.html">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Homepage - 1</a></li>
                                    <li><a href="index-2.html">Homepage - 2</a></li>
                                    <li><a href="index-3.html">Homepage - 3</a></li>
                                    <li><a href="index-4.html">Homepage - 4</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="#">Category</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-archive.html">Blog Category 1</a></li>
                                    <li><a href="blog-archive-2.html">Blog Category 2</a></li>
                                    <li><a href="blog-archive-3.html">Blog Category 3</a></li>
                                    <li><a href="blog-archive-4.html">Blog Category 4</a></li>
                                    <li><a href="blog-archive-5.html">Blog Category 5</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="#">Single Post</a>
                                <ul class="sub-menu">
                                    <li><a href="single-sidebar.html">Blog Single 1</a></li>
                                    <li><a href="single-no-sidebar.html">Blog Single 2</a></li>
                                    <li><a href="single-center.html">Blog Single 3</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a class="color-gray-500" href="page-portfolio.html">Portfolio</a>
                                <ul class="sub-menu">
                                    <li><a class="color-gray-500" href="page-portfolio.html">My Portfolio</a></li>
                                    <li><a class="color-gray-500" href="page-portfolio-2.html">My Portfolio 2</a></li>
                                    <li><a class="color-gray-500" href="portfolio-details.html">Portfolio Details</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="page-about.html">About</a></li>
                                    <li><a href="page-author.html">Author posts</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                    <li><a href="page-search.html">Search results</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-signup.html">Signup</a></li>
                                    <li><a href="page-404.html">Page 404</a></li>
                                </ul>
                            </li>
                            <li><a href="page-contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account border-gray-800">
                    <div class="mobile-header-top bg-gray-900">
                        <div class="user-account"><a href="page-login.html"><img src="assets/imgs/template/ava.jpg" alt="GenZ"></a>
                            <div class="content">
                                <h6 class="user-name color-white">Hello<span class="color-white"> Steven !</span></h6>
                                <p class="font-xs text-muted">You have 3 new messages</p>
                            </div>
                        </div>
                    </div>
                    <ul class="mobile-menu">
                        <li><a href="page-login.html">Profile</a></li>
                        <li><a href="page-login.html">Articles Saved</a></li>
                        <li><a href="page-login.html">Add new post</a></li>
                        <li><a href="page-login.html">My Likes</a></li>
                        <li><a href="page-login.html">Account Setting</a></li>
                        <li><a href="page-login.html">Sign out</a></li>
                    </ul>
                </div>
                <div class="site-copyright color-gray-400 mt-30">Copyright 2023 &copy; Genz - Personal Blog Template.<br>Designed by<a href="http://alithemes.com" target="_blank">&nbsp; AliThemes</a></div>
            </div>
        </div>
    </div>
</div>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="footer-1 bg-gray-850 border-gray-800">
            <div class="row">
                <div class="col-lg-12 mb-30"><a class="wow animate__animated animate__fadeInUp"  wire:navigate.hover href="{{ route('home') }}"><img class="logo-night" src="{{ asset('logo.png') }}" alt="Laravel Blogs"><img class="d-none logo-day" alt="GenZ" src="assets/imgs/template/logo-day.svg"></a>
                    <p class="mb-20 mt-20 text-sm color-gray-500 wow animate__animated animate__fadeInUp">Want to master Laravel with top-tier educational content? We offer premium Laravel courses completely free to help you enhance your skills.

                        Our courses are created by leading Laravel educators and core Laravel community members, ensuring you receive high-quality, in-depth, and up-to-date training.

                        Explore hands-on lessons, expert tutorials, and real-world projects—all at no cost! Start learning Laravel, Livewire, Filament, Eloquent, API development, security best practices, and more.</p>
                    <h6 class="color-white mb-5 wow animate__animated animate__fadeInUp">Email</h6>
                    <a class="text-sm color-gray-500 wow animate__animated animate__fadeInUp" href="mailto:admin@laravelblogs.com">admin@laravelblogs.com</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="progressCounter progressScroll hover-up hover-neon-2">
    <div class="progressScroll-border">
        <div class="progressScroll-circle"><span class="progressScroll-text"><i class="fi-rr-arrow-small-up"></i></span></div>
    </div>
</div>


<script src="{{ asset('assets/js/vendors/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/waypoints.js') }}"></script>
<script src="{{ asset('assets/js/vendors/wow.js') }}"></script>
<script src="{{ asset('assets/js/vendors/text-type.js') }}"></script>
<script src="{{ asset('assets/js/vendors/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/vendors/jquery.progressScroll.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js?v=2.0') }}"></script>
@livewireScripts
</body>
</html>
