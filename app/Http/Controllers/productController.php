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
        //
        if(isset($request['on_sale'])){
            $request['on_sale'] = 1;
        }
        $product = Product::create($request->all());
        // key word is ok

        $keyword_1 = Keyword::where('name' ,'=' , $request['keyword_1']);
        if($keyword_1->count() <= 0){
        $product->keywords()->save(new Keyword(['name' => $request['keyword_1']]));
        }else if($keyword_1->count() > 0){
        $product->keywords()->attach(['keyword_id'=> $keyword_1->first()->id ]);
        }
        $keyword_2 = Keyword::where('name' ,'=' , $request['keyword_2']);
        if($keyword_2->count() <= 0){
        $product->keywords()->save(new Keyword(['name' => $request['keyword_2']]));
        }else if($keyword_2->count() > 0){
        $product->keywords()->attach(['keyword_id'=> $keyword_2->first()->id ]);
        }
        $keyword_3 = Keyword::where('name' ,'=' , $request['keyword_3']);
        if($keyword_3->count() <= 0){
        $product->keywords()->save(new Keyword(['name' => $request['keyword_3']]));
        }else if($keyword_3->count() > 0){
        $product->keywords()->attach(['keyword_id'=> $keyword_3->first()->id ]);
        }
        $keyword_4 = Keyword::where('name' ,'=' , $request['keyword_4']);
        if($keyword_4->count() <= 0){
        $product->keywords()->save(new Keyword(['name' => $request['keyword_4']]));
        }else if($keyword_4->count() > 0){
        $product->keywords()->attach(['keyword_id'=> $keyword_4->first()->id ]);
        }
        $keyword_5 = Keyword::where('name' ,'=' , $request['keyword_5']);
        if($keyword_5->count() <= 0){
        $product->keywords()->save(new Keyword(['name' => $request['keyword_5']]));
        }else if($keyword_5->count() > 0){
        $product->keywords()->attach(['keyword_id'=> $keyword_5->first()->id ]);
        }
        // colors is ok
        $color_1 = Color::where('name' ,'=' , $request['color_1']);
        if($color_1->count() <= 0){
        $product->colors()->save(new Color(['name' => $request['color_1']]));
        }else if($color_1->count() > 0){
        $product->colors()->attach(['color_id'=> $color_1->first()->id ]);
        }
        $colors_2 = Color::where('name' ,'=' , $request['colors_2']);
        if($color_1->count() <= 0){
        $product->colors()->save(new Color(['name' => $request['colors_2']]));
        }else if($colors_2->count() > 0){
        $product->colors()->attach(['color_id'=> $colors_2->first()->id ]);
        }
        $colors_3 = Color::where('name' ,'=' , $request['colors_3']);
        if($colors_3->count() <= 0){
        $product->colors()->save(new Color(['name' => $request['colors_3']]));
        }else if($colors_3->count() > 0){
        $product->colors()->attach(['color_id'=> $colors_3->first()->id ]);
        }
        $colors_4 = Color::where('name' ,'=' , $request['colors_4']);
        if($colors_4->count() <= 0){
        $product->colors()->save(new Color(['name' => $request['colors_4']]));
        }else if($colors_4->count() > 0){
        $product->colors()->attach(['color_id'=> $colors_4->first()->id ]);
        }
        $colors_5 = Color::where('name' ,'=' , $request['colors_5']);
        if($colors_5->count() <= 0){
        $product->colors()->save(new Color(['name' => $request['colors_5']]));
        }else if($colors_5->count() > 0){
        $product->colors()->attach(['color_id'=> $colors_5->first()->id ]);
        }

        // specification work
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_1'] , 'value' => $request['specification_value_1']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_2'] , 'value' => $request['specification_value_2']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_3'] , 'value' => $request['specification_value_3']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_4'] , 'value' => $request['specification_value_4']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_5'] , 'value' => $request['specification_value_5']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_6'] , 'value' => $request['specification_value_6']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_7'] , 'value' => $request['specification_value_7']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_8'] , 'value' => $request['specification_value_8']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_9'] , 'value' => $request['specification_value_9']]));
        $product->specifications()->save(new Specification(['name' =>$request['specification_name_10'] , 'value' => $request['specification_value_10']]));

        return $request->all();
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
        $array_for_keywords=['keyword_1','keyword_2','keyword_3','keyword_
        ','keyword_4','keyword_5'];
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
        $product->delete();
        return $product;
    }
}
