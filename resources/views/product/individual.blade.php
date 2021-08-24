@extends('includes.app')
<div class="container">
<h1>{{$product->name}}</h1>
<h1>{{$product->quantity}}</h1>
<a href="{{route('product.add',$product->id)}}">ADD</a>
<form action="{{route('product.sub',$product->id)}}" method="post">
    @csrf
  <input type="text" name="name1">
  <button type="submit">Subtract</button>
</form>
</div>
