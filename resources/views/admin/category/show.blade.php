@extends('admin.master')
@section('content')
<h1 class="text-center">
category
</h1>
<h2>name : {{$category->name}}</h2>
<a href="{{route('category.edit' , $category->id)}}" class="btn btn-info m-5 btn-block">EDIT</a>
{!! Form::open(['method'=>'DELETE', 'action'=> ['categoryController@destroy' , $category->id], 'files'=>true]) !!}
<div class="form-group ">
        {!! Form::submit('delete', ['class'=>'btn btn-danger m-5 btn-block']) !!}
    </div>
{!! Form::close() !!}


@endsection
