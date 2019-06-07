<?php
use App\User;
use App\Role;
use App\Product;
use App\Color;
use App\Image;
use App\Specification;
use App\Subcategory;
use App\Category;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('admin/product','productController');
