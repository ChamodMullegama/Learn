@extends('layout.app')
@section('con')
    <div class="container">

        <form class="row g-3" action="{{ route('product.store') }} " enctype="multipart/form-data" method="POST">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">price</label>
                <input type="number" class="form-control" id="price">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">image</label>
                <input type="file" class="form-control" id="image" placeholder="1234 Main St">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Add product</button>
            </div>
        </form>

        <div class="card-mt-5">
            <h4>product</h4>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    @if ($product->image)
                                        <img src="{{ Storage::url($product->image) }}" alt="product image" width="50"
                                            height="50">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
