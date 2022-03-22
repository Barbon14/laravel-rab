@extends('layouts.main-layout')

@section('title')
    Nuovo Articolo
@endsection

@section('content')
    <form action="{{ route('article.store') }}" enctype="multipart/form-data" method="POST">
        @method('POST')
        @csrf

        <label for="title">Titolo</label>
        <input type="text" name="title" placeholder="Inserisci titolo">

        <label for="content">Contenuto articolo</label>
        <textarea name="content" cols="30" rows="10" placeholder="Inserisci contenuto articolo"></textarea>

        <label for="address">Indirizzo</label>
        <input type="text" name="address" placeholder="Inserisci indirizzo">

        <label for="category">Category</label>
        <select name="category">
            @foreach ($categories as $category)
                <option value="{{$category -> id }}">{{ $category -> name }}</option>
            @endforeach
        </select>

        <label for="images">Inserisci Foto</label>
        <input type="file" name="images">

        <input type="submit" value="Crea">
    </form>
@endsection