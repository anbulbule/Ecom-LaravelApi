<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['id','category_id','category_name'];

    public function products(){
        return $this->hasMany('App\Models\Product');
    }
}
