<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['page_name', 'sub_page', 'sub_page_id'];

    public function article_info(){
        return $this->hasMany('App\Models\Article', 'id', 'page_id');
    }
}
