<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'staff' => [
            'driver' => 'session',
            'provider' => 'staff',
        ],
        'corporation' => [
            'driver' => 'session',
            'provider' => 'corporations',
        ],
        'bussiness-operator' => [
            'driver' => 'session',
            'provider' => 'bussiness-operators',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'staff' => [
            'driver' => 'eloquent',
            'model' => App\Models\Staff::class,
        ],

        'corporations' => [
            'driver' => 'eloquent',
            'model' => App\Models\Corporation::class,
        ],

        'bussiness-operators' => [
            'driver' => 'eloquent',
            'model' => App\Models\BussinessOperator::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'staff' => [
            'provider' => 'staffs',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'corporations' => [
            'provider' => 'corporations',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'bussiness-operators' => [
            'provider' => 'bussiness-operators',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
