@extends('layout.app')
@section('content')
    <h2>Register new Car</h2>
    <div class="row justify-content-center">
        <div class="col md-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                <img src="images/{{ Session::get('image') }}">
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('cars.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">

                </div>

                <div class="mb-3">
                    <label for="tankVolume" class="form-label">Tank Volume</label>
                    <input type="number" step="0.01" name="tankVolume" class="form-control" id="tankVolume" placeholder="Tank volume">

                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" name="color" class="form-control" id="color" placeholder="Color">

                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Production Year</label>
                    <input type="number" name="year" class="form-control" id="year" placeholder="Year">

                </div>

                <div class="mb-3">
                    <label for="consumption" class="form-label">Consumption</label>
                    <input type="number" step="0.01" name="consumption" class="form-control" id="consumption" placeholder="Consumption">

                </div>

                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div><br>
                <button type="submit" class="btn btn-primary">Submit</button>

                <br>

            </form>
        </div>

    </div>
@endsection
