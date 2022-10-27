@extends('layouts.app')
@section('content')
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
                                <form action="{{route('profile.status')}}" method="post" >@csrf
                                    @method('PUT')
                                    <input data-id="{{$pokemon->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $pokemon->Status ? 'checked' : '' }}>
                                status

{{--
{{--                                    <input id="switch-primary-{{$pokemon->id}}" value="{{$pokemon->Status}}" name="status" type="submit" {{ $pokemon->Status === 1 ? 'checked' : '' }}>--}}
{{--                                    <label for="switch-primary-{{$pokemon->id}}" >Status</label><br><br>--}}
{{--                                    --}}
<br><br>
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
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');
                console.log(status);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/status',
                    data: {'status': status, 'pokemon_id': pokemon_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
@endsection
