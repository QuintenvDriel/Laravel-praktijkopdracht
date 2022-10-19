@extends('layouts.app')
@section('content')
    <div class="card-body">

        <div class="card-body">
                <img src="{{$pokemon->Image}}">
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

    <div><a href="/pokemon" class="btn btn-info">Go Back </a></div>
        <br>
        <a href="{{route('pokemon.edit', $pokemon->id)}}" class="btn btn-outline-dark">
            Edit</a><br><br>
        <form action="{{route('pokemon.destroy', $pokemon->id)}}" method="POST">    @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Verwijderen</button></form>
@endsection
