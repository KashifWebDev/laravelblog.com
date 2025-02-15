<div>
    @section('content')
        <main class="main">
            <div class="cover-home1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-1"></div>
                        <div class="col-xl-10 col-lg-12">
                            <div class="banner banner-home2">
                                <div class="text-center">
                                    <h6 class="color-gray-600">Welcome to our Laravel Blogs</h6>
                                    <h1 class="color-white">Free <span class="color-linear">Premium </span>Laravel<br class="d-none d-lg-block">
                                        insights just for
                                        <span class="color-linear">you</span>
                                    </h1>
                                </div>
                                <div class="text-center mt-50">
                                    <ul class="list-tags-col-5 mb-50 text-center">
                                        @foreach($tags as $tag)
                                            <li>
                                                <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeInUp" data-wow-delay="0s">
                                                    <div class="card-image"><a href="{{ route('article.tutorials') }}" wire:navigate.hover><img src="{{ $tag['pic'] }}" alt="{{ $tag['name'] }}"></a></div>
                                                    <div class="card-info"><a class="color-gray-500" href="{{ route('article.tutorials') }}" wire:navigate.hover>{{ $tag['name'] }}</a></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-70">
                                <div class="col-lg-12 mb-50">
                                    <h2 class="color-linear d-inline-block mb-10">Recent Articles</h2>
                                    <p class="text-lg color-gray-500">Don't miss the latest articles from laravel official experts</p>
                                </div>
                                <div class="col-lg-8">
                                    <div class="box-list-posts">
                                        <div class="row">
                                            @foreach($articles as $article)
                                                <div class="col-lg-6">
                                                    <div class="card-blog-1 hover-up wow animate__animated animate__fadeIn">
                                                        <div class="card-image mb-20">
                                                            <a class="post-type" href="#"></a>
                                                            <a href="{{ route('article.read', ['slug' => $article->slug]) }}" wire:navigate.hover>
                                                                <img src="storage/{{ $article->image }}" alt="{{ $article->title }}">
                                                            </a>
                                                        </div>
                                                        <div class="card-info">
                                                            <div class="row">
                                                                <div class="col-7"><a class="color-gray-700 text-sm" href="{{ route('search', ['text' => 'laravel']) }}" wire:navigate.hover># Laravel</a></div>
                                                                <div class="col-5 text-end"><span class="color-gray-700 text-sm timeread">{{ rand(3,9) }} mins read</span></div>
                                                            </div>
                                                            <a href="{{ route('article.read', ['slug' => $article->slug]) }}" wire:navigate.hover>
                                                                <h5 class="color-gray-50 mt-20">{{ $article->title }}</h5></a>
                                                            <div class="row align-items-center mt-25">
                                                                <div class="col-7">
                                                                    <div class="box-author"><img src="{{ asset('avatars/admin.jpg') }}" alt="author">
                                                                        <div class="author-info">
                                                                            <h6 class="color-gray-700">Admin</h6><span class="color-gray-700 text-sm">{{ \Carbon\Carbon::parse($article->created_at)->format('d M, Y') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 text-end">
                                                                    <a class="readmore color-gray-500 text-sm" href="{{ route('article.read', ['slug' => $article->slug]) }}">
                                                                        <span>Read more</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="sidebar">
                                        <div class="box-sidebar bg-gray-850 border-gray-800">
                                            <div class="head-sidebar wow animate__animated animate__fadeIn">
                                                <h5 class="line-bottom">Latest Courses</h5>
                                            </div>
                                            <div class="content-sidebar">
                                                <div class="list-posts">
                                                    @foreach($courses as $course)
                                                        <div class="wow animate__animated animate__fadeIn">
                                                            <h6 class="color-white mb-3">
                                                                <a wire.navigate.hover href="{{ route('courses.show', ['course' => $course->slug]) }}">
                                                                    <span class="text-white">{{ $course->name }}</span>
                                                                    <span class="color-gray-700 ms-2">{{ $course->published_at }}</span>
                                                                </a>
                                                            </h6>

                                                            @foreach($course->lessons as $lesson)
                                                                <div class="item-post wow animate__animated animate__fadeIn">
                                                                    <div class="image-post">
                                                                        <a wire.navigate.hover href="{{ route('courses.show.lesson', ['course' => $course->slug, 'lesson' => $lesson->slug]) }}">
                                                                            <img src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->name }}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="info-post border-gray-800">
                                                                        <a wire.navigate.hover href="{{ route('courses.show.lesson', ['course' => $course->slug, 'lesson' => $lesson->slug]) }}">
                                                                            <h6 class="color-white">{{ $lesson->title }}</h6>
                                                                        </a>
                                                                        <span class="color-gray-700">{{ rand(3, 15) }} mins read</span>
                                                                        <ul class="d-inline-block">
                                                                            <li class="color-gray-700">{{ $course->published_at }}</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</div>
