<div>
    @section('content')
        <style>
            .post--markdown pre code.torchlight {
                /* --tw-bg-opacity: 1 !important; */
                background-color: rgb(30 41 59 / var(--tw-bg-opacity)) !important;
            }
        </style>
        <div class="main-wrapper pd-b-100">
            <div class="blog-single-page">
                <article class="post single-post single-post-three">
                    <div class="container">
                        <div class="post-thumbnail-area">
                            <figure class="post-thumb" style="text-align: -webkit-center">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="Blog Image" />
                            </figure>
                        </div>
                        <div class="entry-header">
                            <div class="entry-category">
                                <a class="cat" href="#">PHP</a>
                                <a class="cat" href="#">Laravel</a>
                            </div>
                            <h3 class="entry-title">
                                {{ $article->title }}
                            </h3>
                            <div class="entry-meta-content">
                                <div class="entry-author">
                                    By <a href="#">Admin</a>
                                </div>
                                <div class="entry-date">
                                    On <span>{{ \Carbon\Carbon::parse($article->created_at)->format('l, F j, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="post-details">
                            <div class="social-network">
                                <ul class="social-share">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul><!-- /.social-share -->
                            </div>
                            <div class="entry-content">
                                {!! $article->content !!}
                            </div>
                        </div>
                        <div class="entry-footer">
                            <div class="entry-tag">
                                <strong>Tag: </strong>
                                <a href="#" rel="tag">PHP</a>
                                <a href="#" rel="tag">Laravel</a>
                            </div>
                        </div>
                    </div>
                </article>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="author-info">
                                <div id="author-img">
                                    <figure class="at-img">
                                        <img src="{{ asset('avatars/admin.jpg') }}" alt="img">
                                    </figure>
                                </div>

                                <div id="author-details">
                                    <h3 class="author-name">Admin</h3>
                                    <div class="authors-bio">
                                        <p>Article Writer, Senior Full stack PHP developer
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="related-posts-block">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="related-title">Related Posts</h3>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($randomArticles as $article)
                                <div class="col-lg-4 col-md-6">
                                    <article class="post post-grid-style post-grid-style-two">
                                        <div class="entry-thumb">
                                            <figure class="thumb-wrap">
                                                <a href="{{ route('article.read', ['slug' => $article->slug]) }}" wire:navigate.hover>
                                                    <img src="{{ asset('storage/' . $article->image) }}" alt="post" />
                                                </a>
                                            </figure>
                                        </div>
                                        <div class="content-entry-wrap">
                                            <div class="entry-category">
                                                <a class="cat" href="#">PHP</a>
                                                <a class="cat" href="#">Laravel</a>
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
                    </div>

{{--                    <div id="comments" class="comments-area">--}}
{{--                        <div class="comments-main-content">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <h3 class="comments-title">04 Comments</h3>--}}
{{--                                    <!--/.comments-title-->--}}
{{--                                </div>--}}
{{--                                <!--/.col-md-12-->--}}
{{--                            </div>--}}
{{--                            <!--/.row-->--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <ol class="comment-list">--}}
{{--                                        <li class="comment">--}}
{{--                                            <div class="comment-body">--}}
{{--                                                <div class="comment-meta">--}}
{{--                                                    <div class="comment-author vcard">--}}
{{--                                                        <div class="author-img">--}}
{{--                                                            <img alt="Maria" src="assets/images/comments/1.png" class="avatar photo">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!--/.comment-author-->--}}
{{--                                                    <div class="comment-metadata"><b class="author">Zhon Andarson</b>--}}
{{--                                                    </div>--}}
{{--                                                    <!--/.comment-metadata-->--}}
{{--                                                </div>--}}
{{--                                                <!--/.comment-meta-->--}}
{{--                                                <div class="comment-details">--}}
{{--                                                    <div class="comment-content">--}}
{{--                                                        <p>Coding is used in almost all aspects of life and work now, be it directly or indirectly.--}}
{{--                                                            It’s not just for companies in the tech sector. “An increasing number of businesses rely--}}
{{--                                                            on computer code,</p>--}}
{{--                                                    </div>--}}
{{--                                                    <!--/.comment-content-->--}}
{{--                                                    <div class="comment-footer">--}}
{{--                                                        <span class="date">10:35pm, 27 jan 2015.</span>--}}
{{--                                                        <a href="#" class="comment-reply-link">Reply</a>--}}
{{--                                                    </div>--}}
{{--                                                </div><!-- /.comment-details-->--}}
{{--                                            </div>--}}
{{--                                            <!--/.comment-body-->--}}
{{--                                            <ol class="children">--}}
{{--                                                <li class="comment">--}}
{{--                                                    <div class="comment-body">--}}
{{--                                                        <div class="comment-meta">--}}
{{--                                                            <div class="comment-author vcard">--}}
{{--                                                                <div class="author-img">--}}
{{--                                                                    <img alt="avatar" src="assets/images/comments/2.png" class="avatar photo">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <!--/.comment-author-->--}}
{{--                                                            <div class="comment-metadata"><b class="author">Andro Smith Doe</b>--}}
{{--                                                            </div>--}}
{{--                                                            <!--/.comment-metadata-->--}}
{{--                                                        </div>--}}
{{--                                                        <!--/.comment-meta-->--}}
{{--                                                        <div class="comment-details">--}}
{{--                                                            <div class="comment-content">--}}
{{--                                                                <p>Coding is used in almost all aspects of life and work now, be it directly or--}}
{{--                                                                    indirectly. It’s not just for companies in the tech sector. “An increasing number of--}}
{{--                                                                    businesses rely on computer code,</p>--}}
{{--                                                            </div>--}}
{{--                                                            <!--/.comment-content-->--}}
{{--                                                            <div class="comment-footer">--}}
{{--                                                                <span class="date">10:35pm, 27 jan 2015.</span>--}}
{{--                                                                <a href="#" class="comment-reply-link">Reply</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div><!-- /.comment-details-->--}}
{{--                                                    </div>--}}
{{--                                                    <!--/.comment-body-->--}}
{{--                                                </li>--}}
{{--                                                <!--/.comment-->--}}
{{--                                            </ol>--}}
{{--                                            <!--/.children-->--}}
{{--                                        </li>--}}
{{--                                        <!--/.comment-body-->--}}
{{--                                        <li class="comment">--}}
{{--                                            <div class="comment-body">--}}
{{--                                                <div class="comment-meta">--}}
{{--                                                    <div class="comment-author vcard">--}}
{{--                                                        <div class="author-img">--}}
{{--                                                            <img alt="" src="assets/images/comments/2.png" class="avatar photo">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <!--/.comment-author-->--}}
{{--                                                    <div class="comment-metadata"><b class="author">Heas lins</b>--}}
{{--                                                    </div>--}}
{{--                                                    <!--/.comment-metadata-->--}}
{{--                                                </div>--}}
{{--                                                <!--/.comment-meta-->--}}
{{--                                                <div class="comment-details">--}}
{{--                                                    <div class="comment-content">--}}
{{--                                                        <p>Coding is used in almost all aspects of life and work now, be it directly or indirectly.--}}
{{--                                                            It’s not just for companies in the tech sector. “An increasing number of businesses rely--}}
{{--                                                            on computer code, </p>--}}
{{--                                                    </div>--}}
{{--                                                    <!--/.comment-content-->--}}
{{--                                                    <div class="comment-footer">--}}
{{--                                                        <span class="date">10:35pm, 27 jan 2015.</span>--}}
{{--                                                        <a href="#" class="comment-reply-link">Reply</a>--}}
{{--                                                    </div>--}}
{{--                                                </div><!-- /.comment-details-->--}}
{{--                                            </div>--}}
{{--                                            <!--/.comment-body-->--}}
{{--                                        </li>--}}
{{--                                        <!--/.comment-body-->--}}
{{--                                    </ol>--}}
{{--                                    <!--/.comment-list-->--}}
{{--                                </div>--}}
{{--                                <!--/.col-md-12-->--}}
{{--                            </div>--}}
{{--                            <!--/.row-->--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="comment-respond">--}}
{{--                        <form action="#" class="comment-form">--}}
{{--                            <h3 class="comment-reply-title">Leave your comment</h3>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <input type="text" class="form-control" placeholder="Enter your name">--}}
{{--                                </div><!-- /.col-lg-6 -->--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <input type="email" class="form-control" placeholder="Your Email">--}}
{{--                                </div><!-- /.col-lg-6 -->--}}
{{--                                <div class="col-12">--}}
{{--                                    <textarea class="form-control" rows="4" cols="50" placeholder="Your message here"></textarea>--}}
{{--                                </div><!-- /.col-12 -->--}}
{{--                                <div class="form-submit clearfix">--}}
{{--                                    <button class="btn btn-default">Post <i class="fas fa-arrow-right"></i></button>--}}
{{--                                </div><!-- /.subimt -->--}}
{{--                            </div><!-- /.row -->--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    @endsection
</div>
