@extends('layouts.app')

@section('content')

<div class="container-fluid py-5"> <!-- Gunakan container-fluid untuk ruang penuh -->
    <div class="row">
        <!-- Invisible Sidebar -->
        <div class="col-md-2 d-none d-md-block"></div> <!-- Sidebar invisible -->

        <!-- Konten Utama -->
        <div class="pt-6 md:p-2 text-center ">
            
            <div class="text-center mb-4">
                <h1 class="text-primary">My Enrollments</h1>
            </div>

            <!-- Pesan Success dan Error -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Daftar Enrollments -->
            @if($enrollments->isEmpty())
                <div class="text-center">
                    <p class="text-muted">You are not enrolled in any courses yet.</p>
                    <a href="{{ route('courses.index') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-book"></i> Browse Courses
                    </a>
                </div>
            @else
                <div class="row justify-content-center gx-4 gy-4">
                    @foreach ($enrollments as $enrollment)
                        <div class="col-md-6 col-lg-4">
                            <div class="card shadow border-0 h-100 ">
                                <div class="card-body ">
                                    <h5 class="card-title text-primary">{{ $enrollment->course->course_name }}</h5>
                                    <p class="text-muted">
                                        by <strong>{{ $enrollment->course->user->username ?? 'Unknown' }}</strong>
                                    </p>
                                    <p><strong>Progress:</strong> {{ $enrollment->progress }}%</p>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <a href="{{ route('courses.contents', $enrollment->course->id) }}" 
                                            class="btn btn-sm btn-primary shadow">
                                            <i class="fas fa-play-circle"></i> View Contents
                                        </a>
                                        <span class="badge bg-success"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Invisible Sidebar -->
        <div class="col-md-2 d-none d-md-block"></div> <!-- Sidebar invisible -->
    </div>
</div>

<!-- Custom CSS -->
<style>
    .card {
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .btn:hover {
        transform: translateY(-2px);
        transition: all 0.2s ease;
    }
</style>
@endsection
