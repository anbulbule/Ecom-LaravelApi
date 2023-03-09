<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\user;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return cart::all();
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
            'user_id'=>'required',
            'product_id'=>'required',
            'quantity'=>'required'
        ]);
        
        $user=user::where('user_id',$request->user_id);
        if($user){
            cart::create([
                'cart_date'=> date('d-m-Y'),
                'user_id'=> $request->user_id,
                'product_id'=> $request->product_id,
                'quantity'=> $request->quantity,
            ]);
    
            return response([
                'message'=>'cart item added successfully',
                'status'=>'success'
            ],200);
        }else{
            return response([
                'message'=>'user is not exist',
                'status'=>'failed'
            ],400);
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return cart::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'cart_name'=>'required',
            'cart_id' =>'required'
        ]);

        $cart=cart::where('cart_id',$request->id)->first();
        if($cart){
            cart::where('cart_id', $request->id)->update([
                'cart_name'=> $request->cart_name
            ]);
            return response([
                'message'=>'cart name updated successfully',
                'status'=>'success'
            ],200);
        }else{
            return response([
                'message'=>'cart name failed to update',
                'status'=>'failed'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = cart::where('cart_id', $id)->first();
        if($cart){
            cart::where('cart_id', $id)->delete();
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
