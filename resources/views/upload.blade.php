@extends('layout.layout')

@section('title','Upload CSV')
    
@section('content')

<h2>Upload CSV</h2>
<form class="profile-form" action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Upload CSV File:</label>
        <input type="file" class="form-control" name="file" id="file" required>
        @error('file')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>


@endsection