<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['article_id', 'sub_comment_id', 'full_name', 'email', 'content'];

    public function article_info(){
        return $this->belongsTo('App\Models\Article', 'article_id', 'id');
    }
}
