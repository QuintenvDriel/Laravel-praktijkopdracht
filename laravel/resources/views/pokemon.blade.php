@extends('layouts.app')
@section('content')
    <div class="justify-content-center">
        <div class="col-md-8">
            <form action="{{route('pokemon.search')}}" method="post">    @csrf
                <input type="text" name="other"> <input name="submit" type="submit" class="btn btn-primary btn-sm"
                                                        value="Search"/></form>

            <div class="m-2">
                <select>
                    @foreach($categories as $category)
                        <option><a href="{{route('pokemon.index', ['category' => $category->id])}}"
                                   class="dropdown-toggle" data-toggle="dropdown">{{$category->Name}}</a></option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12" style="padding:20px;">
                <div class="card">
                    <a href="{{ url('/pokemon/create') }}" class="btn btn-success " title="Add new pokemon">
                        Add new pokemon
                    </a>
                </div>
                <br>
                <table class="table">
                    <tr>
                        <th scope="pokemon">Name</th>
                        <th scope="pokemon">Image</th>
                        <th scope="pokemon">Pokedex Number</th>
                        <th scope="pokemon">Type 1</th>
                        <th scope="pokemon">Type 2</th>
                        <th scope="pokemon">Generation</th>
                        <th scope="pokemon">Actions</th>
                    </tr>

                    @foreach($pokemons as $pokemon)
                        <tr>

                            <td><h4>{{$pokemon->Name}}</h4></td>
                            <td><img src="{{ asset('/storage/Image/'.$pokemon->Image) }}" width="200"></td>
                            <td>{{$pokemon->DexNumber}}</td>
                            <td>{{$pokemon->Type1}}</td>
                            <td>{{$pokemon->Type2}}</td>
                            <td>{{$pokemon->Gen}}</td>
                            <td><a href="{{route('pokemon.show', $pokemon->id)}}"
                                   class="btn btn-info btn-sm">Details</a> <br><br>

                                <a href="{{route('pokemon.edit', $pokemon->id)}}" class="btn btn-outline-dark btn-sm">
                                    Edit</a><br><br>

                                <form action="{{route('pokemon.destroy', $pokemon->id)}}" method="POST">    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>

                            </td>


                        </tr>
                @endforeach

            </div>
        </div>
    </div>
    </div>
@endsection
