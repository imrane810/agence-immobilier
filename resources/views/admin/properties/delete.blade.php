@extends('admin.admin')

@section('title', 'Supprimer un Bien')
@section('content')

<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $property->id }}">
    Supprimer
</button>

<div class="modal fade" id="delete{{ $property->id }}">
    <div class="modal-dialog">
        <div class="modal-content p-3">

            <p>Confirmer suppression ?</p>

            <form action="{{ route('admin.properties.destroy', $property) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Oui supprimer</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </form>

        </div>
    </div>
</div>

@endsection