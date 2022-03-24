@extends('layouts.main-layout')

@section('title')
    {{ $article -> title }}    
@endsection

@section('content')
    <h1>
        {{ $article -> title }}
    </h1>
    <img src="{{ asset('storage/assets/articles/'.$articlePhotos[0]->photo) }}" alt="non trovo immagine">
    <p>
        {{ $article -> content }}
    </p>

    <h3>
        Galleria
    </h3>

    <h3>
        Indirizzo
    </h3>
    <span>
        {{ $article -> address }}
    </span>
@endsection

