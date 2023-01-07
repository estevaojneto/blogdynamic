<?php declare(strict_types = 1);

namespace Theme\Rest;

class RestControllerCollection implements \IteratorAggregate {
    private $controllers = [];

    public function __construct($controllers = [])
    {
        $this->controllers = $controllers;
        $this->controllers = array_filter($controllers, function ($controller) {
            if ($controller instanceof RestController) {
                return $controller;
            }
        });
    }

    public function getIterator() {
        return new \ArrayIterator($this->controllers);
    }
}