<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Role extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'roles';

    protected $fillable = [
        'role',
        'user_id',
    ];

    public function user()
    {

        return $this->belongsToMany(User::class);

    }
}
