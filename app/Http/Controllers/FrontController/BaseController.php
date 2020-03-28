<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        return view('front_office.index');
    }
}
