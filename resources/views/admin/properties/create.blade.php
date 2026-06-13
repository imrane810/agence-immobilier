@extends('layouts.admin')

@section('title', 'Ajouter un bien')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Ajouter un bien</h1>

        <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">
            Retour
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                @include('admin.properties.shared.form', [
                'property' => new \App\Models\Property()
                ])

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        Enregistrer
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