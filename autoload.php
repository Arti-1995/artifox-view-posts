<?php

if ( ! defined('ABSPATH')) {
    exit;
}

\spl_autoload_register( function ( $class ) {
    if ( stripos($class, 'artifox\ViewPosts') !== 0 ) return;

    $classFile = str_replace('\\', '/', substr($class, strlen('artifox\ViewPosts') + 1) . '.php');

    include_once __DIR__ . '\\' . $classFile;
});