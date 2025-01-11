<div>

    @section('content')
        <div class="container-fluid py-4">
            <!-- Course Navigation -->
            <div class="course-breadcrumb">
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
                                        <a href="{{ route('courses.show.lesson', ['course' => $course['course'], 'lesson' => $previousLesson['slug']]) }}"
                                           class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2" viewBox="0 0 16 16">
                                                <path d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                            </svg>
                                            {{ $previousLesson['title'] }}
                                        </a>
                                    @endif
                                    @if($nextLesson)
                                        <a href="{{ route('courses.show.lesson', ['course' => $course['course'], 'lesson' => $nextLesson['slug']]) }}"
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
                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                        @php $count = 1; @endphp
                                        @foreach($course['lessons'] as $lessonItem)
                                            @if($lessonItem['type'] == 'link')
                                                <a href="{{ route('courses.show.lesson', ['course' => $course['course'], 'lesson' => $lessonItem['slug']]) }}"
                                                   class="list-group-item lesson-card {{ $lessonItem['slug'] === $lesson->slug ? 'active' : '' }}">
                                                    <div class="d-flex align-items-center">
                                                        <span class="lesson-number">{{ str_pad($count, 2, '0', STR_PAD_LEFT) }}</span>
                                                        <span class="flex-grow-1">{{ $lessonItem['title'] }}</span>
                                                        @if($lessonItem['slug'] === $lesson->slug)
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-primary" viewBox="0 0 16 16">
                                                                <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                                                            </svg>
                                                        @endif
                                                    </div>
                                                </a>
                                                @php $count++; @endphp
                                            @else
                                                <div class="p-3 bg-light border-bottom">
                                                    <h6 class="mb-0 font-weight-bold">{{ $lessonItem['title'] }}</h6>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
