@extends('admin.master')
@section('content')
<h1 class="text-center">
    categories with subcategories
<table class="table table-striped table-dark font-weight-light">
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
        <td>{{$category->name}}</td>
        <td>no image</td>
        <td>@mdo</td>
      </tr>
@endforeach
    </tbody>
  </table>
@endsection
