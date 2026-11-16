@extends('layouts.app')

@section('content')
<div class="container">
    <p>Имя: {{ auth()->user()->name }}</p>
    <p>Email: {{ auth()->user()->email }}</p>
    <p>ID: {{ auth()->id() }}</p>
</div>
@endsection
