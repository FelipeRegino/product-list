@extends('_layouts.app')

<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
    @csrf
    @include('product._form')
</form>
