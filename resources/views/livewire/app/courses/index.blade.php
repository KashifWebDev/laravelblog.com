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
                                        <h1 class="color-white mb-20 color-linear wow animate__animated animate__fadeIn">Premium Courses</h1><span class="btn btn-linear-small btn-number-arts">{{ $courses->count() }} articles</span>
                                    </div>
                                    <b class="color-gray-500 text-base wow animate__animated animate__fadeIn fw-bolder d-inline-block">
                                        Access Premium Laravel Courses for Free – Learn from Expert
                                    </b>
                                    <p class="color-gray-500 text-base wow animate__animated animate__fadeIn">
                                        Want to master Laravel with top-tier educational content? We offer premium Laravel courses completely free to help you enhance your skills.

                                        Our courses are created by leading Laravel educators and core Laravel community members, ensuring you receive high-quality, in-depth, and up-to-date training.

                                        Explore hands-on lessons, expert tutorials, and real-world projects—all at no cost! Start learning Laravel, Livewire, Filament, Eloquent, API development, security best practices, and more.
                                    </p>
                                </div>
                                <div class="col-lg-5 mb-20 text-start text-lg-end">
                                    <div class="box-breadcrumbs wow animate__animated animate__fadeIn">
                                        <ul class="breadcrumb">
                                            <li><a class="home" wire:navigate.hover href="{{ route('home') }}">Home</a></li>
                                            <li><span>Premium Courses</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="border-bottom border-gray-800 mt-10 mb-30"></div>
                                </div>
                            </div>
                            <div class="mt-50 mb-50">
                                <div class="row mt-50 mb-10">
                                    @foreach($courses as $course)
                                        <div class="col-lg-4">
                                            <div class="card-blog-1 hover-up wow animate__animated animate__fadeIn">
                                                <div class="card-image mb-20">
                                                    <a class="post-type" href="#"></a>
                                                    <a wire:navigate.hover href="{{ route('courses.show', ['course' => $course->slug]) }}">
                                                        <img src="storage/{{ $course->image }}" alt="{{ $course->name }}"></a>
                                                </div>
                                                <div class="card-info">
                                                    <div class="row">
                                                    </div><a wire:navigate.hover href="{{ route('courses.show', ['course' => $course->slug]) }}">
                                                        <h5 class="color-white mt-20">{{ $course->name }}</h5></a>
                                                    <div class="row align-items-center mt-25">
                                                        <div class="col-7">
                                                            <div class="box-author"><img src="{{ asset('avatars/admin.jpg') }}" alt="Admin">
                                                                <div class="author-info">
                                                                    <h6 class="color-gray-700">Admin</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5 text-end">
                                                            <a class="readmore color-gray-500 text-sm" wire:navigate.hover href="{{ route('courses.show', ['course' => $course->slug]) }}">
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
