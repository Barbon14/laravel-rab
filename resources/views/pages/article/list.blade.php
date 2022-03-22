@extends('layouts.main-layout')

@section('title')
    Lista articoli
@endsection

@section('content')

    <a href="{{ route('article.create') }}">Nuovo articolo</a>

    <ul>
        @foreach ($articles as $article)
            <li>
                <a href="{{ route('article.show', $article -> id) }}">
                    {{ $article -> title }}
                </a> - 
                <a href="{{ route('article.edit', $article -> id) }}">
                    Modifica
                </a> - 
                <a href="{{ route('article.delete', $article -> id) }}">
                    Elimina
                </a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('admin.panel') }}">Indietro</a>

@endsection