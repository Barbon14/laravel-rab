<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [

        'title',
        'description',
        'address'
    ];

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function placePhotos() {

        return $this->hasMany(PlacePhoto::class);
    }
}
