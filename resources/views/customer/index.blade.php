@extends('includes.app')
<div class="page-header">
    <h1>Customers</h1>
</div>
<div class="container">
<div class="pull-right">
<a href="{{route('customer.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></a>
</div>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->contact_no}}</td>
                <td>
                    <form action="{{route('customer.destroy', $customer->id)}}" method="post">
                        @csrf @method('delete')
                    <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                     <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
