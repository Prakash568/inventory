@extends('includes.app')
<div class="page-header">
    <h1>Products</h1>
</div>

<div class="container">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $category)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->product_code}}</td>
                <td>{{$category->slug}}</td>
                <td>@if($category->status) <span class="label label-success">Active</span> @else <span class="label label-danger">InActive</span> @endif</td>
                <td>{{$category->quantity}}</td>
                <td>{{$category->category->name}}</td>
                <td>
                    <form action="{{route('product.destroy', $category->id)}}" method="post">
                        @csrf @method('delete')
                    <a href="{{route('product.individual',$category->id)}}" class="btn btn-primary"><span class="	glyphicon glyphicon-th-large"></span></a>
                    <a href="{{route('product.edit',$category->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                     <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
