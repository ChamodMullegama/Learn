@extends('layout.app')

@section('con')
    <div class="container">
        <form class="row g-3" action="{{ route('crm.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">amount</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount"
                    name="amount">

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
                <div class="col-12">
        <button type="submit" class="btn btn-primary">add crm</button>
    </div>
    </div>

    </form>
    <br>
    <div class="card-mt-5">
        <h4>crm list</h4>
         <div class="card-body">
        <table class="table ">
            <thead>
                <tr>
                    <th>name</th>
                    <th>amount</th>
                    <th>image</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($crms as $crm)
                    <tr>
                        <td>{{ $crm->name }}</td>
                        <td>{{ $crm->amount }}</td>
                        <td>
                            @if ($crm->image)
                                <img src="{{ Storage::url($crm->image) }}" alt="" height="50px" width="50px">
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('crm.edit' , $crm->id) }}"> edit</a>
                            <form action="{{ route('crm.destroy' , $crm->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger " style="display: inline-block">delete</button>
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
