@extends('admin.admin')

@section('title', 'Modifier un bien')
@section('content')

<h1>Modifier un bien</h1>

<form action="{{ route('admin.properties.update', $property) }}" method="POST">
    @include('admin.properties.shared.form')
</form>

@endsection