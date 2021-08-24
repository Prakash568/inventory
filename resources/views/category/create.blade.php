@extends('includes.app')
<div class="page-header">
    <h1>Add Category</h1>
</div>

<div>
    <form action="{{route('category.store')}}" method="post">
        @csrf
    <div class="form-group">
        <label> Category Name</label>
        <input type="text" name="name" class="form-control"/>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
