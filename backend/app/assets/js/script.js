// Loads the correct template from /views/layouts/ based on the type passed by the dropdown
// element in addProduct.php

$(function() {
    $('#productType').change(function() {
        const id = $(this).children(":selected").attr("id");
        $("#switch").load(`app/views/layouts/${id}.php`);
    })
})