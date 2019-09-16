<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use URL;
use HTML;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function blog()
    {
        return view('frontend.pages.blog');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function cart()
    {
        return view('frontend.pages.cart');
    }

    // ADMIN
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function obadmin()
    {
        return view('frontend.pages.cart');
    }
}
