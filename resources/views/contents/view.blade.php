@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <!-- Title -->
        <h1 class="text-4xl font-bold text-gray-800 mb-6 leading-tight">{{ $content->title }}</h1>
        
        <!-- Description -->
        <p class="text-gray-700 text-lg mb-8">{{ $content->body }}</p>

        <!-- Media Section -->
        <div class="media mb-8">
            @if ($content->media_type === 'youtube')
                <!-- YouTube Embed -->
                <iframe 
                    src="{{ $content->media_path }}" 
                    frameborder="0" 
                    allowfullscreen 
                    class="w-full h-96 rounded-lg shadow-md">
                </iframe>
            @elseif ($content->media_type === 'video')
                <!-- Video Player -->
                <video 
                    controls 
                    class="w-full max-h-96 rounded-lg shadow-md">
                    <source src="{{ asset('storage/' . $content->media_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @elseif ($content->media_type === 'file')
                @php
                    $fileExtension = pathinfo($content->media_path, PATHINFO_EXTENSION);
                @endphp

                @if (in_array($fileExtension, ['pdf']))
                    <!-- PDF Viewer -->
                    <iframe 
                        src="{{ asset('storage/' . $content->media_path) }}" 
                        frameborder="0" 
                        class="w-full h-96 rounded-lg shadow-md">
                    </iframe>
                @else
                    <!-- Download Button for Other Files -->
                    <a 
                        href="{{ asset('storage/' . $content->media_path) }}" 
                        download 
                        class="px-5 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                        Download {{ strtoupper($fileExtension) }} File
                    </a>
                @endif
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center gap-4">
            <!-- Mark as Done Button -->
            <form action="{{ route('progress.markAsDone', $content->id) }}" method="POST">
                @csrf
                <button type="submit" 
                    class="px-6 py-3 bg-green-500 text-white text-lg font-medium rounded-lg shadow-md hover:bg-green-600 transition duration-200">
                    Mark as Done
                </button>
                <button type="submit" 
                    class="px-6 py-3 bg-green-500 text-white text-lg font-medium rounded-lg shadow-md hover:bg-green-600 transition duration-200">
                    Next Content
                </button>
            </form>

            <!-- Back Button -->
            <a 
                href="{{ route('courses.contents', $content->course_id) }}" 
                class="px-6 py-3 bg-gray-600 text-white text-lg font-medium rounded-lg shadow-md hover:bg-gray-700 transition duration-200">
                Back to Contents
            </a>
        </div>
    </div>
</div>
@endsection
