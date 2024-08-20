<?php

namespace WEB42\src\Routing;

class Router {

    private array $routes = [];

    public function __construct() {
        $this->routes = [
            'POST' => [],
            'PUT' => [],
            'DELETE' => []
        ];
    }

    public function post(string $path, array $action) {
        $this->routes['POST'][$path] = $action;
    }

    public function put(string $path, array $action) {
        $this->routes['PUT'][$path] = $action;
    }

    public function delete(string $path, array $action) {
        $this->routes['DELETE'][$path] = $action;
    }

    public function dispatch(string $method, string $path) {
        if (isset($this->routes[$method][$path])) {
            $action = $this->routes[$method][$path];
            [$controller, $method] = $action;
            if (method_exists($controller, $method)) {
                return call_user_func([$controller, $method]);
            } else {
                return 'Method not found';
            }
        } else {
            return '404 Not Found';
        }
    }
}