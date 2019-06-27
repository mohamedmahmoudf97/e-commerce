@extends('admin.master')
@section('content')
<h1 class="text-center">
    categories with subcategories
<table class="table table-striped font-weight-light" style="font-size:32px;">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">image</th>
        <th scope="col">date created</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($category as $category)

      <tr>
        <th scope="row">{{$category->id}}</th>
        <td>    <a href="{{route('category.show',$category->id)}}" class="text-decoration-none">
                {{$category->name}}    </a>
            </td>
        <td>no image</td>
        <td>{{$category->created_at}}</td>
      </tr>

@endforeach
    </tbody>
  </table>
@endsection
