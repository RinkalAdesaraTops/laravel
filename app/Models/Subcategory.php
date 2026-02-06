<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['cat_id','subcatname'];
    public function category(){
        return $this->belongsTo(category::class,'cat_id');
    }
    
}
