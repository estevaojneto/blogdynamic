<?php

require __DIR__ . '/vendor/autoload.php';

new \Theme\SiteLoader();
\Theme\PostLoader::setHooks();