<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = ['page_name', 'sub_page', 'sub_page_id'];
}
