@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 bg-gradient-to-r from-green-400 to-blue-400 min-h-screen">
    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-white">Create New Content</h1>
        <p class="text-lg text-gray-100 mt-2">Add your course materials and share knowledge effectively!</p>
    </div>

    <!-- Form Section -->
    <form action="{{ route('contents.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-8 max-w-3xl mx-auto">
        @csrf

        <!-- Error Alerts -->
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Select Course -->
        <div class="mb-6">
            <label for="course_id" class="block text-lg font-medium text-gray-700">Select a Course</label>
            <select id="course_id" name="course_id" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Select a Course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->course_name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Title -->
        <div class="mb-6">
            <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title"
                   class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('title') }}" required>
            @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Body -->
        <div class="mb-6">
            <label for="body" class="block text-lg font-medium text-gray-700">Body</label>
            <textarea id="body" name="body" rows="5"
                      class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Media Type -->
        <div class="mb-6">
            <label for="media_type" class="block text-lg font-medium text-gray-700">Media Type</label>
            <select id="media_type" name="media_type" class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Select Media Type</option>
                <option value="video" {{ old('media_type') == 'video' ? 'selected' : '' }}>Video</option>
                <option value="file" {{ old('media_type') == 'file' ? 'selected' : '' }}>File</option>
                <option value="youtube" {{ old('media_type') == 'youtube' ? 'selected' : '' }}>YouTube</option>
            </select>
            @error('media_type')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Media File -->
        <div class="mb-6" id="media-file-input" style="display: none;">
            <label for="media_file" class="block text-lg font-medium text-gray-700">Upload Media</label>
            <input type="file" id="media_file" name="media_file"
                   class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            @error('media_file')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Media URL -->
        <div class="mb-6" id="media-url-input" style="display: none;">
            <label for="media_path" class="block text-lg font-medium text-gray-700">YouTube URL</label>
            <input type="url" id="media_path" name="media_path"
                   class="mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('media_path') }}">
            @error('media_path')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-lg hover:bg-blue-600 transition duration-300">
                Create Content
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mediaTypeSelect = document.getElementById('media_type');
        const mediaFileInput = document.getElementById('media-file-input');
        const mediaUrlInput = document.getElementById('media-url-input');

        function toggleMediaInputs() {
            const selectedType = mediaTypeSelect.value;

            if (selectedType === 'video' || selectedType === 'file') {
                mediaFileInput.style.display = 'block';
                mediaUrlInput.style.display = 'none';
            } else if (selectedType === 'youtube') {
                mediaFileInput.style.display = 'none';
                mediaUrlInput.style.display = 'block';
            } else {
                mediaFileInput.style.display = 'none';
                mediaUrlInput.style.display = 'none';
            }
        }

        mediaTypeSelect.addEventListener('change', toggleMediaInputs);
        toggleMediaInputs(); // Initialize on page load
    });
</script>
@endsection
