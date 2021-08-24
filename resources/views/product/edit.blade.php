@extends('includes.app')
<div class="page-header">
    <h1>Edit Product</h1>
</div>

<div class ="container">
    <form action="{{route('product.update',$category->id)}}" method="post">
        @csrf @method('put')
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($cat as $cat)

                <h1>{{$cat->id}}</h1>  {{$category->category_id}}
                <option value="{{$cat->id}}" {{$category->category_id == $cat->id?' Selected': ''}}>{{$cat->name}}</option>
                @endforeach

            </select>
        </div>
    <div class="form-group">
        <label> Product Name</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}"/>
    </div>
    <div class="form-group">
        <label> Product Code</label>
        <input type="text" name="product_code" class="form-control" value="{{$category->name}}"/>
    </div>
    <div class="form-group">
        <label> Quantity</label>
        <input type="text" name="quantity" class="form-control" value="{{$category->quantity}}"/>
    </div>
    <div class="form-check">
        <label> Status</label>
        <input type="checkbox" name="status" class="form-check-control" @if($category->status) checked @endif />
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
