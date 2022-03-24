@extends('layouts.main-layout')

@section('title')
    Modifica Luogo
@endsection

@section('content')
    <form action="{{ route('place.update', $place -> id) }}" enctype="multipart/form-data" method="POST">
        @method('POST')
        @csrf

        <label for="title">Titolo</label>
        <input type="text" name="title" placeholder="Inserisci titolo" value="{{ $place -> title }}">

        <label for="content">Descrizione</label>
        <textarea name="content" cols="30" rows="10" placeholder="Inserisci contenuto articolo" >{{ $place -> content }}"</textarea>

        <label for="address">Indirizzo</label>
        <input type="text" name="address" placeholder="Inserisci indirizzo" value="{{ $place -> address }}">

        <label for="category">Categoria</label>
        <select name="category" >
            @foreach ($categories as $category)
                <option value="{{$category -> id }}"

                    @if ($category -> id == $place -> category -> id )
                        selected
                    @endif
                    
                    >{{ $category -> name }}</option>
            @endforeach
        </select>

        @foreach ($placePhotos as $photo)
            <img src="{{ asset('storage/assets/places/'. $photo -> photo) }}" alt="non trovo immagine">
        @endforeach

        <label for="images">Inserisci Foto</label>
        <input type="file" name="images">

        <input type="submit" value="Crea">
    </form>

    <a href="{{ route('place.list') }}">Indietro</a>
    
@endsection