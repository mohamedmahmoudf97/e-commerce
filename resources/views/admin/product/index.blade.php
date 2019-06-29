@extends('admin.master')
@section('content')
<h1 class="text-center my-2">
    All Products with :category
</h1>
<a href="{{route('product.create')}}" class="btn btn-outline-dark float-right"> add new product</a>
<div class="clearfix"></div>
<div class="row">
@foreach ($products as $product)
    <div class="col-6 my-3">
        <div class="p-item">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active h-100">
                        <img src="http://www.cyberscriptsolutions.com/wp-content/uploads/2017/10/default_product_icon.png" class="d-block img-fluid w-100"  style="height:350px" alt="...">
                    </div>
@foreach ($product->images as $image)
                    <div class="carousel-item ">
                        <img src="/images/{{$image->path}}" class="d-block img-fluid w-100"   style="height:350px" alt="...">
                    </div>
@endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <h2 class="text-left">
                {{$product->name}}
            </h2>
            <p class="text-left">
                {{$product->description}}
            </p>
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
            <a href="{{route('product.show',$product->id)}}" class="btn btn-success ">view all </a>
            <a href="{{route('product.edit',$product->id)}}" class="btn btn-info ">edit  </a>
            {!! Form::open(['method'=>'DELETE', 'action'=> ['productController@destroy' , $product->id], 'files'=>true]) !!}
                    {!! Form::submit('delete', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endforeach
</div>


{{-- <h3>{{$product->price}}</h3> --}}

{{-- <h5>{{$product->quantity}} || {{$product->quantity_per_unit}} unit in piese</h5> --}}
{{-- <h6>brand:{{$product->brand->name}}</h6> --}}

@endsection
@section('script')
<script>
$(document).ready(function(){
    $('.carousel').carousel({
    interval: 1000
  });
});
</script>
@endsection
