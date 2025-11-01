@extends('layout.app')

@section('con')
    {{-- <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Name</label>
    <input type="text" name="name" value="{{ $blog->name }}" required>

    <label>Description</label>
    <input type="text" name="des" value="{{ $blog->des }}" required>

       <div>
        <label>Current Image</label><br>
        @if ($blog->image)
            <img src="{{ Storage::url($blog->image) }}" alt="Current Image" width="100" height="100">
        @else
            <span>No Image</span>
        @endif
    </div>

    <div>
        <label>New Image (Leave empty to keep current)</label>
        <input type="file" name="image">
    </div>

    <button type="submit">Update Blog</button>
</form> --}}

   <div class="container">

    <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-4">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $blog->name }}">
        </div>

        <div class="col-md-4">
            <label for="inputPassword4" class="form-label">Description</label>
            <input type="text" class="form-control" id="des" name="des" value="{{ $blog->des }}">
        </div>

        <div class="col-md-4">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image">
            <div class="mt-2">
                <label>Current Image</label><br>
                @if ($blog->image)
                    <img src="{{ Storage::url($blog->image) }}" alt="Current Image" width="100" height="100">
                @else
                    <span>No Image</span>
                @endif
            </div>
        </div>

        <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update Blog</button>
            <a href="{{ route('blog.index') }}" class="btn btn-info">Back</a>
        </div>

    </form>

</div>

@endsection
