@extends('layout.app')

@section('con')
    {{-- <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <label for="des">Description</label>
        <input type="text" name="des" id="des">

        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">

        </div>

        <button type="submit">Add</button>
    </form>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blog as $blogs)
                <tr>
                    <td>
                        @if ($blogs->image)
                            <img src="{{ Storage::url($blogs->image) }}" alt="Blog Image" width="50" height="50">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $blogs->name }}</td>
                    <td>{{ $blogs->des }}</td>
                    <td>
                        <form action="{{ route('blog.destroy', $blogs->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="">Delete</button>
                        </form>
                        <a href="{{ route('blog.edit', $blogs->id) }}">Edit</a> |
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    <div class="container">

        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-4">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-4">
                <label for="inputPassword4" class="form-label">des</label>
                <input type="text" class="form-control" id="des" name="des">
            </div>
            <div class="col-md-4">
                <label for="formFile" class="form-label">image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add blog</button>
            </div>
        </form>
        <div class="card mt-5">
            <div class="card-header">
                <h4>Blog List</h4>
            </div>

            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Des</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    <tbody>
                        @foreach ($blog as $blogs)
                            <tr>
                                <td>{{ $blogs->name }}</td>
                                <td>{{ $blogs->des }}</td>
                                <td>
                                    @if ($blogs->image)
                                        <img src="{{ Storage::url($blogs->image) }}" alt="" height="50"
                                            width="50">
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>
                                    {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editmodel" onclick="editBlog({{ $blogs->id }} , {{  $blogs->name }} , {{  $blogs->des }})"> edit </button>

                        <form action="{{ route('blog.destroy', $blogs->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> --}}
                                    {{-- <a href="{{ route('blog.edit', $blogs->id) }}">Edit</a> | --}}
                                    <a href="{{ route('blog.destroy', $blogs->id) }}" class="btn btn-danger"> <i
                                            class="bi bi-trash"></i></a>
                                    <a href="{{ route('blog.edit', $blogs->id) }}" class="btn btn-primary "> <i
                                            class="bi bi-pencil"></i></a>
                                </td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush


@push('js')
    <script></script>
@endpush
