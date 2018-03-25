<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
class Comment extends Model
{
    protected $fillable = ['id','user_id','body', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
