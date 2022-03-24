@extends('layouts.main-layout')

@section('title')
    Modifica Articolo
@endsection

@section('content')
    <form action="{{ route('article.update', $article -> id) }}" enctype="multipart/form-data" method="POST">
        @method('POST')
        @csrf

        <label for="title">Titolo</label>
        <input type="text" name="title" placeholder="Inserisci titolo" value="{{ $article -> title }}">

        <label for="content">Contenuto articolo</label>
        <textarea name="content" cols="30" rows="10" placeholder="Inserisci contenuto articolo" >{{ $article -> content }}"</textarea>

        <label for="address">Indirizzo</label>
        <input type="text" name="address" placeholder="Inserisci indirizzo" value="{{ $article -> address }}">

        <label for="category">Categoria</label>
        <select name="category" >
            @foreach ($categories as $category)
                <option value="{{$category -> id }}"

                    @if ($category -> id == $article -> category -> id )
                        selected
                    @endif
                    
                    >{{ $category -> name }}</option>
            @endforeach
        </select>

        @foreach ($articlePhotos as $photo)
            <img src="{{ asset('storage/assets/articles/'. $photo -> photo) }}" alt="non trovo immagine">
        @endforeach

        <label for="images">Inserisci Foto</label>
        <input type="file" name="images">

        <input type="submit" value="Crea">
    </form>

    <a href="{{ route('article.list') }}">Indietro</a>
    
@endsection