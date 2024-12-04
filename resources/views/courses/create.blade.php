@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Create New Course</h1>

        <form action="{{ route('courses.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Course Name -->
            <div>
                <label for="course_name" class="block text-lg font-semibold text-gray-700">Course Name</label>
                <input 
                    type="text" 
                    name="course_name" 
                    id="course_name" 
                    value="{{ old('course_name') }}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-lg font-semibold text-gray-700">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>{{ old('description') }}</textarea>
            </div>

            <!-- Start Date -->
            <div>
                <label for="start_date" class="block text-lg font-semibold text-gray-700">Start Date</label>
                <input 
                    type="date" 
                    name="start_date" 
                    id="start_date" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

            <!-- End Date -->
            <div>
                <label for="end_date" class="block text-lg font-semibold text-gray-700">End Date</label>
                <input 
                    type="date" 
                    name="end_date" 
                    id="end_date" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
            </div>

            <!-- Submit Button -->
            <div>
                <button 
                    type="submit" 
                    class="w-full px-6 py-3 bg-green-500 text-white font-medium rounded-lg shadow hover:bg-green-600 transition duration-200">
                    Create Course
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
