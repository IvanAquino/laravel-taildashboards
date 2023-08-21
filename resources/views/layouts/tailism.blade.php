<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&amp;display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div x-data="{ mobileSidebarOpen: false, desktopSidebarOpen: true }">
        <!-- Page Container -->
        <div id="page-container"
            class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-neutral-200 transition-all duration-300 ease-out lg:pl-64"
            x-bind:class="{ 'lg:pl-64': desktopSidebarOpen }">
            <!-- Page Sidebar -->
            <nav id="page-sidebar"
                class="fixed bottom-0 left-0 top-0 z-50 flex h-full w-full flex-col border-neutral-600 bg-white transition-transform duration-300 ease-out lg:w-64 lg:border-r-2"
                x-bind:class="{
                    '-translate-x-full': !mobileSidebarOpen,
                    'translate-x-0': mobileSidebarOpen,
                    'lg:-translate-x-full': !desktopSidebarOpen,
                    'lg:translate-x-0': desktopSidebarOpen,
                }"
                aria-label="Main Sidebar Navigation">
                <!-- Sidebar Header -->
                <div
                    class="flex h-16 w-full flex-none items-center justify-between border-b border-neutral-600 pl-5 lg:pr-4">
                    <!-- Brand -->
                    <a href="javascript:void(0)"
                        class="group inline-flex items-center space-x-2 font-semibold text-neutral-800 hover:text-neutral-600">
                        <svg class="hi-outline hi-command-line inline-block h-6 w-6 text-amber-600"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <span>{{ config('app.name') }}</span>
                    </a>
                    <!-- END Brand -->

                    <!-- Extra Actions -->
                    <div class="flex items-center">
                        <!-- Close Sidebar on Mobile -->
                        <button type="button"
                            class="ml-3 inline-flex items-center justify-center p-4 leading-5 text-neutral-800 hover:text-amber-600 focus:outline-none active:text-amber-800 lg:hidden"
                            x-on:click="mobileSidebarOpen = false">
                            <x-laravel-taildashboards::icon icon="x" class="text-slate-700 w-5 h-5" />
                        </button>
                        <!-- END Close Sidebar on Mobile -->
                    </div>
                    <!-- END Extra Actions -->
                </div>
                <!-- END Sidebar Header -->

                <!-- Sidebar Navigation -->
                <div class="overflow-y-auto">
                    <div class="w-full space-y-6 py-4">
                        <nav class="space-y-1">
                            @foreach (config('taildashboards.menu') as $menuItem)
                                <x-laravel-taildashboards::tailism.sidebar-link :menuItem="$menuItem" />
                            @endforeach

                            @auth
                                <form method="POST" action="{{ config('taildashboards.logout_url') }}">
                                    @csrf
                                    <button type="submit"
                                        class="group flex items-center space-x-2 border-y border-transparent px-5 py-1 font-medium hover:border-neutral-600 hover:bg-amber-100 active:bg-amber-50 w-full">
                                        <span
                                            class="flex flex-none items-center text-neutral-600 group-hover:-rotate-12 group-hover:text-amber-700 group-active:rotate-0">
                                            <x-laravel-taildashboards::icon icon="log-out" class="text-slate-500 w-6 h-6" />
                                        </span>
                                        <span class="grow py-2 text-left">{{ __('Log out') }}</span>
                                    </button>
                                </form>
                            @endauth
                        </nav>
                    </div>
                </div>
                <!-- END Sidebar Navigation -->
            </nav>
            <!-- END Page Sidebar -->

            <!-- Page Header -->
            <header id="page-header"
                class="fixed left-0 right-0 top-0 z-30 flex h-16 flex-none items-center border-b border-neutral-600 bg-white transition-all duration-300 ease-out lg:pl-64"
                x-bind:class="{ 'lg:pl-64': desktopSidebarOpen }">
                <div class="container mx-auto flex w-full justify-between px-0 lg:max-w-7xl lg:px-5">
                    <!-- Left Section -->
                    <div class="flex flex-none items-center">
                        <!-- Brand on Mobile -->
                        <div class="lg:hidden">
                            <a href="javascript:void(0)"
                                class="inline-flex items-center justify-center p-4 leading-5 text-neutral-800 hover:text-amber-600 focus:outline-none active:text-amber-800">
                                <svg class="hi-outline hi-command-line inline-block h-6 w-6 text-amber-600"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </a>
                        </div>
                        <!-- END Brand on Mobile -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Main Section -->
                    <div class="flex grow items-center">
                    </div>
                    <!-- END Main Section -->

                    <!-- Right Section -->
                    <div class="flex flex-none items-center space-x-2">
                        <!-- Toggle Sidebar on Mobile -->
                        <div class="lg:hidden">
                            <button type="button"
                                class="inline-flex items-center justify-center p-4 leading-5 text-neutral-800 hover:text-amber-600 focus:outline-none active:text-amber-800"
                                x-on:click="mobileSidebarOpen = true">
                                <x-laravel-taildashboards::icon icon="menu" class="text-slate-700 w-5 h-5" />
                            </button>
                        </div>
                        <!-- END Toggle Sidebar on Mobile -->
                    </div>
                    <!-- END Right Section -->
                </div>
            </header>
            <!-- END Page Header -->

            <!-- Page Content -->
            <main id="page-content" class="flex max-w-full flex-auto flex-col bg-white/50 pt-16">
                <div class="container mx-auto w-full p-4 lg:p-8 xl:max-w-7xl">
                    @yield('content')
                </div>
            </main>
            <!-- END Page Content -->

            <!-- Page Footer -->
            <footer id="page-footer" class="flex grow-0 items-center border-t border-neutral-600 bg-white">
                <div
                    class="container mx-auto flex flex-col space-y-2 px-4 py-6 text-center text-sm font-medium text-neutral-600 md:flex-row md:justify-between md:space-y-0 md:text-left lg:px-8 xl:max-w-7xl">
                    <div>{{ config('taildashboards.footer') }}</div>
                    <div class="inline-flex items-center justify-center">
                        <span>Crafted with</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true" class="mx-1 h-4 w-4 text-red-600">
                            <path
                                d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z">
                            </path>
                        </svg>
                        <span>by
                            <a class="font-medium text-amber-600 transition hover:text-amber-700"
                                href="https://pixelcave.com" target="_blank">pixelcave</a></span>
                    </div>
                </div>
            </footer>
            <!-- END Page Footer -->
        </div>
        <!-- END Page Container -->
    </div>

    @if (config('taildashboards.include_feathericons'))
        <script src="//unpkg.com/feather-icons"></script>
        <script>
            feather.replace();
        </script>
    @endif
</body>

</html>
