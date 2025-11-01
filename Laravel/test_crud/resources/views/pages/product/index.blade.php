@extends('layout.app')
@section('con')
<div class="container">
    <form class="row g-3" method="POST" action="{{ route('product.store') }}">
        @csrf
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">name</label>
    <input type="text" class="form-control" id="name">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">des</label>
    <input type="text" class="form-control" id="des">
  </div>
  <div class="col-md-6">
    <label for="fileinput" class="form-label">image</label>
    <input type="file" class="form-control" id="image">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Add </button>
  </div>
</form>
     <div class="card-mt5">
        <div class="card-header">
            <h4>Product List</h4>
        </div>
        <div class="card-body">
            <table class="table ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>des</th>
                            <th>image</th>
                            <th>Action</th>

                        </tr>
                             @foreach ($product as $products)
                               <td>{{ $products->name }}</td>
                               <td>{{ $products->des }}</td>
                               <td>
                                @if ($products->image)
                                     <img src="{{ Storage::url($products->image) }}" alt="" height="50" width="50">
                                @endif
                                No image
                               </td>
                             @endforeach
                    </thead>
            </table>
        </div>
     </div>
</div>
@endsection



@push('css')

@endpush

@push('js')

@endpush
