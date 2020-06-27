<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'role', 'dob', 'gender', 'phone', 'image', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'slug' => 'string',
        'gender' => 'string',
        'status' => 'string',
        'phone' => 'string',
    ];

    public $preventGetImgAttr = false;


    public $status = [
        'active' => 'Active',
        'block' => 'BLock',
        'unlist' => 'Unlist',
    ];


    public function isAdmin()
    {
        if ($this->role == 'admin')
            return true;

        return false;
    }



    public function getImageAttribute($value)
    {
        return $this->preventGetImgAttr ? $value : url('storage/'.$value);
    }


    public function stories()
    {
        return $this->hasMany('App\Story', 'user_id');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }


    public function commentReplies()
    {
        return $this->hasMany('App\CommentReply', 'user_id');
    }



    public static function booted()
    {
        static::deleting(function ($user){

            $user->preventGetImgAttr = true;
            $user->stories()->delete();
            $user->comments()->delete();
            $user->commentReplies()->delete();
            Storage::disk('public')->delete( $user->image);
        });
    }


































}
