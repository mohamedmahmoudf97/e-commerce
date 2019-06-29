@extends('admin.master')
@section('content')
<h1 class="text-center">
    single product
</h1>
@foreach ($product->images as $image)
<img src="/images/{{$image->path}}" class="d-inline w-25" alt="...">
@endforeach
<h2 class="text-left">{{$product->name}}</h2>
<h3 class="text-left">{{$product->price}}</h3>
<h4 class="text-left">{{$product->description}}</h4>
<h5 class="text-left">{{$product->quantity}} || {{$product->quantity_per_unit}} unit in piese</h5>
<h6 class="text-left">brand:{{$product->brand->name}}</h6>
colors:
<ul class="list-group list-group-vertical-sm">
@foreach ($product->colors as $color)
    <li class="list-group-item">{{$color->name}}</li>
@endforeach
</ul>
keywords:
<ul class="list-group list-group-vertical-sm">
@foreach ($product->keywords as $keyword)
    <li class="list-group-item">{{$keyword->name}}</li>
@endforeach
</ul>
specification :
<ul class="list-group list-group-vertical-sm">
@foreach ($product->specifications as $specification)
    <li class="list-group-item">{{$specification->name}}: {{$specification->value}}</li>
@endforeach
</ul>
</div>
<div class="d-flex justify-content-around mx-4">
<a href="{{route('product.edit',$product->id)}}" class="btn btn-info  px-5 my-5">edit  </a>
{!! Form::open(['method'=>'DELETE', 'action'=> ['productController@destroy' , $product->id], 'files'=>true]) !!}
        {!! Form::submit('delete', ['class'=>'btn btn-danger px-5 my-5']) !!}
{!! Form::close() !!}
</div>
</div>

@endsection
