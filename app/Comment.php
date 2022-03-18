<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [

        'author',
        'comment'
    ];

    public function article() {

        return $this->belongsTo(Article::class);
    }
}
