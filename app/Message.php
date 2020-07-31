<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['body'];

    public function getBodyAttribute()
    {
        // これでできるけど、そもそもnullを受け付けない方がいいか
        // responseで""を返したいなら、そもそもDBに""が入った状態にする
        return $this->body ?? '';
    }
}
