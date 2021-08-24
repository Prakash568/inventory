@extends('includes.app')
<div class="page-header">
    <h1>Categories</h1>
</div>

<div class="container">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Quantity</th>
                <th>Products</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sale as $sale)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$sale->customer->name}}</td>
                <td>{{$sale->customer_id}}</td>
                <td>{{$sale->quantity}}</td>
                <td>{{$sale->product->name}}</td>
                <td>{{$sale->amount}}</td>

                <td>
                    <form action="{{route('sale.destroy', $sale->id)}}" method="post">
                        @csrf @method('delete')
                    <a href="{{route('sale.edit',$sale->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>
                     <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
