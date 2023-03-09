<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
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
            'user_name'=>'required',
            'contact_num'=>'required',
            'shop_address'=>'required',
            'city'=>'required',
            'pincode'=>'required',
        ]);

        $user = User::where('contact_num',$request->contact_num)->first();
        if(!$user){
            user::create([
                'user_id'=> Str::random(6),
                'user_name'=> $request->user_name,
                'contact_num'=> $request->contact_num,
                'shop_address'=> $request->shop_address,
                'city'=> $request->city,
                'pincode'=> $request->pincode,
            ]);
    
            return response([
                'message'=>'user added successfully',
                'status'=>'success'
            ],201);
        }else{
            return response([
                'message'=>'user already exist',
                'status'=>'failed'
            ],400);
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        return User::where('user_id',$user_id)->get();
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
            'user_name'=>'required',
            'contact_num'=>'required',
            'shop_address'=>'required',
            'city'=>'required',
            'pincode'=>'required',
        ]);

        $user=User::where('user_id',$request->user_id)->first();
        if($user){
            user::where('user_id', $request->user_id)->update([
                'user_id' => $request->user_id,
                'user_name'=> $request->user_name,
                'contact_num'=> $request->contact_num,
                'shop_address'=> $request->shop_address,
                'city'=> $request->city,
                'pincode'=> $request->pincode,
            ]);
            return response([
                'message'=>'user updated successfully',
                'status'=>'success'
            ],200);
        }else{
            return response([
                'message'=>'user failed to update',
                'status'=>'failed'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        $user = user::where('user_id', $user_id)->first();
        if($user){
            User::where('user_id', $user_id)->delete();
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
