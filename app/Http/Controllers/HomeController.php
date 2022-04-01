<?php

namespace App\Http\Controllers;
use URL;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
    	return view('home');
    }
}
