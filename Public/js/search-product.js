$(function () {
    $('#btnSearch').click(function () {
        var nameProduct = $('#keyword').val().trim();
        if(nameProduct){
            window.location.href = "?c=product&m=search&q="+nameProduct;
        }

    })

})