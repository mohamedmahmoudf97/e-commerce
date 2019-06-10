<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use App\Subcategory;

use App\Brand;

use App\Color;

use App\Keyword;

use App\Specification;

use App\Image;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brand = Brand::all();
        $subcategory = Subcategory::all();
        return view('admin.product.create' , compact(['subcategory','brand']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request['on_sale'])){
            $request['on_sale'] = 1;
        }
        $product = Product::create($request->all());
        for ($i = 0; $i < 5; $i++)
            {
                $keyword = Keyword::where('name' ,'=' , $request['keyword_'.$i]);
                    if($keyword->count() <= 0){
                    $product->keywords()->save(new Keyword(['name' => $request['keyword_'.$i]]));
                    }else if($keyword->count() > 0){
                    $product->keywords()->attach(['keyword_id'=> $keyword->first()->id ]);
                    }
            }
            for ($i = 0; $i < 5; $i++)
            {
                $color = Color::where('name' ,'=' , $request['color_'.$i]);
                    if($color->count() <= 0){
                    if(!empty($request['color_'.$i]))
                    {
                        $product->colors()->save(new Color(['name' => $request['color_'.$i]]));
                    }
                    }else if($color->count() > 0){
                    $product->colors()->attach(['color_id'=> $color->first()->id ]);
                    }
            }
            for ($i = 0; $i < 5; $i++)
            {
                $product->specifications()->save(new Specification(['name' =>$request['specification_name_'.$i] , 'value' => $request['specification_value_'.$i]]));
            }
        $files = $request->file('images');
        foreach ($files as $file) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images' , $name);
            $product->images()->save(new Image(['path' =>$name]));
        }
        return ;
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
        $product = Product::whereId($id)->first();
        return view('admin.product.show',compact(['product']));
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
        $product = Product::findOrFail($id);
        $brand = Brand::all();
        $subcategory = Subcategory::all();
        return view('admin.product.edit',compact(['product','subcategory','brand','array_for_keywords']));
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
        $product = Product::find($id);

        if ($product->has('images')) {
            foreach($product->images as $image){
                if($request[str_replace('.','_',$image->path)] == 2){
                    $product->images()->detach($image->id);
                    $image->delete();
                }
            }
        }
        if (isset($request['images'])) {

            $files = $request->file('images');
            foreach ($files as $file) {
                $name = time() . $file->getClientOriginalName();
                $file->move('images' , $name);
                $product->images()->save(new Image(['path' =>$name]));
            }
        }
        $product->update($request->all());
        if ($product->has('colors')) {
            foreach ($product->colors as $colors) {
            $color = Color::findOrFail($colors->id);
            if($color->products->count() > 1){
                $product->colors()->save(new Color(['name' => $request['color_'.$colors->id]]));
                $product->colors()->detach($colors->id);
            }else{
                $colors->name = $request['color_'.$colors->id];
                $colors->save();
                }
            }
        }
        if ($product->has('keywords')) {
            foreach ($product->keywords as $keywords) {
            $keyword = Keyword::findOrFail($keywords->id);
            if($keyword->products->count() > 1){
                $product->keywords()->save(new Keyword(['name' => $request['keyword_'.$keywords->id]]));
                $product->keywords()->detach($keywords->id);
            }else{
                $keywords->name = $request['keyword_'.$keywords->id];
                $keywords->save();
                }
            }
        }
        if ($product->has('specifications')) {
            foreach ($product->specifications as $specification) {
                $specification->name = $request['specification_name_'.$specification->id];
                $specification->value = $request['specification_value_'.$specification->id];
                $specification->save();
            }
        }

         return $request->all();
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
        $product = Product::findOrFail($id);
        if ($product->has('colors')) {
            foreach ($product->colors as $colors) {
                $color = Color::findOrFail($colors->id);
                if($color->products->count() > 1){
                    $product->colors()->detach($colors->id);
                }else{
                    $colors->where('id',$colors->id)->delete();
                    }
                }
        }
        if ($product->has('keywords')) {
            foreach ($product->keywords as $keywords) {
            $keyword = Keyword::findOrFail($keywords->id);
            if($keyword->products->count() > 1){
                $product->keywords()->detach($keywords->id);
            }else if($keyword->products->count() <= 1){
                $product->keywords()->detach($keywords->id);
                $keywords->where('id',$keywords->id)->delete();
                }
            }
        }
        if ($product->has('specifications')) {
            foreach ($product->specifications as $specification) {
                $specification = Specification::findOrFail($specification->id);
                $specification->delete();
                $product->specifications()->detach($specification->id);
                $specification->where('id',$specification->id)->delete();
            }
        }
        if ($product->has('images')) {
            foreach($product->images as $image){
                    $product->images()->detach($image->id);
                    $image->delete();
            }
        }
        $product->delete();
        return $product;
    }
}
