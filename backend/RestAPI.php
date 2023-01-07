<?php declare(strict_types=1);

namespace Theme;

use Theme\Rest\RestControllerCollection;

final class RestAPI
{
    protected static $instance;
    private function __construct() { }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init(RestControllerCollection $endpoints)
    {
        foreach ($endpoints as $endpoint)
        {
            $endpoint->registerRoutes();
        }
    }
}