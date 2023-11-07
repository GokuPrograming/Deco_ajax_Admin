jQuery(document).on('submit', '#forming', function (event) {
    event.preventDefault();

    // Verificar el captcha antes de continuar
    var response = grecaptcha.getResponse();

    if (!response) {
        // El captcha no se completó
        console.log('Por favor, complete el captcha.');
        return;
    }
    console.log('se completo captcha');
    // Continúa con el envío del formulario si el captcha se completó
    jQuery.ajax({
        url: '../controller/ctrlRegistrar.php',
        type: 'POST',
        dataType: 'json',
        data: jQuery(this).serialize(),
        beforeSend: function () {
            jQuery('.botonlg').val('Validando...');
        }
    })
        .done(function (respuesta) {
            if (respuesta.success) {
                jQuery('#error').slideDown('slow'); // Debes usar jQuery en lugar de $
                setTimeout(function () {
                    jQuery('#error').slideUp('slow'); // Debes usar jQuery en lugar de $
                }, 3000);
                jQuery('.botonlg').val('Iniciar sesión'); // Debes usar jQuery en lugar de $
                console.log(respuesta.message);

                // Puedes realizar acciones adicionales, como redirigir o mostrar un mensaje de éxito
            } else {
                console.log('Error: ' + respuesta.message);
                // Puedes mostrar un mensaje de error
            }
        })
        .fail(function (resp) {
            console.log(resp.responseText);
        })
        .always(function () {
            console.log('Complete');
        });

});
