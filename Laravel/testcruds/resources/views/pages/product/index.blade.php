@extends('layout.app')
@section('con')
<form class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
    <label for="inputAddress2" class="form-label">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Add product</button>
  </div>
</form>
<div class="container">
    <div class="card-mt-5">
        <h4>product</h4>
        <div class="card-body">
             <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                             <th>price</th>
                                  <th>image</th>
                                      <th>Action</th>
                    </tr>
                    <tbody>
                        <tr>
                            @foreach ($products as $product)
                                 <td>{{ $product->image }}</td>
                                      <td>{{ $product->price }}</td>
                                          <td>
                                          @if ($product->image)
                                              
                                          @else

                                          @endif
                                          </td>
                            @endforeach
                        </tr>
                    </tbody>
                </thead>
             </table>
        </div>
    </div>
</div>
@endsection
