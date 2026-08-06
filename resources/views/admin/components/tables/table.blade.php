<div class="card-custom">
    @if(isset($header))
    <div class="card-header">
        <i class="fas fa-table me-2 text-primary"></i> {{ $header }}
    </div>
    @endif
    <div class="card-body p-0">
        <table class="table table-custom w-100">
            <thead>
                <tr>
                    {{ $headers }}
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>