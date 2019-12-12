<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->ajax) {
            $data = Product::latest()->limit(5)->get();
            foreach($data as $key => $value){
                $value->image = $value->getFirstMediaUrl('images');
                $item[] = $value;
            }
            return $item;
        }
        return view('backend.pages.vegetable');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->type = $request->type;
        // dd($request->image);
        $product->save();
        $product->addMedia($request->image)->toMediaCollection('images');
    }

    public function show(Request $request)
    {
        // print_r($request->ajax);
        if($request->ajax) {
            $data = Product::latest()->limit(5)->get();
            foreach($data as $key => $value){
                $value->image = $value->getFirstMediaUrl('images');
                $item[] = $value;
            }
            return $item;
        } else {
            $data = Product::all();
            foreach($data as $key => $value){
                $value->image = $value->getFirstMediaUrl('images');
                $items[] = $value;
            }
            return view('backend.pages.table_vegetable', compact('items'));
        }
        // die('NO');
        
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $data = Product::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount = $request->discount;
        $data->save();
    }

    public function destroy($id)
    {
        //
    }
}
