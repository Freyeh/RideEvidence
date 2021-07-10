@extends('layout.app')

@section('content')

<br>



        <h2> Ride </h2>
        From:
            @foreach($cities as $city)
                @if ($city->id == $ride->ID_cityFrom)
                    {{$city->name}} in:
                    @foreach($states as $state)
                        @if($state->id == $city->ID_state)
                            {{$state->name}}
                        @endif
                    @endforeach
                    @endif
            @endforeach
<br>
        To:
        @foreach($cities as $city)
        @if ($city->id == $ride->ID_cityTo)
        {{$city->name}} in:
        @foreach($states as $state)
            @if($state->id == $city->ID_state)
                {{$state->name}}
            @endif
        @endforeach
        @endif
        @endforeach
<br>
        By:
            @foreach($cars as $car)
                @if ($car->id == $ride->ID_car)
                    {{$car->name}} of {{$car->color}} color. Tank volume: {{$car->tankVolume}}. Consumption: {{$car->consumption}}. Production year: {{$car->productionYear}}.

                @endif
            @endforeach
<br>
        With:
            @foreach($workers as $worker)
                @if ($worker->id == $ride->ID_worker)
                    {{$worker->nameW}} from
                        @foreach ($cities as $city)
                            @if ($city->id == $worker->ID_city)
                                {{$city->name}}.
                            @endif
                        @endforeach
                        Personal ID: {{$worker->personalNumber}}. Phone number: {{$worker->phone}}
                @endif
            @endforeach
<br>
        Purpose:
            @foreach($purposes as $purpose)
                @if ($purpose->id == $ride->ID_purpose)
                    {{$purpose->type}}
                @endif
            @endforeach

<br>
            Fuel used: {{$ride->fuelUsed}} l. <br>
            Cost: {{$ride->cost}} euros. <br>
Landscape: <br>
<img style="width: 100%" src="{{asset('images/'.$ride->image)}}"
     alt="">

<br>



@endsection
