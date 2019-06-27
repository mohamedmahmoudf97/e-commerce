<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable =['name'];
    public function subcategories()
    {
        return $this->hasMany('App\Subcategory');
    }
    public function images()
    {
        return $this->belongsToMany('App\Image')->withTimestamps();;
    }
}
