<?php

namespace MyApp\core;

// This class instantiates the whole app.
class App
{
    // Below are the default values when the root or product
    // list page is being requested.
    // $controller represents the respective controller filename.
    private $controller = 'Home';
    private $method = 'index';

    public function __construct()
    {
        $url = $this->parseUrl();

        // Getting the right controller by checking whether the
        // given path has a controller made for it.
        if (file_exists("app/controllers/$url[0].php")) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        // Initializing a controller instance.
        // If '/' or '' path is being requested, then
        // it should be a Home controller, the default value.
        require("app/controllers/$this->controller.php");
        $this->controller = new $this->controller;

        // Getting the right method.
        if ($url[1] ?? false) {
            // check whether the current controller object or class has
            // the method.
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // calls the method desired from the current controller object.
        call_user_func([$this->controller, $this->method]);
    }

    public function parseUrl()
    {
        if ($_GET['url'] ?? false) {
            // Filters for special characters.
            $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
            $url = explode('/', str_replace('-', '', ucwords($url, '-')));
            return $url;
        }
    }
}
