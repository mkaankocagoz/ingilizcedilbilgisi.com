<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'description', 'content', 'page_id', 'read_count', 'order', 'status', 'site_url', 'image'];

    public function page_info(){
        return $this->belongsTo('App\Models\Page', 'page_id', 'id');
    }
}
