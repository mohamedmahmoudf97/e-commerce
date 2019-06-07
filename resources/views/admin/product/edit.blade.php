@extends('admin.master')

@section('content')
<h1 class="text-center">
        Add Product
    </h1>
    {!! Form::open(['method'=>'PATCH', 'action'=> ['productController@update' , $product->id], 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'name:') !!}
        {!! Form::text('name', $product->name , ['class'=>'form-control' ])!!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'price:') !!}
        {!! Form::number('price', $product->price, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'description:') !!}
        {!! Form::textarea('description', $product->description, ['class'=>'form-control'])!!}
    </div>
    <div class="form-row">
        <div class="form-group col-6">
            {!! Form::label('quantity', 'quantity:') !!}
            {!! Form::number('quantity', $product->quantity, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group col-6">
            {!! Form::label('quantity per unit', 'quantity per unit:') !!}
            {!! Form::number('quantity_per_unit', $product->quantity_per_unit, ['class'=>'form-control'])!!}
        </div>
    </div>
    <div class="form-group ">
        <select class="custom-select" name="subcategory_id">
            @foreach ($subcategory as $subcategory)
        <option @if ($subcategory->id == $product->subcategory->id)
            selected
        @endif value="{{$subcategory->id}}" categoryid={{$subcategory->category_id}}>{{$subcategory->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group ">
        <select class="custom-select" name="brand_id">
            @foreach ($brand as $brand)
        <option @if ($brand->id == $product->brand->id)
                selected
            @endif value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-row">
        <div class="form-check col-6">
            <input @if ($product->on_sale == '1')
checked
            @endif class="form-check-input" type="checkbox" name="on_sale" id="on_sale" value="1" >
            <label class="form-check-label" for="on_sale">
              on sale
            </label>
          </div>
        <div class="form-group col-6">
            {!! Form::number('sale_value', $product->sale_value, ['class'=>'form-control','placeholder'=>'sale value'])!!}
        </div>
    </div>
    <div class="form-row">
        <div class="col-6">
            <div class="form-row" id="new_keyword">
               <h4 class="m-auto"> add 5 key words</h4>
                @foreach ($product->keywords as $keyword)
                    <div class="form-group col-md-12">
                        {!! Form::text('keyword_'.$keyword->id, $keyword->name , ['class'=>'form-control' , 'placeholder'=>'keywords'])!!}
                    </div>
                    @endforeach

            </div>
        </div>

        <div class="col-6">
            <div class="form-row" id="new_color">
                <h4 class="m-auto"> add 5 colors</h4>
                @foreach ($product->colors as $color)
                <div class="form-group col-md-12">
                    {!! Form::text('color_'.$color->id, $color->name , ['class'=>'form-control' , 'placeholder'=>'colors'])!!}
                </div>
                @endforeach

            </div>

        </div>
    </div>

    <h4 class="text-center">
           add 10  specification
        </h4>
    <div class="form-row" id="new_specificationr">
        @foreach ($product->specifications as $specification)
        <div class="form-group col-6">
                {!! Form::text('specification_name_'.$specification->id, $specification->name, ['class'=>'form-control' , 'placeholder'=>'name'])!!}
            </div>
            <div class="form-group col-6">
                {!! Form::text('specification_value_'.$specification->id, $specification->value, ['class'=>'form-control' , 'placeholder'=>'value'])!!}
            </div>
        @endforeach
    </div>
    <div class="form-group ">
        {!! Form::submit('save', ['class'=>'btn btn-dark float-right']) !!}
    </div>

    {!! Form::close() !!}

    @endsection

@section('script')

@endsection

