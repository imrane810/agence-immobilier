<div class="d-flex justify-content-end gap-2">

    <a href="{{ $editUrl }}" class="btn btn-sm btn-warning">
        Edit
    </a>

    <form action="{{ $deleteUrl }}" method="POST" onsubmit="return confirm('Supprimer ce bien ?')">
        @csrf
        @method('DELETE')

        <button class="btn btn-sm btn-danger">
            Delete
        </button>
    </form>

</div>