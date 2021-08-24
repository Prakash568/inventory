@extends('includes.app')
<div class="page-header">
    <h1>Edit Customer</h1>
</div>

<div class="container">
    <form action="{{route('customer.update', $customer->id)}}" method="post">
        @csrf @method('put')
    <div class="form-group">
        <label> Customer Name</label>
        <input type="text" name="name" class="form-control" value="{{$customer->name}}"/>
    </div>
    <div class="form-group">
        <label> Address</label>
        <input type="text" name="address" class="form-control" value="{{$customer->name}}"/>
    </div>
    <div class="form-group">
        <label> Contact No</label>
        <input type="text" name="contact_no" class="form-control" value="{{$customer->name}}"/>
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
