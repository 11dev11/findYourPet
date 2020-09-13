<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeenPet extends Model
{
    
    protected $fillable = [
        'chipNumber', 'city_id', 'city', 'township_id', 'township', 
        'street', 'animal_id', 'animal', 
        'breed_id', 'breed', 'sex_id', 'sex', 'size',
        'furColor',  'furColor2', 'eyeColor',
        'castratedOrSterialized', 'movedFromStreet', 
        'mover', 'moverPhone', 'moverEmail',
         'braceletColor',
         'disability', 
         'imagesURL', 'user_id',
    ];

}
