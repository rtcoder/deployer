@php
    $currentRoute = \Request::route()->getName();
@endphp
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link @if($currentRoute === 'home') active @endif">
        <i class="nav-icon fas fa-home"></i>
        <p>{{ __('deployer.Dashboard') }}</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('projects') }}" class="nav-link @if(str_starts_with($currentRoute, 'projects')) active @endif">
        <i class="nav-icon fas fa-users"></i>
        <p>{{ __('deployer.Projects') }}</p>
    </a>
</li>
