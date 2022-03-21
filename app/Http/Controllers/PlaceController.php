<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function show($id)
    {

        $place = Place::findOrFail($id);

        return view('pages.place.show', compact('place'));
    }

    public function create()
    {

        return view('pages.place.create');
    }

    public function edit($id)
    {

        $place = Place::findOrFail($id);

        return view('pages.place.edit', compact('place'));
    }
}
