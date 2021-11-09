@php
    $currentRoute = \Request::route()->getName();
@endphp
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link @if($currentRoute === 'home') active @endif">
        <p>{{ __('deployer.Dashboard') }}</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('projects') }}" class="nav-link @if(str_starts_with($currentRoute, 'projects')) active @endif">
        <p>{{ __('deployer.Projects') }}</p>
    </a>
</li>
