@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="row g-3" action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="col-md-12">
                <label for="text" class="form-label">des</label>
                <textarea type="text" class="form-control" id="des" name="des"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add item</button>
            </div>
        </form>

    <table class="table">
        <thead>
            <tr>
                <th>name</th>
                 <th>des</th>
                  <th>image</th>
                  <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                    <td>{{ $item->des }}</td>
                    <td>
                        @if ($item->image)
                              <img src="{{ Storage::url($item->image) }}" alt="" height="50px" width="50px">
                        @endif
                        no image
                    </td>
                    <td>
                        <a href="{{ route('item.edit' , $item->id) }}">Edit</a>
                        <form action="{{ route('item.delete' , $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return alert('are you want to delete this item ?')">delete</button>
                        </form>
                    </td>
            </tr>

            @endforeach
        </tbody>
    </table>

        </div>
    @endsection
