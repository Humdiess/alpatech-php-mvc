<!-- 

class App {
    protected $controller = 'AuthorController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        if ($url && file_exists('../app/controller/' . $url[0] . 'Controller.php')) {
            $this->controller = $url[0] . 'Controller';
            unset($url[0]);
        }

        require_once '../app/controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if ($url && isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
} -->

<?php

class App
{
    protected $controller = 'AuthorController'; // default controller
    protected $method = 'index'; // default method
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // Check if the controller exists
        if (isset($url[0]) && file_exists('../app/controller/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = ucfirst($url[0]) . 'Controller';
            unset($url[0]);
        }

        require_once '../app/controller/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Check if the method exists
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        // Get parameters
        $this->params = $url ? array_values($url) : [];

        // Call the controller method with parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}

