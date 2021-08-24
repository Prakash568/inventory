@extends('includes.app')
<div class="page-header">
    <h1>Add Product</h1>
</div>

<div class="container">
    <form action="{{route('product.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="" selected disabled>Select Category</option>
                @foreach ($cat as $category )
                 <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    <div class="form-group">
        <label> Product Name</label>
        <input type="text" name="name" class="form-control"/>
    </div>
    <div class="form-group">
        <label> Product Code</label>
        <input type="text" name="product_code" class="form-control"/>
    </div>
    <div class="form-group">
        <label> Quantity</label>
        <input type="text" name="quantity" class="form-control"/>
    </div>
    <div class="form-check">
        <label> Quantity</label>
        <input type="checkbox" name="status" class="form-check-control"/>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
