@php
$config = [
'new' => ['class' => 'FEE2E2', 'color' => '991B1B', 'icon' => 'fa-circle'],
'read' => ['class' => 'FEF3C7', 'color' => '92400E', 'icon' => 'fa-check-circle'],
'answered' => ['class' => 'D1FAE5', 'color' => '065F46', 'icon' => 'fa-reply'],
'villa' => ['class' => 'D1FAE5', 'color' => '065F46', 'icon' => 'fa-home'],
'apartment' => ['class' => 'E5E7EB', 'color' => '374151', 'icon' => 'fa-building'],
'house' => ['class' => 'FEF3C7', 'color' => '92400E', 'icon' => 'fa-house'],
'studio' => ['class' => 'DBEAFE', 'color' => '1E40AF', 'icon' => 'fa-cube'],
'admin' => ['class' => 'FEE2E2', 'color' => '991B1B', 'icon' => 'fa-shield-alt'],
'customer' => ['class' => 'D1FAE5', 'color' => '065F46', 'icon' => 'fa-user'],
];
$status = $config[$type] ?? ['class' => 'E5E7EB', 'color' => '374151', 'icon' => 'fa-circle'];
@endphp

<span class="badge-status" style="background: #{{ $status['class'] }}; color: #{{ $status['color'] }};">
    @if(isset($status['icon']))
    <i class="fas {{ $status['icon'] }} me-1" style="font-size: 0.5rem;"></i>
    @endif
    {{ $label }}
</span>