<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home.index');
    }
    public function home_admin() {
        return view('home.home');
    }
    public function home_voluntary() {
        return view('voluntary.home');
    }
}