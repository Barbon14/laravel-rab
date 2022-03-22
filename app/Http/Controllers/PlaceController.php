<?php

namespace App\Http\Controllers;

use App\Category;
use App\Place;
use App\PlacePhoto;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function getList() {

        $places = Place::all();

        return view('pages.article.list', compact('places'));
    }


    public function show($id) {

        $place = Place::findOrFail($id);

        return view('pages.place.show', compact('place'));
    }

    public function create() {

        $categories = Category::all();

        return view('pages.place.create', compact('categories'));
    }

    public function store(Request $request) {

        $data = $request->validate([

            'title' => 'required|string',
            'description' => 'required|string',
            'address' => 'string|max:255',
        ]);

        $place = Place::make($data);

        $category = Category::findOrFail($request->get('category'));
        $place->category()->associate($category);
        $place->save();

        // immagini 
        $image = $request->file('images');
        $imageName = 'place' . $place->id . '_01' . '.' . $image->getClientOriginalExtension();
        $image->storeAs('/assets/places/', $imageName, 'public');
        $imageData['photo'] = $imageName;

        $photo = PlacePhoto::make($imageData);
        $photo->place()->associate($place->id);
        $photo->save();

        return redirect()->route('place.show', $place->id);
    }

    public function edit($id) {

        $place = Place::findOrFail($id);

        $categories = Category::all();

        $placePhotos = PlacePhoto::where('place_id', $id)->get();

        return view('pages.place.edit', compact('place', 'categories', 'placePhotos'));
    }

    public function update(Request $request, $id) {

        $data = $request->validate([

            'title' => 'string',
            'description' => 'string',
            'address' => 'string|max:255',
        ]);

        $place = Place::findOrFail($id);
        $place->update($data);

        $category = Category::findOrFail($request->get('category'));
        $place->category()->associate($category);
        $place->save();

        // immagini 
        // $image = $request->file('images');
        // $imageName = 'place' . $place->id . '_01' . '.' . $image->getClientOriginalExtension();
        // $image->storeAs('/assets/places/', $imageName, 'public');
        // $imageData['photo'] = $imageName;

        // $photo = placePhoto::where('place_id', $id);;
        // $photo->place()->associate($place->id);
        // $photo->save();

        return redirect()->route('place.show', $place->id);
    }

    public function delete($id) {

        $place = Place::findOrFail($id);
        $place->placePhotos()->delete();
        $place->delete();

        return redirect()->route('admin.panel');
    }
}
