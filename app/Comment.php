<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;


    protected $fillable = [ 'body', 'user_id', 'story_id', 'status', ];




    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }



    public function story()
    {
        return $this->belongsTo('App\Story', 'story_id');
    }



    public function replies()
    {
        return $this->hasMany('App\CommentReply', 'comment_id');
    }


    public function tags()
    {
        return $this->morphMany('App\Tag', 'taggable');
    }



    public static function booted()
    {
        static::deleting(function ($comment){
            $comment->replies()->delete();
            $comment->tags()->delete();
        });
    }




}
