@extends('admin.admin')

@section('title', 'Ajouter un bien')

@section('content')

<h1>Ajouter un bien</h1>

<form action="{{ route('admin.properties.store') }}" method="POST">
    @include('admin.properties.shared.form')
</form>

@endsection