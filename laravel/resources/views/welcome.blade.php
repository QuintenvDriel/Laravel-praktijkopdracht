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
                                    <div><a href="/pokemon">Pokemon</a></div>
                                    <div><a href="/teams">Pokemon teams</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection




