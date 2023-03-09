<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['id','product_id','product_name','image_name','category_id','brand_id'];
public function category(){
    return $this->belongsTo('App\Models\Category');
}
}
