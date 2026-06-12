@extends('layouts.admin')

@section('content')
<h1>Modifier le bien</h1>

<form action="{{ route('admin.properties.update', $property) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @include('admin.properties.shared.form', ['property' => $property])

    <button class="btn btn-success mt-3">Modifier</button>
</form>
@endsection