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
    <link rel="stylesheet" href="<?= Config::ASSETS ?>/css/style.css">
    <title>Product List</title>
</head>

<body>
    <section id="navMenu">
        <div class="container mt-4">
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    <h2>Product List</h2>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary mr-5" onclick="window.location.href='<?= Config::PUSH ?>'">ADD</button>
                    <button type="button" id="delete-product-btn" class="btn btn-danger">MASS DELETE</button>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <section id="body">
        <div class="container">
            <div class="row">
                <?php foreach ($data as $product) : ?>
                    <div class="col-md-3">
                        <div class="card bg-light mb-5 card-custom">
                            <div class="card-body">
                                <input type="checkbox" class="delete-checkbox checkbox-custom">
                                <p class="card-text text-center"><?= $product->sku ?></p>
                                <p class="card-text text-center"><?= $product->name ?></p>
                                <p class="card-text text-center"><?= $product->price ?> $</p>
                                <p class="card-text text-center"><?= $product->attribute ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>