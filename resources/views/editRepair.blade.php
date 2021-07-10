@extends('layout.app')

@section('content')
    <br>
    <h2>Edit Repair</h2> <br>


    <form method="post" action="{{route('repairs.update',$repair)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <input type="reason" name="reason" class="form-control" id="reason" placeholder='' value="{{$repair->reason}}">

        </div>

        <div class="form-group">
            <label for="car" class="form-label">Car</label>
            <select id="car" name="car" class="form-select form-select-lg mb-3" required>

                @foreach ($cars as $car)
                    <option value="{{$car->id}}">
                        @if ($car->id==$repair->ID_car)
                            selected
                        @endif>{{$car->name}}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label for="cost" class="form-label">Cost Euro</label>
            <input type="number" step="0.01" name="cost" class="form-control" id="cost" placeholder="Cost" value="{{$repair->costEuro}}">

        </div>

        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <select id="city" name="city" class="form-select form-select-lg mb-3" required>

                @foreach ($cities as $city)
                    <option value="{{$city->id}}">
                        @if ($city->id==$repair->ID_city)
                            selected
                        @endif{{$city->name}} in:

                        @foreach($states as $state)
                            @if($state->id == $city->ID_state)
                                {{$state->name}}
                            @endif
                        @endforeach</option>
                @endforeach
            </select>

        </div>




        <button type="submit" class="btn btn-primary">Submit</button>

        <br>

    </form>
@endsection
