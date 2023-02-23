<?php

use MyApp\core\Controller;
use MyApp\config\Constants as Config;

class AddProduct extends Controller
{
    // the method being executed if http://ravihidayat.herokuapp.com/add-product url is being requested.

    public function index()
    {
        // Displays the view, starting from the body, followed by the footer.
        $this->view('product/addProduct');
        $this->view('layouts/footer');
    }
}
