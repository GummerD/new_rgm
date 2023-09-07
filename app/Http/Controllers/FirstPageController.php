<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirstPageController extends Controller
{
    public function index(){
        return \view('FirstExamplePages.index');
    }

    public function first_task(){
        return \view('FirstExamplePages.first_task');
    }
}
