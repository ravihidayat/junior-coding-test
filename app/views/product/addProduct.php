<?php

use MyApp\config\Constants as Config;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= Config::ASSETS ?>/js/script.js"></script>
    <title>Product Add</title>
</head>

<body>
    <section id="navMenu">
        <div class="container mt-4">
            <div class="container d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    <h2>Product Add</h2>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-5" name="submit">Save</button>
                    <button type="button" id="delete-product-btn" class="btn btn-danger" onclick="window.location.href='<?= Config::POP ?>'">Cancel</button>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <section id="body">
        <div class="container">
            <form action="" method="post" id="product_form">
                <label class="col-md-1 mt-4" for="sku">SKU</label>
                <input type="text" name="sku" id="sku"><br><br>

                <label class="col-md-1" for="name">Name</label>
                <input type="text" name="name" id="name"><br><br>

                <label class="col-md-1" for="price">Price ($)</label>
                <input type="number" name="price" id="price"><br><br><br>

                <label class="col-md-2" for="switcher">Type Switcher</label>
                <select name="switcher" id="productType">
                    <option value="" id="None">Type Switcher</option>
                    <option value="DVD" id="DVD">DVD</option>
                    <option value="Furniture" id="Furniture">Furniture</option>
                    <option value="Book" id="Book">Book</option>
                </select>

                <div id="switch">

                </div>
            </form>
        </div>
    </section>