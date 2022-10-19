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
                        <div class="col-md-8">
                            <h1>Welkom op deze pagina</h1>

                            <div class="card">
                                <div class="card-body">
                                    <div><a href="/pokemon" class="btn btn-info">Pokemon </a></div> <br>
                                    <div><a href="/teams" class="btn btn-info">Pokemon teams</a></div>
                                </div>
                                <img src="https://depopshop.nl/wp-content/uploads/2019/04/Pok%C3%A9mon-logo.jpg">

                            </div>
                        </div>
                    </div>
                </div>
            @endsection




