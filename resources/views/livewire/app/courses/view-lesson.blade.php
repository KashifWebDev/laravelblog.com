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
            p img{
                margin: 10px 0px;
            }
        </style>
        <div class="container-fluid py-4">
            <!-- Course Navigation -->
            <div class="container">
                <div class="course-breadcrumb" style="margin-top: 75px;">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('courses.show', $course['course']) }}" class="text-muted mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                </svg>
                                Back to Course
                            </a>
                            <span class="text-muted mx-2">|</span>
                            <h6 class="mb-0 course-title">{{ $course['course']->name }}</h6>
                        </div>
                    </div>
                </div>
                <div class="nav-buttons mt-5">
                    @if($previousLesson)
                        <a wire:navigate.hover href="{{ route('courses.show.lesson', ['course' => $course['course'], 'lesson' => $previousLesson['slug']]) }}"
                           class="btn btn-primary d-flex" style="width: fit-content;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2" viewBox="0 0 16 16">
                                <path d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            {{ $previousLesson['title'] }}
                        </a>
                    @endif
                    @if($nextLesson)
                        <a wire:navigate.hover href="{{ route('courses.show.lesson', ['course' => $course['course'], 'lesson' => $nextLesson['slug']]) }}"
                           class="btn btn-primary ml-auto d-flex" style="width: fit-content;">
                            {{ $nextLesson['title'] }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <!-- Main Content -->
                    <div class="col-md-8 col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="h2 mb-4">{{ $lesson->title }}</h1>

                                <div class="lesson-content">
                                    {!! $course['lesson_content'] !!}
                                </div>

                                <!-- Navigation Buttons -->
                                <div class="nav-buttons d-flex justify-content-between mt-5">
                                    @if($previousLesson)
                                        <a wire:navigate.hover href="{{ route('courses.show.lesson', ['course' => $course['course'], 'lesson' => $previousLesson['slug']]) }}"
                                           class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2" viewBox="0 0 16 16">
                                                <path d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                            {{ $previousLesson['title'] }}
                                        </a>
                                    @endif
                                    @if($nextLesson)
                                        <a wire:navigate.hover href="{{ route('courses.show.lesson', ['course' => $course['course'], 'lesson' => $nextLesson['slug']]) }}"
                                           class="btn btn-primary ml-auto">
                                            {{ $nextLesson['title'] }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                                <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Left Sidebar - Course Content -->
                    <div class="col-md-4 col-lg-3">
                        <div class="lesson-sidebar">
                            <div class="card">

                                <h2 class="card-title mb-1 fs-2">Course Content</h2>

                                <div class="course-content-wrapper">
                                    @if($course['lessons']->count() > 0)
                                        @php $count = 1; @endphp
                                        @foreach($course['lessons'] as $lesson)
                                            @if($lesson['type'] == 'link')
                                                <div class="list-group-item lesson-card">
                                                    <a href="{{ route('courses.show.lesson', ['course' => $course['course'], 'lesson' => $lesson['slug']]) }}"
                                                       class="d-flex align-items-center">
                                                        <span class="lesson-number">{{ str_pad($count, 2, '0', STR_PAD_LEFT) }}</span>
                                                        <span class="lesson-title flex-grow-1">{{ $lesson['title'] }}</span>
                                                        <span class="ml-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right text-muted" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                    </span>
                                                    </a>
                                                </div>
                                                @php $count++; @endphp
                                            @else
                                                <h3 class="lesson-section-title">{{ $lesson['title'] }}</h3>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="alert alert-info">
                                            No lessons available yet.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('html,body').scrollTop(0);
        </script>
    @endsection
</div>
