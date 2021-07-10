@extends('layout.app')

@section('content')

    <div style="width: 100%; height: auto;  position: relative;">

        <img src="https://www.eliterent.com/uploads/homepageslider/published/1.jpg" style="width: 100%">
        <a class="btn btn-primary" href="{{route('pdfview')}}" style="position: absolute; top: 15%; left: 85%;transform: translate(-100%, -70%); -ms-transform: translate(-100%, -70%); background-color: dodgerblue; color: white; text-align: center;">Download PDF</a>
        <a href="/xml" class="btn btn-primary"  style="position: absolute; top: 30%; left: 85%;transform: translate(-100%, -70%); -ms-transform: translate(-100%, -70%); background-color: dodgerblue; color: white; text-align: center;">Show XML</a>
        <a href="export" class="btn btn-primary"  style="position: absolute; top: 45%; left: 85%;transform: translate(-100%, -70%); -ms-transform: translate(-100%, -70%); background-color: dodgerblue; color: white; text-align: center;">Download XLSX</a>

    </div>
<br>

<h2>Rides</h2>


    <table class="table">
        <thead>
        <tr>
            <th> From </th>
            <th> To</th>
            <th> Who</th>
            <th> Purpose</th>
            <th> Car</th>
            <th> @sortablelink('fuelUsed', 'Fuel used (l)')</th>
            <th> @sortablelink('cost', 'Cost (euro)')</th>
            <th> Operations</th>
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

                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{route('rides.edit',$ride->id)}}">edit</a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('rides.show',$ride->id)}}">show</a>
                    <form class="d-inline-block" method="post" action="{{route('rides.destroy',$ride->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                    </form>
                </td>
            </tr>

        @endforeach

        </tbody>


    </table>

    {{$rides->render()}}


@endsection

