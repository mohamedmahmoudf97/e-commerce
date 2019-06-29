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

Route::get('angular_api', 'productController@getproducts');
Route::get('/admin', function () {
    return view('home');
});
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::group(['middleware' => 'isAdmin'], function () {
    Route::resource('admin/product','productController');
    Route::resource('admin/category','categoryController');
    Route::get('admin/category/subcategory/create/{id}', [
        'uses' => 'categoryController@create_subcategory'
    ]);
    Route::post('admin/category/subcategory/store{id}', [
        'uses' => 'categoryController@store_subcategory'
    ]);
});
