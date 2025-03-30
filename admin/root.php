<?php

$connect = mysqli_connect('127.0.0.1', 'root', '', 'db_phppure-master', 3307);
if (!$connect) {
    // Try with alternative names if the default one failed
    $connect = mysqli_connect('localhost', 'root', '', 'db_phppure_master', 3307);
    
    if (!$connect) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
}

mysqli_set_charset($connect, 'UTF8');

if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ') {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
}