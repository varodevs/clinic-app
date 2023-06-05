@extends('layout')

@section('content')
<form action="/checkout" method="POST">
    @csrf
    <button type="submit">Checkout</button>
</form>
@endsection