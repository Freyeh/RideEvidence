@extends('layout.app')
@section('content')
    <p style="text-align: center"><img src="https://www.car-fix.sk/wp-content/themes/carfix/images/theme/auto.png" style="width: 100%"></p>
    <h2> New Ride</h2>
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
            <form method="post" action="{{route('rides.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="cityfrom" class="form-label">City from</label>
                    <select id="cityfrom" name="cityfrom" class="form-select form-select-lg mb-3" required>

                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}} in:
                                @foreach($states as $state)
                                    @if($state->id == $city->ID_state)
                                        {{$state->name}}
                                    @endif
                                @endforeach</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="cityto" class="form-label">City to</label>
                    <select id="cityto" name="cityto" class="form-select form-select-lg mb-3" required>

                        @foreach ($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}} in
                                @foreach($states as $state)
                                    @if($state->id == $city->ID_state)
                                        {{$state->name}}
                                    @endif
                                @endforeach
                            </option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="worker" class="form-label">Worker</label>
                    <select id="worker" name="worker" class="form-select form-select-lg mb-3" required>

                        @foreach ($workers as $worker)
                            <option value="{{$worker->id}}">{{$worker->nameW}} from
                                @foreach ($cities as $city)
                                    @if ($city->id == $worker->ID_city)
                                        {{$city->name}}
                                    @endif
                                @endforeach
                                 personal ID: {{$worker->personalNumber}}, Phone number: {{$worker->phone}}

                            </option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="purpose" class="form-label">Purpose</label>
                    <select id="purpose" name="purpose" class="form-select form-select-lg mb-3" required>

                        @foreach ($purposes as $purpose)
                            <option value="{{$purpose->id}}">{{$purpose->type}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="car" class="form-label">Car</label>
                    <select id="car" name="car" class="form-select form-select-lg mb-3" required>

                        @foreach ($cars as $car)
                            <option value="{{$car->id}}">{{$car->name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-3">
                    <label for="fuelused" class="form-label">Fuel used</label>
                    <input type="number" step="0.01" name="fuelused" class="form-control" id="fuelused" placeholder="Fuel used">

                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Cost</label>
                    <input type="number" step="0.01" name="cost" class="form-control" id="cost" placeholder="Cost">

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
