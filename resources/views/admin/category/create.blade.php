@extends('admin.master')
@section('styles')

@endsection
@section('content')
<h1 class="text-center">
        Add Product
    </h1>
    {!! Form::open(['method'=>'POST', 'action'=> 'categoryController@store','files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>
    <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">category image</span>
            </div>
            <div class="custom-file">
              <input type="file" name="image" multiple class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">upload your iamge</label>
            </div>
          </div>
    <div class="form-group ">
        {!! Form::submit('Create category', ['class'=>'btn btn-dark float-right']) !!}
    </div>
    {!! Form::close() !!}
    @endsection
@section('script')
@endsection

