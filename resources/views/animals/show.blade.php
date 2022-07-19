@extends('app')

@section('body')
    <div class="card" style="width: 50%; background-image: linear-gradient(to right, white , {{$animal->type->color}});">
        <div class="card-body">
            <h5 class="card-title">{{$animal->name}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$animal->type->name}}</h6>
            <p class="card-text">Age: {{$animal->age()}}</p>
            <p class="card-text">Adoption cost: {{$animal->cost()}} €</p>
            <a href="{{url()->previous()}}" class="card-link">Back</a>
        </div>
    </div>
@endsection