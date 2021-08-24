@extends('includes.app')
<div class="page-header">
    <h1>Categories</h1>
</div>

<div>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $category)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <form action="{{route('category.destroy', $category->id)}}" method="post">
                        @csrf @method('delete')
                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                     <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
