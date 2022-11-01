@extends('layouts.app')
@section('content')
    <div class="container justify-content-center">
        @auth
            <div class="col-md-8">
                <h4>Search</h4>
                <form action="{{route('pokemon.search')}}" method="post">    @csrf
                    <input type="text" name="other"> <input name="submit" type="submit" class="btn btn-primary btn-sm"
                                                            value="Search"/></form>
                <br>
                <h4>Filter</h4>
                <div class="flex-column">
                    @foreach($categories as $category)
                        <a href="{{route('pokemon.index', ['category' => $category->id])}}"
                           class="btn btn-primary btn-sm">{{$category->Name}}</a>
                    @endforeach
                </div>
            </div>
    </div>
    </div>
    @endauth

    <div class="container">
        <div class="row">
            <div class="col-12" style="padding:20px;">
                @auth
                    <div class="row flex-column">
                        <a href="{{ url('/pokemon/create') }}" class="btn btn-success " title="Add new pokemon">
                            Add new pokemon
                        </a>
                    </div>
                @else
                    <div class="row flex-column"><a href="{{ url('/login') }}" class="btn btn-outline-dark">Log in to
                            create a new pokemon</a></div>
                @endauth
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
                            <td>@auth
                                    <a href="{{route('pokemon.show', $pokemon->id)}}"
                                       class="btn btn-info btn-sm">Details</a> <br><br>

                                    {{--                                <a href="{{route('pokemon.edit', $pokemon->id)}}" class="btn btn-outline-dark btn-sm">--}}
                                    {{--                                    Edit</a><br><br>--}}
                                @else <a href="{{url('/login')}}" class="btn btn-outline-dark">Login to see details of
                                        pokemon</a>
                                @endauth

                            </td>


                        </tr>
                @endforeach

            </div>
        </div>
    </div>
    </div>
@endsection
