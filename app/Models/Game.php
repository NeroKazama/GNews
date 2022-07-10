<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Game extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'games';

    protected $fillable = [
        'name',
        'description_one',
        'description_two',
        'image'
    ];

}
