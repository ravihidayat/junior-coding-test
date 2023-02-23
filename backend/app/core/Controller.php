<?php

namespace MyApp\core;

// Controllers methods are defined here.
class Controller
{
    // view() takes in the filename, thus including and displaying it.
    // It also takes in data, which by default is passing in an empty string.
    // This makes iterating through query retrieved as an object possible.
    public function view($view, $data = "")
    {
        require("app/views/$view.php");
    }

    // Requires the right model and creates a model instance.
    public function model($model)
    {
        require("app/models/$model.php");
        return new $model;
    }
}
