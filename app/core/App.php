<?php

class App {
    protected $controller = 'movie';  // default controller
    protected $method = 'index';      // default method
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // If URL includes a valid controller file
        if (isset($url[1]) && file_exists('app/controllers/' . $url[1] . '.php')) {
            $this->controller = $url[1];
            unset($url[1]);
        }

        // Load controller file and create instance
        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // Set method if exists in controller
        if (isset($url[2]) && method_exists($this->controller, $url[2])) {
            $this->method = $url[2];
            unset($url[2]);
        }

        // Collect any remaining URL parts as parameters
        $this->params = $url ? array_values($url) : [];

        // Run the controller's method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        $url = "{$_SERVER['REQUEST_URI']}";
        $url = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
        unset($url[0]); // remove blank first element
        return $url;
    }
}
