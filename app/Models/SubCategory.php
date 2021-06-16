<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function main_category(){
        return $this->belongsTo(MainCategory::class,'main_category_id','id');
    }
    public function category_info(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
