<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use  App\User;
use Carbon\Carbon;
class Post extends Model
{
    protected $fillable = ['user_id','title','body'];
    protected $guarded  = [];

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        // $this->comments()->create(compact($body));
        Comment::create([
            'user_id' => 1,
            'body'    => $body,
            'post_id' => $this->id
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query,$filters)
    {
        if($month = $filters['month']){
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if($year = $filters['year']){
            $query->whereYear('created_at',$year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month,count(*) published')
        ->groupBy('year','month')
        ->orderBy('month','desc')
        ->get()
        ->toArray();
    }

    public function tags()
    {
        // 1 post may have many tags
        return $this->belongsToMany(Tag::class);
    }
}

