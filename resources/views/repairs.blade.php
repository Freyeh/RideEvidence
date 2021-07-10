@extends('layout.app')

@section('content')
    <div style="width: 100%; height: auto;  position: relative;">

        <img src="https://www.atebgroup.co.uk/wp-content/uploads/2018/02/ateb-repairs-01.svg" style="width: 100%"></p>
        <a class="btn btn-lg btn-primary mb-3" href="{{route('repairs.create')}}" style="position: absolute; top: 50%; left: 50%;transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); background-color: dodgerblue; color: white; text-align: center;">Create</a>
    </div>

<h2>Repairs</h2>
<table class="table">
    <thead>
    <tr>
        <th> @sortablelink('reason', 'Reason') </th>
        <th> Car</th>
        <th> @sortablelink('costEuro', 'Cost (euro)')</th>
        <th> City</th>
        <th>Operations</th>
    </tr>
    </thead>
    <tbody>
    @foreach($repairs as $repair)

        <tr>
            <td>
                {{$repair->reason}}
            </td>
            <td>
                @foreach($cars as $car)
                    @if ($car->id == $repair->ID_car)
                        {{$car->name}}
                    @endif
                @endforeach
            </td>
            <td>
                {{$repair->costEuro}}
            </td>
            <td>
                @foreach($cities as $city)
                    @if ($city->id == $repair->ID_city)
                        {{$city->name}}
                    @endif
                @endforeach
            </td>
            <td>
                <a class="btn btn-sm btn-outline-primary" href="{{route('repairs.edit',$repair->id)}}">edit</a>
                <form class="d-inline-block" method="post" action="{{route('repairs.destroy',$repair->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                </form>
            </td>

        </tr>

    @endforeach

    </tbody>


</table>

{{$repairs->render()}}
@endsection
