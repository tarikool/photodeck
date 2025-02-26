<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'tag', 'status', 'taggable_id', 'taggable_type', ];


    public function taggable()
    {
        return $this->morphTo();
    }

}
