<?php

use MyApp\core\Controller;
use MyApp\config\Constants as Config;


class Home extends Controller
{
    // the method being executed if http://ravihidayat.herokuapp.com/ url is being requested.
    public function index()
    {
        // checks whether it is a POST request or not.
        // If it is, then it shall insert the input to the respective object
        // as its properties.

        if ($_POST['switcher'] ?? false) {
            $item = $this->model($_POST['switcher']);
            $item->setSKU($_POST['sku']);
            $item->setName($_POST['name']);
            $item->setPrice($_POST['price']);
            $item->setAttribute($_POST['attribute']);

            // If insert operation is successful, meaning that new rows are added,
            // then it shall reload the page.
            if ($item->insertProduct() > 0 && $item->insertProductValue() > 0) {
                header("Location: " . Config::BASEURL);
            }
        }
        // As for this, the deleted to be SKUs are passed through $_POST superglobal.
        // Then it calls deleteProducts() method from Product class.
        // As for this case, Book class can represent the whole product. This is similar to how 
        // getAllProducts() is being handled.
        elseif ($_POST['sku'] ?? false) {
            $sku = $_POST['sku'];

            if ($this->model("Book")->deleteProducts($sku)) {
                header("Location: " . Config::BASEURL);
            }
        }

        // If there is no POST request, or the previous request has been handled, then
        // the page is displayed.
        // Book model object is being passed, which represents all products, since they all
        // shares the same method that queries data from the database.

        $this->view('home/index', $this->model("Book")->getAllProducts());
        $this->view('layouts/footer');
    }
}
