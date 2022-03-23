<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticlePhoto;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function getList() {

        $articles = Article::all();

        return view('pages.article.list', compact('articles'));
    }

    public function show($id) {

        $article = Article::findOrFail($id);

        return view('pages.article.show', compact('article'));
    }    
    
    public function create() {

        $categories = Category::all();

        return view('pages.article.create', compact('categories'));
    }

    public function store(Request $request) {

        $data = $request->validate([

            'title' => 'required|string',
            'content' => 'required|string',
            'address' => 'string|max:255',                      
        ]);

        $article = Article::make($data);

        $category = Category::findOrFail($request->get('category'));
        $article -> category() -> associate($category);
        $article -> save();

        // immagini
        $images= $request->file('images');

        foreach ($images as $index=>$image) {

            $imageName = 'article' . $article -> id . '_'. ($index+1) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/assets/articles/', $imageName, 'public');
            $imageData['photo'] = $imageName;
    
            $photo = ArticlePhoto::make($imageData);
            $photo -> article() -> associate($article->id);
            $photo -> save();
        }

        return redirect()->route('article.show', $article->id);
    }

    public function edit($id) {

        $article = Article::findOrFail($id);

        $categories = Category::all();

        $articlePhotos = ArticlePhoto::where('article_id', $id)->get();

        return view('pages.article.edit', compact('article', 'categories', 'articlePhotos'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([

            'title' => 'string',
            'content' => 'string',
            'address' => 'string|max:255',
        ]);

        $article = Article::findOrFail($id);
        $article -> update($data);

        $category = Category::findOrFail($request->get('category'));
        $article->category()->associate($category);
        $article->save();

        // immagini 
        // $image = $request->file('images');
        // $imageName = 'article' . $article->id . '_01' . '.' . $image->getClientOriginalExtension();
        // $image->storeAs('/assets/articles/', $imageName, 'public');
        // $imageData['photo'] = $imageName;

        // $photo = ArticlePhoto::where('article_id', $id);;
        // $photo->article()->associate($article->id);
        // $photo->save();

        return redirect()->route('article.show', $article->id);
    }

    public function delete($id) {

        $article = Article::findOrFail($id);
        $photos = ArticlePhoto::where('article_id', $id) -> get();
        foreach ($photos as $photo) {
            Storage::disk('public')->delete('/assets/articles/'.$photo->photo);
        }
        $article -> articlePhotos() -> delete();
        $article -> delete();

        return redirect()->route('article.list');
    }

}
