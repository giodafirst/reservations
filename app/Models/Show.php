<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'bookable',
        'poster_url',
        'location_id',
    ];

    protected $guarded = [ ];

    protected $table = 'shows';

    public $timestamps = true;

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function representations(){
        return $this->hasMany(Representation::class);
    }

    public function artistType(){
        return $this->belongsToMany(ArtistType::class);
    }
}
