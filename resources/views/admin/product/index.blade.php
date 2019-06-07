@extends('admin.master')
@section('content')
<h1 class="text-center">
    All Products with :category
</h1>
@foreach ($products as $product)
<h2>{{$product->name}}</h2>
<h3>{{$product->price}}</h3>
<h4>{{$product->description}}</h4>
<h5>{{$product->quantity}} || {{$product->quantity_per_unit}} unit in piese</h5>
<h6>brand:{{$product->brand->name}}</h6>
<ul>
    colors:
    @foreach ($product->colors as $color)
        <li>{{$color->name}}</li>
    @endforeach
</ul>
<ul>
    keywords:
    @foreach ($product->keywords as $keyword)
        <li>{{$keyword->name}}</li>
    @endforeach
</ul>
<ul>
    specification :
    @foreach ($product->specifications as $specification)
        <li>{{$specification->name}}: {{$specification->value}}</li>
    @endforeach
</ul>
<a href="{{route('product.show',$product->id)}}" class="btn btn-info m-5 btn-block">see more</a>
@endforeach
@endsection
