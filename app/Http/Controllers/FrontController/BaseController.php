<?php

namespace App\Http\Controllers\FrontController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        return view('front_office.index');
    }

    public function gramer($site_url, $article_url = ""){
        if($article_url){
            dd('url var');
        }
        else{
            return view('front_office.list');
        }
    }
}
