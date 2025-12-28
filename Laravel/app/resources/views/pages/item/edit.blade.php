@extends('layouts.app')
@section('content')
    <div class="container">
        <form class="row g-3" action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
            </div>
            <div class="col-md-6">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
              <div class="col-md-12">
                <label for="image" class="form-label">currant image</label>
                 @if ($item->image)
                <img src="{{ Storage::url($item->image) }}" alt="" height="50px" width="50px">
            @else
                no image
            @endif
            </div>

            <div class="col-md-12">
                <label for="text" class="form-label">des</label>
                <textarea type="text" class="form-control" id="des" name="des">{{ $item->des }}</textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">update item</button>
            </div>
        </form>



    </div>
@endsection
