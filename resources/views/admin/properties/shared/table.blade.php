<!-- <table class="table table-hover align-middle mb-0">

    <thead class="table-light">
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Ville</th>
            <th>Prix / jour</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>

        @forelse($properties as $property)
        <tr>

            {{-- IMAGE --}}
            <td>
                @if($property->main_image)
                <img src="{{ asset('storage/'.$property->main_image) }}" width="60" class="rounded">
                @endif
            </td>

            {{-- TITLE --}}
            <td>{{ $property->title }}</td>

            {{-- CITY --}}
            <td>{{ $property->city }}</td>

            {{-- PRICE --}}
            <td>
                <span class="badge bg-success">
                    {{ $property->price_per_day }} MAD
                </span>
            </td>

            {{-- TYPE --}}
            <td>
                <span class="badge bg-dark">
                    {{ ucfirst($property->type) }}
                </span>
            </td>

            {{-- ACTIONS --}}
            <td class="d-flex gap-2">

                <a href="{{ route('admin.properties.show', $property) }}" class="btn btn-sm btn-info">
                    View
                </a>

                <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-sm btn-warning">
                    Edit
                </a>

                <form action="{{ route('admin.properties.destroy', $property) }}" method="POST"
                    onsubmit="return confirm('Delete this property?')">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger">
                        Delete
                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="6" class="text-center py-4">
                No properties found
            </td>
        </tr>

        @endforelse

    </tbody>

</table> -->