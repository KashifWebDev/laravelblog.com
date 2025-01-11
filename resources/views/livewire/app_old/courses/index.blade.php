<div>
    @section('content')
        <div class="main-wrapper mrb-100">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-12 main-wrapper-content">
                        <main class="site-main">
                            <div class="row masonry-posts">

                                @foreach($courses as $course)
                                    <div class="col-lg-4 col-md-6 grid-item">
                                        <article class="post post-grid-style post-grid-style-two">
                                            <div class="entry-thumb">
                                                <figure class="thumb-wrap">
                                                    <a  wire:navigate.hover href="{{ route('courses.show', ['course' => $course->slug]) }}">
                                                        <img src="storage/{{ $course->image }}" alt="Course Thumbnail" />
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
                                                    <a href="{{ route('courses.show', ['course' => $course->slug]) }}" wire:navigate.hover>
                                                        {{ $course->name }}
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
                                                    <div class="entry-date">{{ \Carbon\Carbon::parse($course->created_at)->format('l, F j, Y') }}</div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach

                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
