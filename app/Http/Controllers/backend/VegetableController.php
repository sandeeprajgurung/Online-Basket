<?php

namespace App\Http\Controllers\backend;

use App\Models\Vegetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VegetableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data = Vegetable::latest()->limit(5)->get();
        // dd($data);
        $mediaItems = $data->getMedia()->first()->getUrl();
        dd($mediaItems);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        // die('hereeeeeee');
        // dd($request);
        $data = new Vegetable();
        // dd($request->image);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount = $request->discount;
        // $data->image = $request->image;
        // $data->addMedia('C:\Users\SRG\Downloads\ogin1.jpg')->toMediaCollection('images');
        // dd($data->image);
        $data->save();
        $data->addMedia($request->image)->toMediaCollection('images');
        // return $data;
        // dd($data->name);
        // $data = $this->validate($request, [
        //     'data' => [
        //     'name'=>'required',
        //     'description'=> 'required',
        //     'price'=>'required',
        //     'discount'=> 'required',
        //     'featured_product'=>'required'
        //     ]
        // ]);
        // dd($data);
        // Vegetable::create($data);
    }

    public function show()
    {
        $data = Vegetable::latest()->limit(5)->get();
        // dd($data);
        // $mediaItems = $data->getMedia();
        // dd($mediaItems);
		return $data;
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $data = Vegetable::find($id);
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
