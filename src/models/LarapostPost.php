<?php

namespace MastahEd\Larapost\Models;

use Illuminate\Database\Eloquent\Model;

class LarapostPost extends Model
{
    protected $table        = 'larapost_posts';

    protected $fillable     = ['title','slug','content','user_id'];

    /**
     * Get the comments for the post.
     */
    public function comments()
    {
        return $this->hasMany('MastahEd\Larapost\Models\LarapostComment','post_id','id');
    }
}
