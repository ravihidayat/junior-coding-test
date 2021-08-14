    $(document).ready(function () {
        $('#productType').change(function () {
            var optionId = $(this).children(":selected").attr("id");
            var layout = optionId;
            $('#switch').load(`../app/views/layouts/book.html`);
        });
    });