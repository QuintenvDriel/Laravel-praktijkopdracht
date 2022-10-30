@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="margin-top:20px">
                <h2 class="text-center">{{$title}}</h2>
                <form action="{{route('profile.update', $user->id )}}" method="post">

                    @method('PUT')
                    @csrf

                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input id="name"
                               type="text"
                               name="name"
                               class="@error('name') is-invalid @enderror form-control"
                               value="{{$user->name}}" />
                        @error('name')
                        <span class="">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="form-label">E-mail</label>
                        <input id="email"
                               type="text"
                               name="email"
                               class="@error('email') is-invalid @enderror form-control"
                               value="{{$user->email}}" />
                        @error('email')
                        <span class="">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <input type="submit" value="Save" class="btn btn-success"><br>
                </form>
            </div>

        </div>
    </div>
@endsection
