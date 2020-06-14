<?php

namespace App\Http\Controllers\BackController;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $tests = Test::get();
        return view('back_office.test.index', compact('tests'));
    }

    public function create(){
        return view('back_office.test.create');
    }

    public function store(Request $request){

    }
}
