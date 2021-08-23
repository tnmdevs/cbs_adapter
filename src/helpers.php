<?php

use Carbon\Carbon;

if (!function_exists('package_path')) {
    function package_path(?string $path = ''): string
    {
        return base_path('vendor/tnmdev/cbs/src/' . $path);
    }
}

if (!function_exists('trans_id')) {
    function trans_id(): string
    {
        return substr(sprintf("%s%s%s",
            strtoupper(substr(config('app.name'), 0, 3)),
            time(),
            strtoupper(strrev(uniqid()))), 0, 20);
    }
}

if (!function_exists('generate_key')) {
    function generate_key(int $length = 10, bool $numeric = false): string
    {
        $characters = $numeric ? "0123456789" : '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('cbs_time')) {
    function cbs_time(Carbon $carbon): string
    {
        return $carbon->format('YmdHis');
    }
}
