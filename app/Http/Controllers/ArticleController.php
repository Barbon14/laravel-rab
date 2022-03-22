<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticlePhoto;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($id) {

        $article = Article::findOrFail($id);

        return view('pages.article.show', compact('article'));
    }    
    
    public function create() {

        return view('pages.article.create');
    }

    public function store(Request $request) {

        $data = $request->validate([

            'title' => 'string',
            'content' => 'string',
            'address' => 'string|max:255',                      
        ]);

        $article = Article::make($data);

        // da aggiungere category
        $category = Category::findOrFail($request->get('category'));
        $article -> category() -> associate($category);
        $article -> save();

        // immagini 
        $image = $request-> file('images');

        $imageName = 'article' . $article -> id . '_01' . '.' . $image->getClientOriginalExtension();

        $image->storeAs('/assets/', $imageName, 'public');

        $imageData['photo'] = $imageName;

        $photo = ArticlePhoto::make($imageData);

        $photo -> article() -> associate($article->id);

        $photo -> save();

        return redirect()->route('article.show', $article->id);
    }

    public function edit($id) {

        $article = Article::findOrFail($id);

        return view('pages.article.edit', compact('article'));
    }
}
