<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status','status','serial');
    }
    public function brand_info(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function sub_category()
    {
        return $this->belongsToMany(SubCategory::class)->withTimestamps();
    }

    public function main_category()
    {
        return $this->belongsToMany('App\Models\MainCategory')->withTimestamps();
    }
    public function color()
    {
        return $this->belongsToMany('App\Models\Color')->withTimestamps();
    }
    public function image()
    {
        return $this->belongsToMany('App\Models\Image')->withTimestamps();
    }

    public function publication()
    {
        return $this->belongsToMany('App\Models\Publication')->withTimestamps();
    }

    public function size()
    {
        return $this->belongsToMany('App\Models\Size')->withTimestamps();
    }

    public function unit()
    {
        return $this->belongsToMany('App\Models\Unit')->withTimestamps();
    }

    public function vendor()
    {
        return $this->belongsToMany('App\Models\Vendor')->withTimestamps();
    }

    public function writer()
    {
        return $this->belongsToMany('App\Models\Writer')->withTimestamps();
    }
}
