@extends('layout.app')
@section('content')
    <h2>Register new Worker</h2>
    <div class="row justify-content-center">
        <div class="col md-4">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                <img src="images/{{ Session::get('image') }}">
            @endif

            <form method="post" action="{{route('workers.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">

                </div>

                <div class="mb-3">
                    <label for="personalNumber" class="form-label">Personal Number</label>
                    <input type="number" name="personalNumber" class="form-control" id="personalNumber" placeholder="Personal Number">

                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">

                </div>

                <div class="form-group">
                    <label for="city" class="form-label">City</label>
                    <select id="city" name="city" class="form-select form-select-lg mb-3" required>

                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                    </select>

                </div>

                <br>
                <button type="submit" class="btn btn-primary">Submit</button>

                <br>

            </form>
        </div>

    </div>
@endsection
