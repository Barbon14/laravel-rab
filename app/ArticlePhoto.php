<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlePhoto extends Model
{
    protected $fillable = [

        'photo'
    ];

    public function article() {

        return $this->belongsTo(Article::class);
    }
}
