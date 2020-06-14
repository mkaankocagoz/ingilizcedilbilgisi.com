<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestContent extends Model
{
    protected $fillable=['test_id', 'question', 'A', 'B', 'C', 'D', 'E', 'answer', 'solution'];
}
