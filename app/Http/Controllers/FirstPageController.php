<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstPageController extends Controller
{
    public function index(){
        return \view('test_regexp.index');
    }

    public function first_task(){
        return \view('test_regexp.first_task');
    }
}
