@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding:20px;">
                <div class="card">
                    Add a new pokemon
                    <a href="{{ url('/pokemon/create') }}" class="btn btn-success btn-sm" title="Add new pokemon">
                        Add new pokemon
                    </a>
                </div>
                <div class="card-body">

                   <div class="card-body">
                       @if(empty($pokemons))
                           <h2>er zijn geen pokemon</h2>
                       @else
                       @foreach($pokemons as $pokemon)
                        <h2>{{$pokemon->Name}}</h2>
                        <img src="{{$pokemon->Image}}">
                        {{$pokemon->Type1}}
                    @endforeach
                           @endif
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
