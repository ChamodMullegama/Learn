@extends('layout.app')

@section('con')
    <div class="container">
        <form class="row g-3" action="{{ route('item.store') }} " enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Product name">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>

                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="1234 Main St" name="image">
                @error('image')
                <div class="invalid-feedback">{{ $message }}</div>

                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add product</button>
            </div>
        </form>
        <br> 
        <div class="card-mt-5">
            <h4>item list</h4>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>item name</td>
                            <td>item price</td>
                            <td>item image</td>
                            <td>action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @if ($item->image)
                                        <img src="{{ Storage::url($item->image) }}" alt="" height="50px"
                                            width="50px">
                                    @else
                                        no image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-info"><i
                                            class="bi bi-pencil"></i></a>
                                    <form action="{{ route('item.destroy', $item->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
