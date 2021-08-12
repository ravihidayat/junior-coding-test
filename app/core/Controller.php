<?php

namespace MyApp\core;

class Controller
{
    public function view($view)
    {
        require("../app/views/$view.php");
    }
}
