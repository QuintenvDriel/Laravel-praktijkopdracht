<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pokemon</title>

    <body>
    <h1> Lijst met Pokemon</h1>
    <a href="/">Go Back</a>

    @foreach($pokemons as $pokemon)
        <h2>{{$pokemon->Name}}</h2>
            <img src="{{$pokemon->Image}}">
            {{$pokemon->Type1}}
            -
            {{$pokemon->Type2}}
            <div>{{$pokemon->DexNumber}} - Generation:{{$pokemon->Gen}}</div>

    @endforeach
    </body>
