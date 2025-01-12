<div>
    @section('content')
        <style>
            pre {
                color: #d1d5db;
                background-color: #26252b;
                overflow-x: auto;
                font-weight: 400;
                font-size: .875em;
                line-height: 1.7142857;
                margin-top: 1.7142857em;
                margin-bottom: 1.7142857em;
                border-radius: .375rem;
                padding: .8571429em 1.1428571em;
            }
            code {
                /* --tw-bg-opacity: 1 !important; */
                background-color: rgb(30 41 59 / var(--tw-bg-opacity)) !important;
            }
            .post--markdown pre code.torchlight, pre code.torchlight {
                background-color: #292D3E;
                --theme-selection-background: #7580B850;
            }
        </style>

        <main class="main">
            <div class="cover-home3">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-1"></div>
                        <div class="col-xl-10 col-lg-12">
                            <div class="pt-30 border-bottom border-gray-800 pb-20">
                                <div class="box-breadcrumbs">
                                    <ul class="breadcrumb">
                                        <li><a class="home" wire:navigate.hover href="{{ route('home') }}">Home</a></li>
                                        <li><a wire:navigate.hover href="{{ route('article.tutorials') }}">Premium Articles</a></li>
                                        <li><span>{{ $article->title }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-50 align-items-end">
                                <div class="col-lg-9 col-md-8">
                                    <h2 class="color-linear mb-30">{{ $article->title }}</h2>
                                    <div class="box-author mb-20"><img src="{{ asset('avatars/admin.jpg') }}" alt="{{ $article->title }}">
                                        <div class="author-info">
                                            <h6 class="color-gray-700">Admin</h6>
                                            <span class="color-gray-700 text-sm mr-30">{{ \Carbon\Carbon::parse($article->created_at)->format('l, F j, Y') }}</span>
                                            <span class="color-gray-700 text-sm">{{ rand(5,9) }} mins to read</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="box-share border-gray-800">
                                        <h6 class="d-inline-block color-gray-500 mr-10">Share</h6><a class="icon-media icon-fb" href="#"></a><a class="icon-media icon-tw" href="#"></a><a class="icon-media icon-printest" href="#"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-50">
                                <div class="col-lg-8">
                                    <div class="mt-20 mb-20"><img class="img-bdrd-16" src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"></div>
                                    {!! $article->content !!}
                                </div>
                                <div class="col-lg-4">
                                    <div class="sidebar">
                                        <div class="box-sidebar bg-gray-850 border-gray-800">
                                            <div class="head-sidebar wow animate__animated animate__fadeIn">
                                                <h5 class="line-bottom">Popular Articles</h5>
                                            </div>
                                            <div class="content-sidebar">
                                                <div class="list-posts">
                                                    @foreach($randomArticles as $rndArt)
                                                        <div class="item-post wow animate__animated animate__fadeIn">
                                                            <div class="image-post"><a href="{{ route('article.read', ['slug' => $rndArt->slug]) }}" wire:navigate.hover>
                                                                    <img src="{{ asset('storage/'.$rndArt->image) }}" alt="{{ $rndArt->name }}"></a></div>
                                                            <div class="info-post border-gray-800">
                                                                <a href="{{ route('article.read', ['slug' => $rndArt->slug]) }}" wire:navigate.hover>
                                                                    <h6 class="color-white">{{ $rndArt->title }}</h6></a><span class="color-gray-700">{{ rand(4, 8) }} mins read</span>
                                                                    <span class="color-gray-700 mt-1 d-inline-block">{{ \Carbon\Carbon::parse($rndArt->created_at)->format('l, F j, Y') }}</span>
                                                            </div>
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
