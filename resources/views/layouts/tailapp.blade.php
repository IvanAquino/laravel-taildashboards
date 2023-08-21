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
    <!-- Page Container -->
    <div id="page-container" x-data="{ mobileSidebarOpen: false }"
        class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-white lg:pl-64">
        <!-- Page Sidebar -->
        <nav id="page-sidebar"
            class="fixed top-0 left-0 bottom-0 z-50 flex h-full w-80 transform flex-col overflow-auto bg-slate-100 transition-transform duration-500 ease-out lg:w-64 lg:translate-x-0"
            x-bind:class="{
                '-translate-x-full': !mobileSidebarOpen,
                'translate-x-0': mobileSidebarOpen,
            }"
            aria-label="Main Sidebar Navigation" x-cloak>
            <!-- Sidebar Header -->
            <div class="flex h-20 w-full flex-none items-center justify-between px-8">
                <!-- Brand -->
                <a href="javascript:void(0)"
                    class="inline-flex items-center space-x-2 text-lg font-bold tracking-wide text-slate-800 transition hover:opacity-75 active:opacity-100">
                    <svg class="bi bi-window-sidebar inline-block h-4 w-4 text-blue-600"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                        <path
                            d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v2H1V3a1 1 0 0 1 1-1h12zM1 13V6h4v8H2a1 1 0 0 1-1-1zm5 1V6h9v7a1 1 0 0 1-1 1H6z" />
                    </svg>
                    <span>
                        <span class="font-medium text-blue-600">{{ config('app.name') }}</span>
                    </span>
                </a>
                <!-- END Brand -->

                <!-- Close Sidebar on Mobile -->
                <div class="lg:hidden">
                    <button type="button"
                        class="flex h-10 w-10 items-center justify-center text-slate-400 hover:text-slate-600 active:text-slate-400"
                        x-on:click="mobileSidebarOpen = false">
                        <svg class="hi-solid hi-x -mx-1 inline-block h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <!-- END Close Sidebar on Mobile -->
            </div>
            <!-- END Sidebar Header -->

            <!-- Main Navigation -->
            <div class="w-full grow space-y-3 p-4">
                @foreach (config('taildashboards.menu') as $menuItem)
                    <x-laravel-taildashboards::tailapp.sidebar-link :menuItem="$menuItem" />
                @endforeach
            </div>
            <!-- END Main Navigation -->

            <!-- Sub Navigation -->
            <div class="w-full flex-none space-y-3 p-4">
                @foreach (config('taildashboards.second-menu') as $menuItem)
                    <x-laravel-taildashboards::tailapp.sidebar-link :menuItem="$menuItem" />
                @endforeach
                @auth
                    <form method="POST" action="{{ config('taildashboards.logout_url') }}">
                        @csrf
                        <button type="submit"
                            class="flex items-center space-x-3 rounded-lg px-4 py-2.5 font-semibold text-slate-600 hover:bg-white hover:shadow-sm hover:shadow-slate-300/50 active:bg-white/75 active:text-slate-800 active:shadow-slate-300/10">
                            <x-laravel-taildashboards::icon icon="log-out" class="text-slate-500 w-4 h-4" />
                            <span>{{ __('Logout') }}</span>
                        </button>
                    </form>
                @endauth
            </div>
            <!-- END Sub Navigation -->
        </nav>
        <!-- Page Sidebar -->

        <!-- Page Header -->
        <header id="page-header"
            class="fixed top-0 right-0 left-0 z-30 flex h-20 flex-none items-center bg-white shadow-sm lg:hidden">
            <div class="container mx-auto flex justify-between px-4 lg:px-8 xl:max-w-7xl">
                <!-- Left Section -->
                <div class="flex items-center space-x-2">
                    <!-- Toggle Sidebar on Mobile -->
                    <button type="button"
                        class="inline-flex items-center justify-center space-x-2 rounded border border-slate-300 bg-white px-2 py-1.5 font-semibold leading-6 text-slate-800 shadow-sm hover:border-slate-300 hover:bg-slate-100 hover:text-slate-800 hover:shadow focus:outline-none focus:ring focus:ring-slate-500 focus:ring-opacity-25 active:border-white active:bg-white active:shadow-none"
                        x-on:click="mobileSidebarOpen = true">
                        <svg class="hi-solid hi-menu-alt-1 inline-block h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- END Toggle Sidebar on Mobile -->
                </div>
                <!-- END Left Section -->

                <!-- Middle Section -->
                <div class="flex items-center space-x-2">
                    <!-- Brand -->
                    <a href="javascript:void(0)"
                        class="inline-flex items-center space-x-2 text-lg font-bold tracking-wide text-slate-800 transition hover:opacity-75 active:opacity-100">
                        <svg class="bi bi-window-sidebar inline-block h-4 w-4 text-blue-600"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M2.5 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm1 .5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                            <path
                                d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v2H1V3a1 1 0 0 1 1-1h12zM1 13V6h4v8H2a1 1 0 0 1-1-1zm5 1V6h9v7a1 1 0 0 1-1 1H6z" />
                        </svg>
                        <span><span class="font-medium text-blue-600">{{ config('app.name') }}</span></span>
                    </a>
                    <!-- END Brand -->
                </div>
                <!-- END Middle Section -->

                <!-- Right Section -->
                <div class="flex items-center space-x-2">
                    <!-- Settings -->
                    @if (config('taildashboards.profile_url'))
                        <a href="{{ config('taildashboards.profile_url') }}"
                            class="inline-flex items-center justify-center space-x-2 rounded border border-slate-300 bg-white px-2 py-1.5 font-semibold leading-6 text-slate-800 shadow-sm hover:border-slate-300 hover:bg-slate-100 hover:text-slate-800 hover:shadow focus:outline-none focus:ring focus:ring-slate-500 focus:ring-opacity-25 active:border-white active:bg-white active:shadow-none">
                            <x-laravel-taildashboards::icon icon="user" class="text-slate-500 w-4 h-4" />
                        </a>
                    @endif
                    <!-- END Toggle Sidebar on Mobile -->
                </div>
                <!-- END Right Section -->
            </div>
        </header>
        <!-- END Page Header -->

        <!-- Page Content -->
        <main id="page-content" class="flex max-w-full flex-auto flex-col pt-20 lg:pt-0">
            <!-- Page Section -->
            <div class="container mx-auto space-y-10 px-4 py-8 lg:space-y-16 lg:px-8 lg:py-12 xl:max-w-7xl">
                @yield('content')
            </div>
            <!-- END Page Section -->
        </main>
        <!-- END Page Content -->

        <!-- Page Footer -->
        <footer id="page-footer" class="flex grow-0 items-center border-t border-slate-100">
            <div
                class="container mx-auto flex flex-col space-y-2 px-4 py-6 text-center text-sm font-medium text-slate-600 md:flex-row md:justify-between md:space-y-0 md:text-left lg:px-8 xl:max-w-7xl">
                <div>
                    {!! @config('taildashboards.footer') !!}
                </div>
                <div class="inline-flex items-center justify-center">
                    <span>Crafted with</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true" class="mx-1 h-4 w-4 text-red-600">
                        <path
                            d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z">
                        </path>
                    </svg>
                    <span>by
                        <a class="font-medium text-blue-600 transition hover:text-blue-700" href="https://pixelcave.com"
                            target="_blank">pixelcave</a></span>
                </div>
            </div>
        </footer>
        <!-- END Page Footer -->
    </div>
    <!-- END Page Container -->

    @if (config('taildashboards.include_feathericons'))
        <script src="//unpkg.com/feather-icons"></script>
        <script>
            feather.replace();
        </script>
    @endif
</body>

</html>
