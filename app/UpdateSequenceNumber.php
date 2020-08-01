<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateSequenceNumber extends Model
{
    protected $fillable = ['update_count'];

    public static function incrementUpdateCount()
    {
        self::firstOrCreate([], ['update_count' => 0])->increment('update_count');
    }
}
