<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return category::all();
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
            'category_name'=>'required'
        ]);
        category::create([
            'category_id'=> Str::random(5),
            'category_name'=> $request->category_name,
        ]);

        return response([
            'message'=>'New category inserted successfully',
            'status'=>'success'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category_id)
    {
        return category::where('category_id',$category_id)->get();
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
    public function update(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_id' =>'required'
        ]);

        $category=category::where('category_id',$request->category_id)->first();
        if($category){
            category::where('category_id', $request->category_id)->update([
                'category_name'=> $request->category_name
            ]);
            return response([
                'message'=>'category name updated successfully',
                'status'=>'success'
            ],200);
        }else{
            return response([
                'message'=>'category name failed to update',
                'status'=>'failed'
            ]);
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category_id)
    {
        $category = category::where('category_id', $category_id)->first();
        if($category){
            category::where('category_id', $category_id)->delete();
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
