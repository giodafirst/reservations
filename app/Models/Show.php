<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'poster_url',
        'location_id',
        'bookable',
        'price',
    ];

    protected $guarded = ['slug'];

    protected $table = 'shows';

    public $timestamps = true;

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function representations(){
        return $this->hasMany(Representation::class);
    }
}
