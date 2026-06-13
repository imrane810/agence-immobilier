@extends('layouts.admin')

@section('title', 'Modifier un bien')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Modifier un bien</h1>

        <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">
            Retour
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.properties.update', $property) }}" method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                @include('admin.properties.shared.form', [
                'property' => $property
                ])

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        Modifier
                    </button>

                    <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary">
                        Annuler
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection