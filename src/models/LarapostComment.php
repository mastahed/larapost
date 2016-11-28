<?php

namespace MastahEd\Larapost\Models;

use Illuminate\Database\Eloquent\Model;

class LarapostComment extends Model
{
    protected $table        = 'larapost_comments';

    protected $fillable     = ['post_id','content','user_id'];

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('MastahEd\Larapost\Models\LarapostPost','id','post_id');
    }
}
