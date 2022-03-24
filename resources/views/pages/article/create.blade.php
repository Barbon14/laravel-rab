@extends('layouts.main-layout')

@section('title')
    Nuovo Articolo
@endsection

@section('content')
    <form class="container" action="{{ route('article.store') }}" enctype="multipart/form-data" method="POST">
        @method('POST')
        @csrf

        <div class="form-group">
            <label class="form-label" for="title">Titolo</label>
            <input class="form-control" type="text" name="title" placeholder="Inserisci titolo">
        </div>

        <div class="form-group">
            <label for="content">Contenuto articolo</label>
            <textarea class="form-control" name="content" cols="30" rows="10" placeholder="Inserisci contenuto articolo"></textarea>
        </div>

        <div class="form-group">
            <label for="address">Indirizzo</label>
            <input class="form-control" type="text" name="address" placeholder="Inserisci indirizzo">
        </div>

        <div class="form-group">
            <label for="category">Categoria</label>
            <select name="category">
                @foreach ($categories as $category)
                    <option value="{{$category -> id }}">{{ $category -> name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="images">Inserisci Foto</label>
            <input class="form-control-file" type="file" name="images[]" multiple>
        </div>

        <input  class="btn btn-primary" type="submit" value="Crea">
    </form>

    <a href="{{ route('article.list') }}">Indietro</a>

@endsection