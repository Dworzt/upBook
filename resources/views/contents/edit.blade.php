@extends('layouts.app')

<br>
<br>
<br>

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-primary text-black  text-center py-4">
                    <h4 class="mb-0 ">Edit Content</h4>
                </div>
                <div class="card-body p-5 bg-light">
                    

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contents.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="form-group mb-4">
                            <label for="title" class="form-label  font-weight-bold">Title</label>
                            <input type="text" name="title" id="title" class="form-control form-control-lg rounded-pill" 
                                   placeholder="Enter the title of the content" 
                                   value="{{ $content->title }}" required>
                        </div>

                        <!-- Body -->
                        <div class="form-group mb-4">
                            <label for="body" class="form-label font-weight-bold">Body</label>
                            <textarea name="body" id="body" rows="5" class="form-control rounded-lg"
                                      placeholder="Write the content details here">{{ $content->body }}</textarea>
                        </div>

                        <!-- Media Type -->
                        <div class="form-group mb-4">
                            <label for="media_type" class="form-label font-weight-bold">Media Type</label>
                            <select name="media_type" id="media_type" class="form-control form-control-lg rounded-pill" 
                                    onchange="toggleMediaInput(this.value)">
                                <option value="youtube" {{ $content->media_type == 'youtube' ? 'selected' : '' }}>YouTube</option>
                            </select>
                        </div>

                        <!-- Media Path (YouTube Link) -->
                        <div id="media-path-group" class="form-group mb-4" 
                             style="display: {{ $content->media_type === 'youtube' ? 'block' : 'none' }};">
                            <label for="media_path" class="form-label font-weight-bold">YouTube Link</label>
                            <input type="url" name="media_path" id="media_path" 
                                   class="form-control rounded-pill"
                                   placeholder="Enter the YouTube link" 
                                   value="{{ $content->media_path }}">
                        </div>

                        <!-- Media File -->
                        <div id="media-file-group" class="form-group mb-4" 
                             style="display: {{ $content->media_type === 'video' || $content->media_type === 'file' ? 'block' : 'none' }};">
                            <label for="media_file" class="form-label font-weight-bold">Upload File</label>
                            <input type="file" name="media_file" id="media_file" class="form-control rounded-lg">
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('contents.index') }}" class="btn btn-secondary btn-lg rounded-pill px-4">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4">
                                Update Content
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleMediaInput(mediaType) {
        document.getElementById('media-path-group').style.display = mediaType === 'youtube' ? 'block' : 'none';
        document.getElementById('media-file-group').style.display = mediaType === 'video' || mediaType === 'file' ? 'block' : 'none';
    }
</script>
@endsection
