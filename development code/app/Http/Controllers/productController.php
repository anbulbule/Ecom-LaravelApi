<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\brand;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $categories = category::all();
        $brands = brand::all();
        $products = Product::with('category')->get();
        return view('product',['categories'=> $categories,'brands'=> $brands,'products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'image_name'=>'required|image',
            'category_id'=>'required',
            'brand_id'=>'required',
        ]);

        $image = $request->file('image_name');
        $image_name = date('dmYhis').$image->getClientOriginalName();
        $image_new_name = $request->file('image_name')->storeAs('public/images',$image_name);
        $products = product::create([
            'product_id' => Str::random(6),
            'product_name' => $request->product_name,
            'image_name' => $image_new_name, 
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}