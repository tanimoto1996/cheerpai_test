<?php

use Illuminate\Support\Str;

if (!function_exists('detect_role')) {
    function detect_role(): ?string
    {
        $current_uri = request()->path();
        $roles = ['admin'];

        foreach ($roles as $role) {
            if (Str::startsWith($current_uri, $role)) {
                return $role;
            }
        }
        return null;
    }
}
