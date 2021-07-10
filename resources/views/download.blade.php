<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        * { font-family: DejaVu Sans, sans-serif;}
        table {
            width: 100%;
            border-left: 0.1em solid #ccc;
            border-right: 0.01em solid #ccc;
            border-top: 0.1em solid #ccc;
            border-bottom: 0;
            border-collapse: collapse;
            font-size: 10px;
        }
        table td,
        table th {
            border-left: 0;
            border-right: 0.1em solid #ccc;
            border-top: 0.01em solid #ccc;
            border-bottom: 0.1em solid #ccc;
            font-size: 10px;
        }
    </style>
</head>

<h2>Rides through American cities</h2>

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
    @foreach($rides as $ride)

        <tr>
            <td>
                @foreach($cities as $city)
                    @if ($city->id == $ride->ID_cityFrom)
                        {{$city->name}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($cities as $city)
                    @if ($city->id == $ride->ID_cityTo)
                        {{$city->name}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($workers as $worker)
                    @if ($worker->id == $ride->ID_worker)
                        {{$worker->nameW}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($purposes as $purpose)
                    @if ($purpose->id == $ride->ID_purpose)
                        {{$purpose->type}}
                    @endif
                @endforeach
            </td>
            <td>
                @foreach($cars as $car)
                    @if ($car->id == $ride->ID_car)
                        {{$car->name}}
                    @endif
                @endforeach
            </td>
            <td>
                {{$ride->fuelUsed}}
            </td>
            <td>
                {{$ride->cost}}
            </td>

        </tr>

    @endforeach

    </tbody>


</table>
