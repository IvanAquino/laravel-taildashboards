@props(['menuItem' => []])

@php
    $activeRoute = $menuItem['active_route'] ?? $menuItem['route'];
    $class = request()->routeIs($activeRoute) ? 'group flex items-center space-x-2 border-y border-neutral-600 bg-amber-100 px-5 py-1 font-medium' : 'group flex items-center space-x-2 border-y border-transparent px-5 py-1 font-medium hover:border-neutral-600 hover:bg-amber-100 active:bg-amber-50';
@endphp

<a href="{{ route($menuItem['route']) }}" {{ $attributes->merge(['class' => $class]) }}>
    @isset($menuItem['icon'])
        <span class="flex flex-none items-center text-neutral-600 group-hover:-rotate-12 group-hover:text-amber-700 group-active:rotate-0">
            <x-laravel-taildashboards::icon :icon="$menuItem['icon']" class="text-slate-500 w-6 h-6" />
        </span>
    @endisset
    <span class="grow py-2">{{ $menuItem['label'] ?? 'No label in item' }}</span>
</a>
