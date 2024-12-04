<br>
<br>
<br>


@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <!-- Course Title and Description -->
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $course->course_name }} - Contents</h1>
        <p class="text-gray-600 text-lg mb-8">{{ $course->description }}</p>

        <!-- Contents List -->
        <ul class="space-y-4">
            @foreach ($course->contents as $content)
                <li class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <!-- Content Title and Media Type -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $content->title }}</h2>
                        <p class="text-sm text-gray-500">Media Type: <span class="capitalize">{{ $content->media_type }}</span></p>
                    </div>

                    <!-- View Button -->
                    <a 
                        href="{{ route('contents.view', $content->id) }}" 
                        class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg shadow hover:bg-blue-600 transition duration-200">
                        View
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Back to Enrollments Button -->
        <div class="mt-8">
            <a 
                href="{{ route('enrollments.index') }}" 
                class="inline-block px-6 py-3 bg-gray-500 text-white text-lg font-medium rounded-lg shadow hover:bg-gray-600 transition duration-200">
                Back to Enrollments
            </a>
        </div>
    </div>
</div>
@endsection
