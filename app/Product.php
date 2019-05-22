<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name'];
    public function colors()
    {
        return $this->belongsToMany('App\Color');
    }
    public function images()
    {
        return $this->belongsToMany('App\Image');
    }
    public function specifications()
    {
        return $this->belongsToMany('App\Specification');
    }
    public function keywords()
    {
        return $this->belongsToMany('App\Keyword');
    }
    public function subcategories()
    {
        return $this->belongsToMany('App\Subcategory');
    }
    public function brands()
    {
        return $this->hasOne('App\Brand');
    }
}
