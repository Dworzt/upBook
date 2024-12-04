@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 bg-gradient-to-r from-red-600 to-yellow-400 min-h-screen">
    <!-- Top Courses Section -->
    <div class="text-center py-8">
        <h2 class="text-3xl font-bold text-white mb-6">Top 5 Most Popular Courses</h2>
        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($popularCourses as $course)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                <div class="p-5">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $course->course_name }}</h5>
                    <p class="mb-3 font-normal text-gray-700">{{ $course->description }}</p>
                    <p class="mb-3 text-gray-800">
                        <strong>Enrolled Students:</strong> 
                        <span class="text-blue-600">{{ $course->enrollments_count }}</span>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- All Courses Section -->
    <div class="text-center py-8">
        <h2 class="text-3xl font-bold text-white mb-6">All Courses</h2>
        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($allCourses as $course)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300">
                <div class="p-5">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $course->course_name }}</h5>
                    <p class="mb-3 font-normal text-gray-700">{{ $course->description }}</p>
                    <a href="{{ route('courses.show', $course->id) }}" 
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 transition duration-300">
                        View Details
                        <svg class="w-4 h-4 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>
