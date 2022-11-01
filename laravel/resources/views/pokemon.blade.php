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
            <form class="col-md-3" method="post"
                  action="{{route('pokemon.index')}}">
                @csrf
                <div class="form-group mb-3 small">
                    <select name="category" class="dropdown-toggle">
                        <option value="">Choose a category
                        </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->Name}}
                            </option>
                        @endforeach @csrf
                    </select>
                    @error('category')
                    <span class="alert-danger"> {{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Select</button>
                </div>
            </form>
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
                    <div class="row flex-column"><a href="{{ url('/login') }}" class="btn btn-outline-dark">Log in to create a new pokemon</a></div>
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
                                @else <a href="{{url('/login')}}" class="btn btn-outline-dark" >Login to see details of pokemon</a>
                                @endauth

                            </td>


                        </tr>
                @endforeach

            </div>
        </div>
    </div>
    </div>
@endsection
