<?php

namespace App\Http\Controllers;

use App\Page;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function vegetable()
    {
        $data = Product::all();
        foreach($data as $key => $value){
            $value->image = $value->getFirstMediaUrl('images');
            $items[] = $value;
        }
        return view('frontend.pages.products', compact('items'));
    }

    // ADMIN
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function obadmin()
    {
        return view('backend.pages.index');
    }
}
