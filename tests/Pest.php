<?php

if (!function_exists('dump')) {
    function dump()
    {
        array_map(fn ($item) => print_r($item), func_get_args());
    }
}

if (!function_exists('dd')) {
    function dd()
    {
        dump(...func_get_args());
        
        die();
    }
}