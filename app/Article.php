<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [

        'title',
        'content',
        'address',
    ];

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function comments() {

        return $this->hasMany(Comment::class);
    }

    public function articlePhotos() {

        return $this->hasMany(ArticlePhoto::class);
    }
}
