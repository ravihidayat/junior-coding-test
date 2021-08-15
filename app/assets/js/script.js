$(document).ready(function() {
    $('#productType').change(function() {
        const id = $(this).children(":selected").attr("id");
        $("#switch").load(`app/views/layouts/${id}.php`);
    })
})