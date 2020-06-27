<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Story extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'title', 'body', 'slug', 'user_id', 'image', 'image_caption', 'status', ];

    public $preventGetImgAttr = false;
    public $preventGetBodyAttr = false;



    public function getImageAttribute($value)
    {
        return $this->preventGetImgAttr ? $value : url('storage/'.$value);
    }


    public function getBodyAttribute($value)
    {
        return $this->preventGetBodyAttr ? $value : Str::limit($value, 100);
    }


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment', 'story_id');
    }


    public function tags()
    {
        return $this->morphMany('App\Tag', 'taggable');
    }




    public static function booted()
    {
        static::deleting(function ($story){

            $story->preventGetImgAttr = true;
            $story->comments()->delete();
            $story->tags()->delete();
            Storage::disk('public')->delete( $story->image);
        });
    }












}
