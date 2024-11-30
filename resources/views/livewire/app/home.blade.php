<div>
    @section('content')
        <div class="frontpage-slider-posts">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel frontpage-slider-one style-one carousel-rectangle carousel-nav-center mrb-30">
                            @foreach($featured as $article)
                                <article class="post hentry post-slider-four slider-four-one">
                                    <div class="entry-thumb">
                                        <figure class="thumb-wrap">
                                            <a href="{{ route('article.read', ['slug' => $article->slug]) }}" wire:navigate.hover>
                                                <img src="storage/{{ $article->image }}" alt="{{ $article->title }}" />
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="content-entry-wrap">
                                        <h3 class="entry-title">
                                            <a href="{{ route('article.read', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
                                        </h3>
                                        <div class="entry-meta-content">
                                            <div class="entry-author">
                                                By <a href="#">Admin</a>
                                            </div>
                                            <div class="entry-date">
                                                On <span>{{ \Carbon\Carbon::parse($article->created_at)->format('l, F j, Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="entry-content">
                                            <div class="read-more-share">
                                                <div class="read-more-wrap">
                                                    <a class="read-more" href="{{ route('article.read', ['slug' => $article->slug]) }}" wire:navigate.hover>Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="main-wrapper mrb-100">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-12 main-wrapper-content">
                        <main class="site-main">
                            <div class="row masonry-posts">

                                @foreach($articles as $article)
                                    <div class="col-lg-4 col-md-6 grid-item">
                                        <article class="post post-grid-style post-grid-style-two">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a  wire:navigate.hover href="{{ route('article.read', ['slug' => $article->slug]) }}">
                                                        <img src="storage/{{ $article->image }}" alt="post" />
                                                    </a>
                                                </figure>
                                            </div>
                                            <!--./ entry-thumb -->
                                            <div class="content-entry-wrap">
                                                <div class="entry-category">
                                                    <a class="cat" href="#">Laravel</a>
                                                    <a class="cat" href="#">PHP</a>
                                                </div>
                                                <h3 class="entry-title">
                                                    <a href="{{ route('article.read', ['slug' => $article->slug]) }}" wire:navigate.hover>
                                                        {{ $article->title }}
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="entry-user">
                                                <div class="thumb">
                                                    <img src="{{ asset('avatars/admin.jpg') }}" alt="Thumb" />
                                                </div>
                                                <div class="info">
                                                    <div class="author-name">
                                                        <a href="#">Admin</a>
                                                    </div>
                                                    <div class="entry-date">{{ \Carbon\Carbon::parse($article->created_at)->format('l, F j, Y') }}</div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach

                            </div>
                        </main>
                        <div class="load-more-btn-area style-one">
                            <a href="{{ route('article.tutorials') }}" wire:navigate.hover class="load-more-btn">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--~./ end main wrapper ~-->

    @endsection
</div>
