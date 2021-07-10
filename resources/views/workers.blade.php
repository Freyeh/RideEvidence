@extends('layout.app')
@section('content')
    <p style="text-align: center"><img src="https://images.squarespace-cdn.com/content/v1/5ac603de506fbe843f006dc7/1615144813894-3WJHPU6QSFABZ2Z4Y1PD/ke17ZwdGBToddI8pDm48kL_9gdA8MCDzZ2zeQR7KC3wUqsxRUqqbr1mOJYKfIPR7LoDQ9mXPOjoJoqy81S2I8N_N4V1vUb5AoIIIbLZhVYy7Mythp_T-mtop-vrsUOmeInPi9iDjx9w8K4ZfjXt2dhdp9meP8Qy1SCyXvkzx8HSwz3NAxQQN7ehRKHqU_7dSH3bqxw7fF48mhrq5Ulr0Hg/Landscape-078_web.jpg?format=2500w" style="width: 100%"></p>
    <a class="btn btn-info" style="width: 100%; font-size: 20px" href="{{route('workers.create')}}">Register new Worker</a><br><br>

    <h2>Workers</h2>

    <table class="table">
        <thead>
        <tr>
            <th> Name </th>
            <th> City</th>
            <th> Personal Number</th>
            <th> Phone</th>
            <th> Operator</th>
        </tr>
        </thead>
        <tbody>
        @foreach($workers as $worker)

            <tr>
                <td>
                    {{$worker->nameW}}
                </td>
                <td>
                    @foreach($cities as $city)
                        @if ($city->id == $worker->ID_city)
                            {{$city->name}}
                        @endif
                    @endforeach
                </td>
                <td>
                    {{$worker->personalNumber}}
                </td>
                <td>
                    {{$worker->phone}}
                </td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{route('workers.edit',$worker->id)}}">edit</a>
                    <form class="d-inline-block" method="post" action="{{route('workers.destroy',$worker->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                    </form>
                </td>

            </tr>


        @endforeach

        </tbody>


    </table>

    {{$workers->render()}}
@endsection
