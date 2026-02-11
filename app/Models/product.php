<?php

namespace App\Models;

use App\Http\Controllers\Subcategorycontroller;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['cat_id','subcat_id','name','price','image'];
    public function category(){
        return $this->belongsTo(category::class,'cat_id');
    }
    public function subcategory(){
        return $this->belongsTo(Subcategorycontroller::class,'subcat_id');
    }
}
