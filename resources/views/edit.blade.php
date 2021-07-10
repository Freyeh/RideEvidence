@extends('layout.app')
@section('content')
    <br>
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

            <form action="{{route('rides.update',$ride)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="cityfrom" class="form-label">City from</label>
                    <select id="cityfrom" name="cityfrom" class="form-select form-select-lg mb-3" required>

                        @foreach ($cities as $city)
                            <option value="{{$city->id}}"
                                    @if ($city->id==$ride->ID_cityFrom)
                                    selected
                                @endif>{{$city->name}} in:
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
                    <label for="cityto" class="form-label">City to</label>
                    <select id="cityto" name="cityto" class="form-select form-select-lg mb-3" required>

                        @foreach ($cities as $city)
                            <option value="{{$city->id}}"
                                    @if ($city->id==$ride->ID_cityTo)
                                    selected
                                @endif>{{$city->name}} in:
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
                            <option value="{{$worker->id}}"
                                    @if ($worker->id==$ride->ID_worker)
                                    selected
                                @endif>{{$worker->nameW}} from
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
                            <option value="{{$purpose->id}}"
                                    @if ($purpose->id==$ride->ID_purpose)
                                    selected
                                @endif>{{$purpose->type}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="car" class="form-label">Car</label>
                    <select id="car" name="car" class="form-select form-select-lg mb-3" required>

                        @foreach ($cars as $car)
                            <option value="{{$car->id}}"
                                    @if ($car->id==$ride->ID_car)
                                    selected
                                @endif>{{$car->name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="mb-3">
                    <label for="fuelused" class="form-label">Fuel used</label>
                    <input type="number" step="0.01" name="fuelused" class="form-control" id="fuelused" placeholder="Fuel used" value="{{$ride->fuelUsed}}">

                </div>
                <div class="mb-3">
                    <label for="cost" class="form-label">Fuel used</label>
                    <input type="number" step="0.01" name="cost" class="form-control" id="cost" placeholder="Fuel used" value="{{$ride->cost}}">

                </div>

                <div class="md-3">
                    <input type="file" name="image" class="form-control">
                </div><br>
                <img style="width: 50%" src="{{asset('images/'.$ride->image)}}"
                     alt="">
                <br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


@endsection
