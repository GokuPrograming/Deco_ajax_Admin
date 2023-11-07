jQuery(document).on('submit', '#forming', function (event) {
    event.preventDefault();
    jQuery.ajax({
        url: '../controller/ctrlLogin.php',
        type: 'POST',
        dataType: 'json',
        data: jQuery(this).serialize(),
        beforeSend: function () {
            // Puedes realizar acciones antes de enviar la solicitud aquí
            jQuery('.botonlg').val('validando...'); // Debes usar jQuery en lugar de $
        }
    })
        .done(function (respuesta) {
            console.log(respuesta);
            // Evaluar la respuesta
            if (!respuesta.error) {
                if (respuesta.tipo == 'user') {
                    location.href = '../view/main.php';
                } else if(respuesta.tipo=="admin") {
                    location.href = '../view/main.php';
                }
            } else {
                jQuery('#error').slideDown('slow'); // Debes usar jQuery en lugar de $
                setTimeout(function () {
                    jQuery('#error').slideUp('slow'); // Debes usar jQuery en lugar de $
                }, 3000);
                jQuery('.botonlg').val('Iniciar sesión'); // Debes usar jQuery en lugar de $
            }
        })
        .fail(function (resp) {
            console.log(resp.responseText);
        })
        .always(function () {
            console.log("complete");
        });
});
