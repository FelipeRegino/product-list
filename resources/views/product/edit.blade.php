@extends('_layouts.app')

<form method="POST" action="{{ route('product.update', $product) }}" enctype="multipart/form-data">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    @include('product._form')
</form>
