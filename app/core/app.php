<?php

namespace App\Core;

use App\Controller\Home;

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        var_dump($url);

        if ($url && file_exists('../app/controller/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controller/' . $this->controller . '.php';
        var_dump($this->controller);
        $this->controller = new $this->controller;

        if (isset($url[1])) {

            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        unset($url);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            $parsedUrl =  explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            var_dump($parsedUrl);
            return $parsedUrl;
        }
    }
}
