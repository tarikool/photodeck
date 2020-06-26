<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentReply extends Model
{
    use SoftDeletes;
    
    
    protected $fillable = ['body',' user_id',' comment_id',' status', ];



    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function comment()
    {
        return $this->belongsTo('App\Comment', 'comment_id');
    }


    public function tags()
    {
        return $this->morphMany('App\Tag', 'taggable');
    }


    public static function booted()
    {
        static::deleting(function ($commentReply){
            $commentReply->tags()->delete();
        });
    }


}
