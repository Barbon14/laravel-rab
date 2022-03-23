@extends('layouts.main-layout')

@section('title')
    Nuovo Posto
@endsection

@section('content')
    <form action="{{ route('place.store') }}" enctype="multipart/form-data" method="POST">
        @method('POST')
        @csrf

        <label for="title">Titolo</label>
        <input type="text" name="title" placeholder="Inserisci titolo">

        <label for="description">Contenuto articolo</label>
        <textarea name="description" cols="30" rows="10" placeholder="Inserisci descrizione"></textarea>

        <label for="address">Indirizzo</label>
        <input type="text" name="address" placeholder="Inserisci indirizzo">

        <label for="category">Categoria</label>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{$category -> id }}">{{ $category -> name }}</option>
            @endforeach
        </select>

        <label for="images">Inserisci Foto</label>
        <input type="file" name="images[]" multiple>

        <input type="submit" value="Crea">
    </form>

    <a href="{{ route('place.list') }}">Indietro</a>

@endsection