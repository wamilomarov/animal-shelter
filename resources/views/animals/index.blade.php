@extends('app')

@section('body')
    <form action="{{route('animals.index')}}" method="get">
        <div class="row align-items-end justify-content-center">
            <div class="list-group col-6">
                @foreach($types as $type)
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox"
                               @if(in_array($type->name, request()->query('types', []))) checked
                               @endif value="{{$type->name}}" name="types[]">
                        {{\Illuminate\Support\Str::ucfirst($type->name)}}
                    </label>

                @endforeach
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-success btn-lg">Show results</button>
            </div>
        </div>
    </form>
    <ul class="list-group list-group-flush py-4">
        @foreach($animals as $animal)
            <li class="list-group-item">
                <a href="{{route('animals.show', ['animal' => $animal->id])}}" style="text-decoration: none">
                    {{$animal->name}}
                </a>
                <span class="badge bg-secondary" style="background-color : {{$animal->type->color}} !important; margin-left: 1rem">
                      #{{$animal->type->name}}
                </span>
            </li>
        @endforeach
    </ul>

    {{ $animals->links() }}
@endsection