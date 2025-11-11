@extends('layout.app')

@section('con')
    <div class="container">
        <form class="row g-3" action="{{ route('item.store') }} " enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">image</label>
                <input type="file" class="form-control" id="image" placeholder="1234 Main St" name="image">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add product</button>
            </div>
        </form>
        <div class="card-mt-5">
            <h4>item list</h4>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>item name</td>
                            <td>item des</td>
                            <td>item image</td>
                            <td>action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($items as $item)
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
                                    <a href="{{ route('item.edit', $item->id) }}" class="btn btn-danger"> <i
                                            class="bi bi-trash"></i></a>
                                    <a href="{{ route('item.destroy', $item->id) }}" class="btn btn-info"> <i
                                            class="bi bi-pencil"></i></a>
                                </td>
                            @endforeach

                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
