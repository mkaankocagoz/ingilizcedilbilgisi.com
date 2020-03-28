<?php

namespace App\Http\Controllers\BackController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        return view('back_office.index');
    }
}
