@extends('includes.app')
<div class="page-header">
    <h1>Add Customer</h1>
</div>

<div class="container">
    <form action="{{route('customer.store')}}" method="post">
        @csrf
    <div class="form-group">
        <label> Customer Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}"/>
    </div>
    <div class="form-group">
        <label> Contact No</label>
        <input type="text" name="contact_no" class="form-control" value="{{old('name')}}"/>
    </div>
    <div class="form-group">
        <label> Address</label>
        <input type="text" name="address" class="form-control" value="{{old('name')}}"/>
    </div>


    <button class="btn btn-primary" type="submit">Save</button>
    </form>
</div>
