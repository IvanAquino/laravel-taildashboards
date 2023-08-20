@props(['menuItem' => []])

@php
    $activeRoute = $menuItem['active_route'] ?? $menuItem['route'];
    $class = request()->routeIs($activeRoute) ? 'flex items-center space-x-3 rounded-lg bg-white px-4 py-2.5 font-semibold text-slate-600 shadow-sm shadow-slate-300/50' : 'flex items-center space-x-3 rounded-lg px-4 py-2.5 font-semibold text-slate-600 hover:bg-white hover:shadow-sm hover:shadow-slate-300/50 active:bg-white/75 active:text-slate-800 active:shadow-slate-300/10';
@endphp

<a href="{{ route($menuItem['route']) }}" {{ $attributes->merge(['class' => $class]) }}>
    @isset($menuItem['icon'])
        <x-laravel-taildashboards::icon :icon="$menuItem['icon']" class="text-slate-500 w-4 h-4" />
    @endisset
    <span>{{ $menuItem['label'] ?? 'No label in item' }}</span>
</a>
