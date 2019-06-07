<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','price','description','on_sale','sale_value','quantity','quantity_per_unit','brand_id','subcategory_id'];
    public function colors()
    {
        return $this->belongsToMany('App\Color')->withTimestamps();
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
        return $this->belongsToMany('App\Keyword')->withTimestamps();
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}
