@extends('layout.app')

@section('content')
    <p style="text-align: center"><img src="https://www.vivantina.com/wp-content/uploads/2019/09/google-search-console-1024x328.jpg" style="width: 100%"></p>

    <table class="table">
        <thead>
        <tr>
            <th> From </th>
            <th> To</th>
            <th> Who</th>
            <th> Purpose</th>
            <th> Car</th>
            <th> Fuel used (l)</th>
            <th> Cost (euro)</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($shows as $show)
            <tr>
                <td>
                    @foreach($cities as $city)
                        @if ($city->id == $show->ID_cityFrom)
                            {{$city->name}},
                            @foreach ($states as $state)
                                @if($state->id == $city->ID_state)
                                 State: {{$state->name}}
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($cities as $city)
                        @if ($city->id == $show->ID_cityTo)
                            {{$city->name}},
                            @foreach ($states as $state)
                                @if($state->id == $city->ID_state)
                                    State: {{$state->name}}
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($workers as $worker)
                        @if ($worker->id == $show->ID_worker)
                            {{$worker->nameW}}, {{$worker->personalNumber}}, {{$worker->phone}}
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($purposes as $purpose)
                        @if ($purpose->id == $show->ID_purpose)
                            {{$purpose->type}}
                        @endif
                    @endforeach
                </td>

                <td>
                    @foreach($cars as $car)
                        @if ($car->id == $show->ID_car)
                            {{$car->name}}, Tank volume: {{$car->tankVolume}} l, Year: {{$car->productionYear}}, Color: {{$car->color}}, Consumption: {{$car->cpnsumption}}
                        @endif
                    @endforeach
                </td>
                <td>
                    {{$show->fuelUsed}}
                </td>
                <td>
                    {{$show->cost}}
                </td>


            </tr>

        @endforeach

        </tbody>
    </table>




@endsection
