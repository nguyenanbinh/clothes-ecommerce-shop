<?php

/** Set Sidebar item active */
if (!function_exists('formatDate')) {
    function setActive(array $route): string
    {
        if (is_array($route)) {
            foreach ($route as $r) {
                if (request()->routeIs($r)) {
                    return 'active';
                }
            }
        }

        return '';
    }
}
