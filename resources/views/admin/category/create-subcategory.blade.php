@extends('admin.master')
@section('styles')

@endsection
@section('content')
<h1 class="text-center">
       Add sub category
    </h1>
    {!! Form::open(['method'=>'POST', 'action'=> ['categoryController@store_subcategory' , $category->id],'files'=>true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
        {!! Form::hidden('category_id', $category->id )!!}
    </div>
    <div class="form-group ">
        {!! Form::submit('Create category', ['class'=>'btn btn-dark float-right']) !!}
    </div>
    {!! Form::close() !!}
    @endsection
@section('script')
@endsection
