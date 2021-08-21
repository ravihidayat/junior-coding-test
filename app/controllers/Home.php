<?php

use MyApp\core\Controller;
use MyApp\config\Constants as Config;


class Home extends Controller
{

    public function index()
    {
        if ($_POST ?? false) {
            $item = $this->model($_POST['switcher']);
            $item->setSKU($_POST['sku']);
            $item->setName($_POST['name']);
            $item->setPrice($_POST['price']);
            $item->setAttribute($_POST['attribute']);

            // echo "<script>console.log($item->getSKU())</script>";
            if ($item->insertProduct() > 0 && $item->insertProductValue() > 0) {
                header("Location: " . Config::BASEURL);
            }
        }

        $this->view('home/index');
        $this->view('layouts/footer');
        // echo "Failed";
        // var_dump($_POST);
    }
}
