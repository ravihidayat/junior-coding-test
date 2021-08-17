<?php

use MyApp\core\Controller;
use MyApp\config\Constants;

class AddProduct extends Controller
{
    public function index()
    {
        // if($_POST['submit'] ?? false) {
        //     INSERT xx VALUES ($_POST['attribute['size'])
        //     INSERT xx
        //     header Home
        // }
        $this->view('product/addProduct');
        $this->view('layouts/footer');
    }
}
