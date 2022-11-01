@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding:20px;">
                <table class="table">
                    <h2>All Users</h2>
                    <tr>
                        <th scope="user">Name</th>
                        <th scope="user">E-mail</th>
                        <th scope="user">id</th>
                        <th scope="user">Admin</th>
                        <th scope="user">Created at</th>
                        <th scope="user">Actions</th>
                        <th scope="user">Admin</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->id}}</td>
                            <td>{{$user->Admin}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
{{--                                <a href="{{route('profile.edit', $user->id)}}" class="btn btn-outline-dark btn-sm">--}}
{{--                                    Edit user</a><br><br>--}}
                                <form action="{{route('admin.destroy',$user->id)}}" method="POST">    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                            <form action="{{ route('admin.editAdmin', $user->id)}}" method="post"
                                  style="margin-left: 10px">
                                @method('PATCH')
                                @csrf
                                @if($user->Admin)
                                    <td>
                                        <button class="btn btn-outline-danger" type="submit">Remove Admin Rights</button>
                                    </td>
                                @else
                                    <td>
                                        <button class="btn btn-outline-success" type="submit">Add Admin Rights</button>
                                    </td>
                                @endif

                            </form>
                        </tr>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding:20px;">

                <table class="table">
                    <br><br><br>
                    <h2>All Pokemon</h2>
                    <br>
                    <tr>
                        <th scope="pokemon">Name</th>
                        <th scope="pokemon">Image</th>
                        <th scope="pokemon">User</th>
                        <th scope="pokemon">Pokedex Number</th>
                        <th scope="pokemon">Type 1</th>
                        <th scope="pokemon">Type 2</th>
                        <th scope="pokemon">Generation</th>
                        <th scope="pokemon">Actions</th>
                        <th scope="pokemon">Status</th>
                    </tr>

                    @foreach($pokemons as $pokemon)
                        <tr>

                            <td><h3>{{$pokemon->Name}}</h3></td>
                            <td><img src="{{ asset('/storage/Image/'.$pokemon->Image) }}" width="200"></td>
                            <td>{{$pokemon->user_id}}</td>
                            <td>{{$pokemon->DexNumber}}</td>
                            <td>{{$pokemon->Type1}}</td>
                            <td>{{$pokemon->Type2}}</td>
                            <td>{{$pokemon->Gen}}</td>
                            <td><a href="{{route('pokemon.show', $pokemon->id)}}"
                                   class="btn btn-info btn-sm">Details</a> <br><br>

{{--                                <a href="{{route('pokemon.edit', $pokemon->id)}}" class="btn btn-outline-dark btn-sm">--}}
{{--                                    Edit Pokemon</a><br><br>--}}

                                <form action="{{route('pokemon.destroy', $pokemon->id)}}" method="POST">    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>

                                <form action="{{ route('admin.editStatus', $pokemon->id)}}" method="post"
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

