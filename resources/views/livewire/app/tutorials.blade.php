<div>
    @section('content')
        <main class="main">
            <div class="cover-home3">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-1"></div>
                        <div class="col-xl-10 col-lg-12">
                            <div class="row align-items-end mt-50">
                                <div class="col-lg-7 mb-20">
                                    <div class="d-inline-block position-relative">
                                        <h1 class="color-white mb-20 color-linear wow animate__animated animate__fadeIn">Premium Articles</h1><span class="btn btn-linear-small btn-number-arts">{{ $articles->count() }} articles</span>
                                    </div>
                                    <b class="color-gray-500 text-base wow animate__animated animate__fadeIn fw-bolder d-inline-block">
                                        Access Premium Laravel Articles for Free – Written by Experts
                                    </b>
                                    <p class="color-gray-500 text-base wow animate__animated animate__fadeIn">
                                        Looking for high-quality Laravel content? We provide premium Laravel articles absolutely free to our readers. Our content is crafted by top Laravel content creators and core Laravel community members, ensuring you receive accurate, insightful, and up-to-date information.
                                    </p>
                                </div>
                                <div class="col-lg-5 mb-20 text-start text-lg-end">
                                    <div class="box-breadcrumbs wow animate__animated animate__fadeIn">
                                        <ul class="breadcrumb">
                                            <li><a class="home" wire:navigate.hover href="{{ route('home') }}">Home</a></li>
                                            <li><span>Premium Articles</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom border-gray-800 mt-10 mb-30"></div>
                                </div>
                            </div>
                            <div class="mt-50 mb-50">
                                <div class="row mt-50 mb-10">
                                    @foreach($articles as $article)
                                        <div class="col-lg-4">
                                            <div class="card-blog-1 hover-up wow animate__animated animate__fadeIn">
                                                <div class="card-image mb-20">
                                                    <a class="post-type" href="#"></a>
                                                    <a wire:navigate.hover href="{{ route('article.read', ['slug' => $article->slug]) }}">
                                                        <img src="storage/{{ $article->image }}" alt="{{ $article->title }}"></a>
                                                </div>
                                                <div class="card-info">
                                                    <div class="row">
                                                        <div class="col-7"><a class="color-gray-700 text-sm">#Laravel</a></div>
                                                        <div class="col-7"><a class="color-gray-700 text-sm">#PHP</a></div>
                                                    </div><a wire:navigate.hover href="{{ route('article.read', ['slug' => $article->slug]) }}">
                                                        <h5 class="color-white mt-20">{{ $article->title }}</h5></a>
                                                    <div class="row align-items-center mt-25">
                                                        <div class="col-7">
                                                            <div class="box-author"><img src="{{ asset('avatars/admin.jpg') }}" alt="Admin">
                                                                <div class="author-info">
                                                                    <h6 class="color-gray-700">Admin</h6><span class="color-gray-700 text-sm">{{ \Carbon\Carbon::parse($article->created_at) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="readmore color-gray-500 text-sm" wire:navigate.hover href="{{ route('article.read', ['slug' => $article->slug]) }}">
                                                                <span>Read more</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <nav class="mb-50">
                                </nav>
                            </div>
                            <div class="mb-70"></div>
                            <h2 class="color-linear d-inline-block mb-10 wow animate__animated animate__fadeInUp">Popular Tags</h2>
                            <p class="text-lg color-gray-500 wow animate__animated animate__fadeInUp">Most searched keywords</p>
                            <div class="row mt-70 mb-50">
                                @foreach($tags as $tag)
                                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6">
                                        <div class="card-style-2 hover-up hover-neon wow animate__animated animate__fadeIn" data-wow-delay="0.2s">
                                            <div class="card-image">
                                                <a href="{{ route('search', ['text' => $tag['name']]) }}" wire:navigate.hover>
                                                    <img src="{{ $tag['pic'] }}" alt="{{ $tag['name'] }}">
                                                </a>
                                            </div>
                                            <div class="card-info">
                                                <a class="color-gray-500" href="{{ route('search', ['text' => $tag['name']]) }}" wire:navigate.hover>{{ $tag['name'] }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection
</div>
