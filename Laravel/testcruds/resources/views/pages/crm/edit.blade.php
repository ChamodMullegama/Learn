@extends('layout.app')

@section('con')
    <div class="container">
        <form class="row g-3" action="{{ route('crm.update', $crm->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ $crm->name }}" name="name">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">amount</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount"
                    value="{{ $crm->amount }}" name="amount">

                @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image">

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            @if ($crm->image)
                <img src="{{ Storage::url($crm->image) }}" alt="" height="50px" width="50px">
            @else
                No image
            @endif
            <div class="col-12">
                <button type="submit" class="btn btn-primary">add crm</button>
            </div>
    </div>

    </form>
    <br>

    </div>

    </div>
@endsection
