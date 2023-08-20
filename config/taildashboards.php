<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Profile url
    |--------------------------------------------------------------------------
    |
    | If you won't use the profile menu, you can set this to empty string or false
    */
    'profile_url' => '/profile',

    /*
    |--------------------------------------------------------------------------
    | Log out url
    |--------------------------------------------------------------------------
    |
    | This url will handle the logout form process
    |
    */
    'logout_url' => '/logout',

    /*
    |--------------------------------------------------------------------------
    | Your sidebar menu
    |--------------------------------------------------------------------------
    |
    | You must use route names for the route and active route indexes
    |
    | You can find icons here https://feathericons.com/
    */
    'menu' => [
        [
            'label' => 'Dashboard',
            'route' => 'dashboard',
            'active_route' => 'dashboard',
            'icon' => 'home',
        ],
        [
            'label' => 'Dashboard',
            'route' => 'view-1',
            'active_route' => 'view-1',
            'icon' => 'circle',
        ],
        [
            'label' => 'Dashboard',
            'route' => 'view-2',
            'active_route' => 'view-2',
            'icon' => 'home',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Secondary sidebar menu
    |--------------------------------------------------------------------------
    |
    | Only available for template tailapp
    |
    */
    'second-menu' => [
        [
            'label' => 'Dashboard',
            'route' => 'dashboard',
            'active_route' => 'dashboard',
            'icon' => 'settings',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Scripts to include in the footer of the page
    |--------------------------------------------------------------------------
    | If you have another package that includes feathericons, you can disable this
    */
    'include_feathericons' => true,

    'footer' => 'Powered by Laravel'
];
