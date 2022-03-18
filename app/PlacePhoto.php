<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlacePhoto extends Model
{
    protected $fillable = [

        'photo'
    ];

    public function place() {

        return $this->belongsTo(Place::class);
    }
}
