<?php
function setActive(array $routes)
{
    foreach ($routes as $route) {
        if (request()->is($route) || request()->is($route . '.*')) {
            return 'active';
        }
    }
    return ''; // Return empty string if no match
}
?>
