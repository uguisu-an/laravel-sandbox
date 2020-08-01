<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'update_count'
    ];

    protected $casts = [
        'update_count' => 'int',
    ];
}
