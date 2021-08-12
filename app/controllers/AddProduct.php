<?php

use MyApp\core\Controller;

class AddProduct extends Controller
{
    public function index()
    {
        $this->view('product/addProduct');
        $this->view('layouts/footer');
    }
}
