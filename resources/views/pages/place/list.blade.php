@extends('layouts.main-layout')

@section('title')
    Lista posti
@endsection

@section('content')

    <a href="{{ route('place.create') }}">Nuovo Posto</a>

    <ul>
        @foreach ($places as $place)
            <li>
                <a href="{{ route('place.show', $place -> id) }}">
                    {{ $place -> title }}
                </a> - 
                <a href="{{ route('place.edit', $place -> id) }}">
                    Modifica
                </a> - 
                <a href="{{ route('place.delete', $place -> id) }}">
                    Elimina
                </a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('admin.panel') }}">Indietro</a>

@endsection