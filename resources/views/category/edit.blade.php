@extends('includes.app')
<div class="page-header">
    <h1>Edit Category</h1>
</div>

<div>
    <form action="{{route('category.update',$category->id)}}" method="post">
        @csrf @method('put')
    <div class="form-group">
        <label> Category Name</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}"/>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
