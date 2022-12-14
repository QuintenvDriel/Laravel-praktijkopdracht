@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Favorite Pokemon</title>

            @section('content')
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8" align="center">
                            <h1>Welcome on this page!</h1>

                            <div class="card">
                                <div class="card-body">
                                    <div><a href="/pokemon" class="btn btn-info">Pokemon </a> <br> <br>
                                        @auth
                                        <a href="/profile" class="btn btn-info">My profile</a>
                                        @else <div class="card-body"><a href="{{ url('/login') }}" class="btn btn-outline-dark">Only with a account you can go to My profile</a></div>
{{--                                        <a href="/teams" class="btn btn-info">Pokemon teams</a></div>--}}
                                        @endauth
                                </div>

                                <img src="https://depopshop.nl/wp-content/uploads/2019/04/Pok%C3%A9mon-logo.jpg" width="450">


                            </div>
                            <sub>created by: Quinten van Driel</sub>
                        </div>
                    </div>
                </div>
            @endsection




