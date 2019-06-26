@extends('admin.master')
@section('styles')

@endsection
@section('content')
<h1 class="text-center">
        Add Product
    </h1>
    {!! Form::open(['method'=>'POST', 'action'=> 'productController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'price:') !!}
        {!! Form::number('price', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'description:') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control'])!!}
    </div>
    <div class="form-row">
        <div class="form-group col-6">
            {!! Form::label('quantity', 'quantity:') !!}
            {!! Form::number('quantity', null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group col-6">
            {!! Form::label('quantity per unit', 'quantity per unit:') !!}
            {!! Form::number('quantity_per_unit', null, ['class'=>'form-control'])!!}
        </div>
    </div>
    <div class="form-group ">
        <select class="custom-select" name="subcategory_id">
            <option selected> choose sub category</option>
            @foreach ($subcategory as $subcategory)
        <option value="{{$subcategory->id}}" categoryid={{$subcategory->category_id}}>{{$subcategory->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group ">
        <select class="custom-select" name="brand_id">
            <option selected> choose brand</option>
            @foreach ($brand as $brand)
        <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-row">
        <div class="form-check col-6">
            <input class="form-check-input" type="checkbox" name="on_sale" id="on_sale" value="1" >
            <label class="form-check-label" for="on_sale">
              on sale
            </label>
          </div>
        <div class="form-group col-6">
            {!! Form::number('sale_value', null, ['class'=>'form-control','placeholder'=>'sale value'])!!}
        </div>
    </div>
    <div class="form-row">
        <div class="col-6">
            <div class="form-row" id="new_keyword">
               <h4 class="m-auto"> add 5 key words</h4>
               @for ($i = 0; $i < 5; $i++)

               <div class="form-group col-md-12">
                    {!! Form::text('keyword_'.$i , null, ['class'=>'form-control' , 'placeholder'=>'keywords'])!!}
                </div>
               @endfor
            </div>
        </div>

        <div class="col-6">
            <div class="form-row" id="new_color">
                <h4 class="m-auto"> add 5 colors</h4>
                @for ($i = 0; $i < 5; $i++)
                <div class="form-group col-md-12">
                    {!! Form::text('color_'.$i, null, ['class'=>'form-control' , 'placeholder'=>'colors'])!!}
                </div>
                @endfor
            </div>

        </div>
    </div>

    <h4 class="text-center">
           add 10  specification
        </h4>
    <div class="form-row" id="new_specificationr">
            @for ($i = 0; $i < 10; $i++)
            <div class="form-group col-6">
                    {!! Form::text('specification_name_'.$i, null, ['class'=>'form-control' , 'placeholder'=>'name'])!!}
                </div>
                <div class="form-group col-6">
                    {!! Form::text('specification_value_'.$i, null, ['class'=>'form-control' , 'placeholder'=>'value'])!!}
                </div>
            @endfor
    </div>
    <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">product images</span>
            </div>
            <div class="custom-file">
              <input type="file" name="images[]" multiple class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">upload your gallery</label>
            </div>
          </div>


    <div class="form-group ">
        {!! Form::submit('Create Post', ['class'=>'btn btn-dark float-right']) !!}
    </div>

    {!! Form::close() !!}

    @endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
@endsection

