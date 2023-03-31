<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistTypeShow extends Model
{
    use HasFactory;

    public function shows(){
        return $this->belongsToMany(Show::class);
    }

    public function artistTypeShows(){
        return $this->belongsToMany(ArtistType::class);
    }
}
