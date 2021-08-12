<?php

use MyApp\core\Controller;

class Home extends Controller
{
    public function index()
    {
        $this->view('home/index');
        $this->view('layouts/footer');
    }
}
