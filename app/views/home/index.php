<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Product List</title>
</head>

<body>
    <section id="navMenu" class="container mt-4">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <h2>Product List</h2>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mr-5" onclick="window.location.href='add-product'">ADD</button>
                <button type="button" id="delete-product-btn" class="btn btn-danger">MASS DELETE</button>
            </div>
        </div>
        <hr>
    </section>

    <section id="body" class="container">
        <h1>Body</h1>
    </section>