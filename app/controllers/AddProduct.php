<?php

use MyApp\core\Controller;
use MyApp\config\Constants as Config;

class AddProduct extends Controller
{
    public function index()
    {
        $this->view('product/addProduct');
        $this->view('layouts/footer');
    }
}
