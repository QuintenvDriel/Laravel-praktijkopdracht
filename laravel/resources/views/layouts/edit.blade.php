@extends('layouts.app')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('content')
        <div class="card" style="margin: 20px">
            <div class="card-header">Edit pokemon</div>
            <div class="card-body">

                <form action="{{ route('pokemon.update', [$pokemon->id]) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div>
                        <label for="Name" class="form-label">Name:</label>
                        <input id="Name"
                               type="text"
                               name="Name"
                               class="@error('Name') is-invalid @enderror form-control"
                               value="{{$pokemon->Name}}" />
                        @error('Name')
                        <span class="">{{ $message }}</span>
                        @enderror<br>

                        <div>
                            <br><label for="DexNumber" class="form-label">Pokedex Number:</label>
                            <input id="DexNumber"
                                   type="text"
                                   name="DexNumber"
                                   class="@error('DexNumber') is-invalid @enderror form-control"
                                   value="{{$pokemon->DexNumber}}" />
                            @error('DexNumber')
                            <span class="">{{ $message }}</span>
                            @enderror<br>

                            <div>
                                <br><label for="Type1" class="form-label">Type 1:</label>
                                <input id="Type1"
                                       type="text"
                                       name="Type1"
                                       class="@error('Type1') is-invalid @enderror form-control"
                                       value="{{$pokemon->Type1}}" />
                                @error('Type1')
                                <span class="">{{ $message }}</span>
                                @enderror<br>
                            </div>

                            <div>
                                <br><label for="Type2" class="form-label">Type 2:</label>
                                <input id="Type2"
                                       type="text"
                                       name="Type2"
                                       class="@error('Type2') is-invalid @enderror form-control"
                                       value="{{$pokemon->Type2}}" />
                                @error('Type2')
                                <span class="">{{ $message }}</span>
                                @enderror<br>
                            </div>

                            <div>
                                <br><label for="Gen" class="form-label">Generation:</label>
                                <input id="Gen"
                                       type="number"
                                       name="Gen"
                                       class="@error('Gen') is-invalid @enderror form-control"
                                       value="{{$pokemon->Gen}}" />
                                @error('Gen')
                                <span class="">{{ $message }}</span>
                                @enderror<br>
                            </div>

                            <div>
                                <br><label for="Image" class="form-label">Image:</label>
                                <input id="Image"
                                       type="text"
                                       name="Image"
                                       class="@error('Image') is-invalid @enderror form-control"
                                       value="{{$pokemon->Image}}" />
                                @error('Image')
                                <span class="">{{ $message }}</span>
                                @enderror<br>
                            </div>
                            <div>
                                <br><label for="DexEntry" class="form-label">Pokedex Entry:</label>
                                <input id="DexEntry"
                                       type="text"
                                       name="DexEntry"
                                       class="@error('DexEntry') is-invalid @enderror form-control"
                                       value="{{$pokemon->DexEntry}}" />
                                @error('DexEntry')
                                <span class="">{{ $message }}</span>
                                @enderror<br>
                            </div><br>
                        </div>
                    </div>







                    <input type="submit" value="Save" class="btn btn-success"><br>
                </form>
            </div>
        </div>
@endsection
