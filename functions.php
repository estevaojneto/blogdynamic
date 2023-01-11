<?php

spl_autoload_register(function ($class) {
    $prefix = 'Theme\\';
    $base_dir = __DIR__ . '/backend/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});


new \Theme\SiteLoader();
\Theme\PostLoader::setHooks();
