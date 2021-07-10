@extends('layout.app')

@section('content')
<br>
<br>
    <div class="container">
        <h3>Name: {{$car->name}}</h3>
        Tank Volume: {{$car->tankVolume}} <br>
        Production Year: {{$car->productionYear}} <br>
        Color: {{$car->color}} <br>
        Consumption: {{$car->consumption}} <br>
<br>
        <img style="width: 50%" src="{{asset('images/'.$car->image)}}">
    </div>

@endsection
