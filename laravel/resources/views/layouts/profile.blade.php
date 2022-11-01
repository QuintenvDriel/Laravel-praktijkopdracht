@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="row flex-column">
            <a href="{{route('profile.edit', $users->id)}}" class="btn btn-success"
               style="margin-right: 20px">Edit account</a>
        </div>
        <br>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding:20px;">
                <h2>My Pokemon</h2>
                <table class="table">
                    <tr>
                        <th scope="pokemon">Name</th>
                        <th scope="pokemon">Image</th>
                        <th scope="pokemon">Pokedex Number</th>
                        <th scope="pokemon">Type 1</th>
                        <th scope="pokemon">Type 2</th>
                        <th scope="pokemon">Generation</th>
                        <th scope="pokemon">Actions</th>
                        <th scope="pokemon">Status</th>
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

                                <form action="{{ route('profile.editStatus', $pokemon->id)}}" method="post"
                                      style="margin-left: 10px">
                            @method('PATCH')
                            @csrf
                            @if($pokemon->Status)
                                <td>
                                    <button class="btn btn-outline-success" type="submit">Active</button>
                                </td>
                            @else
                                <td>
                                    <button class="btn btn-outline-danger" type="submit">Inactive</button>
                                </td>
                                @endif

                                </form>
                                </td>

                                </td>


                        </tr>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        $(function () {
            $('.toggle-class').change(function () {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');
                console.log(status);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/status',
                    data: {'status': status, 'pokemon_id': pokemon_id},
                    success: function (data) {
                        console.log(data.success)
                    }
                });
            })
        })
@endsection
