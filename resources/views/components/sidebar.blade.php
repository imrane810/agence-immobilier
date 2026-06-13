@if(auth()->user()->isAdmin())

<a href="{{ route('properties.index') }}">
    Properties
</a>

<a href="{{ route('reservations.index') }}">
    Reservations
</a>

@endif

<div class="bg-dark text-white vh-100 p-3">

    <h4 class="mb-4 text-center">
        Immo Admin
    </h4>

    <ul class="nav flex-column">

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                Dashbord
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('admin.properties.index') }}" class="nav-link text-white">
                Properties
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                Reservations
            </a>
        </li>

        <li class="nav-item mb-2">
            <a href="#" class="nav-link text-white">
                Paiment
            </a>
        </li>

    </ul>

</div>