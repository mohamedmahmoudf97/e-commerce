@extends('admin.master')
@section('content')
<h1 class="text-center my-2">
    categories with subcategories
</h1>
<a href="{{route('category.create')}}" class=" my-2 btn btn-outline-dark float-right"> add new category</a>
<div class="clearfix"></div>
<div class="row">
@foreach ($category as $category)
    <div class="col-6 my-2">
        <ul class="list-group">
            <li class="list-group-item active">{{$category->name}}</li>
            @foreach ($category->subcategories as $subcategory)
                <li class="list-group-item">{{$subcategory->name}}</li>
            @endforeach
        </ul>
        <div class="d-flex justify-content-around my-4 border px-1">
            <a href="{{route('category.show',$category->id)}}" class="btn btn-success ">view all </a>
            <a href="{{route('category.edit',$category->id)}}" class="btn btn-info ">edit  </a>
            {!! Form::open(['method'=>'DELETE', 'action'=> ['categoryController@destroy' , $category->id], 'files'=>true]) !!}
                {!! Form::submit('delete', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
            {!! Form::open(['method'=>'GET', 'action'=> ['categoryController@create_subcategory' ,$category->id], 'files'=>true]) !!}
                {!! Form::submit('add subcategory', ['class'=>'btn btn-dark']) !!}
        {!! Form::close() !!}
            {{-- <a href="{{route('category.create-subcategory',$category->id)}}" class="btn btn-success ">add subcategory </a> --}}
        </div>
    </div>
@endforeach
</div>
@endsection
