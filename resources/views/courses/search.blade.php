@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="text-primary">Search Results</h1>
    </div>

    @if ($courses->isEmpty())
        <div class="alert alert-warning text-center">
            <p class="mb-0">No courses found for your search.</p>
        </div>
    @else
        <div class="row g-4">
            @foreach ($courses as $course)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm position-relative" style="overflow: hidden;">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title text-primary">
                                {{ $course->course_name }}
                            </h5>
                            <p class="card-text text-muted">
                                {{ \Illuminate\Support\Str::limit($course->description, 100, '...') }}
                            </p>

                            <!-- Show Details Button -->
                            <a href="{{ route('courses.show', $course->id) }}" 
                               class="btn btn-primary mt-auto show-details-btn">
                                Show Details
                            </a>
                        </div>

                        <!-- Pop-up Animation on Hover -->
                        <div class="card-hover-popup position-absolute top-0 start-0 w-100 h-100 bg-primary bg-opacity-75 text-white d-flex flex-column justify-content-center align-items-center opacity-0">
                            <h5 class="mb-3">{{ $course->course_name }}</h5>
                            <p class="text-center">
                                {{ \Illuminate\Support\Str::limit($course->description, 150, '...') }}
                            </p>
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-light btn-sm">
                                View Full Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to All Courses</a>
    </div>
</div>

<!-- Custom CSS for Hover & Button -->
<style>
    .show-details-btn {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: white;
        transition: all 0.3s ease;
    }

    .show-details-btn:hover {
        background: linear-gradient(90deg, #0056b3, #007bff);
        transform: scale(1.05);
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    }

    .card-hover-popup {
        transition: opacity 0.3s ease, transform 0.3s ease;
        transform: scale(0.9);
        pointer-events: none;
    }

    .card:hover .card-hover-popup {
        opacity: 1;
        transform: scale(1);
        pointer-events: auto;
    }
</style>
@endsection
