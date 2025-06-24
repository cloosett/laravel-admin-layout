<?php

return [
    'menu_items' => [
        [
            'title' => 'Dashboard',
            'route' => 'dashboard.index',
            'icon' => 'bi-speedometer2',
            'active_pattern' => 'dashboard*',
            'permission' => null,
        ],
        [
            'title' => 'Users',
            'route' => 'users.index',
            'icon' => 'bi-people',
            'active_pattern' => 'users*',
            'permission' => 'manage_users',
        ],
    ],
]; 