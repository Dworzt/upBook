<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Manage Courses</h1>
            <a href="{{ route('courses.create') }}" class="btn btn-success">Create New Course</a>
        </div>

        @if ($courses->isEmpty())
            <div class="alert alert-info text-center">
                No courses available. <a href="{{ route('courses.create') }}">Add a new course</a>.
            </div>
        @else
            <div class="row g-4">
                @foreach ($courses as $course)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $course->course_name }}</h5>
                                <p class="card-text text-muted">{{ $course->description }}</p>

                                <!-- Student Progress -->
                                <h6 class="mt-4">Student Progress:</h6>
                                <ul class="list-unstyled mb-3">
                                    @foreach ($course->enrollments as $enrollment)
                                        <li>
                                            <strong>{{ $enrollment->user->username }}</strong>: {{ $enrollment->progress }}%
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="text-center mt-5">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
