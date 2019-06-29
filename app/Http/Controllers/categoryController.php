<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Subcategory;

use App\Image;
class categoryController extends Controller
{
    public function create_subcategory($id){
        $category = Category::findOrFail($id);
        return view('admin.category.create-subcategory' , compact('category'));
    }
    public function store_subcategory(Request $request , $id){
        $category = Category::findOrFail($id);
        $category->subcategories()->save( new Subcategory(['name'=>$request['name']]));
        return redirect('/admin/category');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::all();
        return view('admin.category.index',compact(['category']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $category= Category::create($request->all());
            // $file = $request->file('image');
            // $name = time() . $file->getClientOriginalName();
            // $file->move('images' , $name);
            // $category->images()->save(new Image(['path' =>$name]));
        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.category.show' , compact(['category']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact(['category']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $category= Category::find($id);
        $category->update($request->all());
        // # code...
        // }
        // $file = $request->file('image');
        //     $name = time() . $file->getClientOriginalName();
        //     $file->move('images' , $name);
        //     $category->images()->save(new Image(['path' =>$name]));
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category= Category::find($id)->delete();
        return redirect('/admin/category');
    }

}
