<div>
    @section('content')
        <div class="container mt-4">
            <!-- Course Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="display-4">{{ $course['course']->name }}</h1>
                </div>
            </div>

            <!-- Course Stats -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card shadow stats-card text-center">
                        <div class="card-body">
                            <div class="stats-icon">📚</div>
                            <h5 class="card-title">Lessons</h5>
                            <p class="card-text h2">{{ $course['lessons_count'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow stats-card text-center">
                        <div class="card-body">
                            <div class="stats-icon">📝</div>
                            <h5 class="card-title">Words</h5>
                            <p class="card-text h2">{{ $course['course']->words ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow stats-card text-center">
                        <div class="card-body">
                            <div class="stats-icon">🚀</div>
                            <h5 class="card-title">Launch Date</h5>
                            <p class="card-text h2">{{ $course['course']->published_at ? date('M Y', strtotime($course['course']->published_at)) : 'Coming Soon' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow stats-card text-center">
                        <div class="card-body">
                            <div class="stats-icon">🏷️</div>
                            <h5 class="card-title">Tag</h5>
                            <span class="badge badge-primary">{{ $course['course']->tags ?? 'General' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- About Section -->
                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="card-text">
                                <article>
                                    {!! $course['content'] !!}
                                </article>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Lessons -->
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Course Content</h2>

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
    @endsection
</div>
