@extends('layouts.app')
@section('content')
    <div class="card" align="center">

        <div class="card-body">
                <img src="{{ asset('/storage/Image/'.$pokemon->Image) }}" width="200">
                <br><h1>{{$pokemon->Name}}</h1><br>
                <h3>Pokedex Entry:</h3>
                <div>{{$pokemon->DexEntry}}</div><br>
                <h3>Pokedex Number:</h3>
                <div>{{$pokemon->DexNumber}}</div><br>
                <h3>Type 1:</h3>
                <div>{{$pokemon->Type1}}</div><br>
                <h3>Type 2:</h3>
                <div>{{$pokemon->Type2}}</div><br>

        </div>

    <div><a href="javascript:history.back()" class="btn btn-info">Go Back </a></div>
        <br>
{{--        <a href="{{route('pokemon.edit', $pokemon->id)}}" class="btn btn-outline-dark">--}}
{{--            Edit</a><br><br>--}}
{{--        <form action="{{route('pokemon.destroy', $pokemon->id)}}" method="POST">    @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button class="btn btn-danger" type="submit">Verwijderen</button></form>--}}
@endsection
