<?php

namespace App\Http\Controllers;

use App\Article;
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

    public function edit($id) {

        $article = Article::findOrFail($id);

        return view('pages.article.edit', compact('article'));
    }
}
