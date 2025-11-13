@extends('layout.app')

@section('con')
    <div class="container">
        <form class="row g-3" action="{{ route('item.update',$item->id) }} " enctype="multipart/form-data" method="POST">
            @csrf
                  @method('PUT')
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name }}"
                    placeholder="Product name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $item->price }}">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>

                @enderror
            </div>

            
            <div class="col-12">
                <label for="inputAddress" class="form-label">image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="1234 Main St" name="image" >
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>

                @enderror
                 <div class="mt-2">
                <label>Current Image</label><br>
                @if ($item->image)
                    <img src="{{ Storage::url($item->image) }}" alt="Current Image" width="100" height="100">
                @else
                    <span>No Image</span>
                @endif
            </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">update product</button>
            </div>
        </form>
        <br>

    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
