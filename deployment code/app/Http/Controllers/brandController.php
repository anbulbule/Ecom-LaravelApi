<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;
use Illuminate\Support\Str;

class brandController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return brand::all();
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
            'brand_name'=>'required'
        ]);
        brand::create([
            'brand_id'=> Str::random(5),
            'brand_name'=> $request->brand_name,
        ]);

        return response([
            'message'=>'Brand item inserted successfully',
            'status'=>'success'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $brand_id)
    {
        return brand::where('brand_id',$brand_id)->get();
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
    public function update(Request $request, $brand_id)
    {
        $request->validate([
            'brand_name'=>'required'
        ]);

        $brand=brand::where('brand_id',$brand_id)->first();
        if($brand){
            brand::where('brand_id', $brand_id)->update([
                'brand_name'=> $request->brand_name
            ]);
            return response([
                'message'=>'Brand name updated successfully',
                'status'=>'success'
            ],200);
        }else{
            return response([
                'message'=>'Brand name failed to update',
                'status'=>'failed'
            ]);
        }
    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $brand_id)
    {
        $brand = brand::where('brand_id', $brand_id)->first();
        if($brand){
            brand::where('brand_id', $brand_id)->delete();
            return response([
                'message'=>'data deleted successfully',
                'status'=>'success'
            ]);
        }else{
            return response([
                'message'=>'data failed to delete',
                'status'=>'failed'
            ]);
        }
    }
}
