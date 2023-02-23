$(function() {
    $('#delete-product-btn').click(function() {
        var checkboxes = $('.delete-checkbox');
        var sku = checkboxes.filter(':checked').map(function() {
            return this.value;
        }).get().join(', ');
        // console.log(sku);
        $.ajax({
            url: 'http://localhost/junior_coding_test/',
            data: {sku: sku},
            method: 'POST',
            success: function(response) {
                window.location.href = 'http://localhost/junior_coding_test';
            }
        })
        // $.post('http://localhost/junior_coding_test/', {sku: sku});
    })
})