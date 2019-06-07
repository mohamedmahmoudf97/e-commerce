<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    //
    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
