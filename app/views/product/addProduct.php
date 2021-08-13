<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Product Add</title>
</head>

<body>
    <section id="navMenu" class="container mt-4">
        <div class="container d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <h2>Product Add</h2>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5">Save</button>
                <button type="button" id="delete-product-btn" class="btn btn-danger" onclick="window.location.href='./'">Cancel</button>
            </div>
        </div>
        <hr>
    </section>

    <section id="body" class="container">
        <form action="" method="post" id="product_form">
            <label for="sku">SKU</label>
            <input type="text" name="sku" id="sku"><br><br>

            <label for="name">Name</label>
            <input type="text" name="name" id="name"><br><br>

            <label for="price">Price</label>
            <input type="number" name="price" id="price"><br><br><br>

            <label for="switcher">Type Switcher</label>
            <select name="switcher" id="productType">
                <option value="">Type Switcher</option>
                <option value="DVD" id="DVD">DVD</option>
                <option value="Furniture" id="Furniture">Furniture</option>
                <option value="Book" id="Book">Book</option>
            </select>
        </form>
    </section>