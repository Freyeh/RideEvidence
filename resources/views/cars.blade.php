@extends('layout.app')

@section('content')
    <p style="text-align: center"><img src="https://currentev.com/assets/images/home/cars.png" style="width: 100%"></p>

    <a class="btn btn-info" style="width: 100%; font-size: 20px" href="{{route('cars.create')}}">New Car</a><br><br>
    <h2>Cars</h2>
    <table class="table">
        <thead>
        <tr>
            <th> Name </th>
            <th> Production Year</th>
            <th> Color</th>
            <th> Operator</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)

            <tr>
                <td>
                    <a href="{{route('cars.show', $car->id)}}"> {{$car->name}}</a>
                </td>
                <td>
                    {{$car->productionYear}}
                </td>
                <td>
                    {{$car->color}}
                </td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{route('cars.edit',$car->id)}}">edit</a>
                    <form class="d-inline-block" method="post" action="{{route('cars.destroy',$car->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                    </form>
                </td>

            </tr>


        @endforeach

        </tbody>


    </table>

    {{$cars->render()}}

@endsection
