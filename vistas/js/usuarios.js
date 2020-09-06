
$(".nuevaFoto").change(function(){

    var imagen = this.files[0];

    /*=============================================
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
      =============================================*/

    if (imagen["type"] !== "image/jpeg") {
        if (imagen["type"] !== "image/png") {

            $(".nuevaFoto").val("");

            swal({
                title: "Error al subir la imagen",
                text: "¡La imagen debe estar en formato JPG o PNG!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
            });

        } else if (imagen["size"] > 2000000) {

            $(".nuevaFoto").val("");

            swal({
                title: "Error al subir la imagen",
                text: "¡La imagen no debe pesar más de 2MB!",
                type: "error",
                confirmButtonText: "¡Cerrar!"
            });

        } else {

            const datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on("load", function (event) {

                const rutaImagen = event.target.result;

                $(".previsualizar").attr("src", rutaImagen);

            });

        }
    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        const datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on('load', function (event) {

            const rutaImagen = event.target.result;

        });

    }
});


/**
 * EDITAR USUARIO
 */
$('.btnEditarUsuario').click( function() {
    //Captura el id del usuario al precionar click en el boton editar
    const idUsuario = $(this).attr('idUsuario');
    
    let datos = new FormData();
    //variables post
    datos.append('idUsuario', idUsuario);

    $.ajax({
        url:'ajax/usuarios.ajax.php',
        method:'POST',
        data:datos,
        cache: false,
        contentType:false,
        processData:false,
        dateType:'json',
        success: function(respuesta) {
            respuesta = (JSON.parse(respuesta));
            ;
            $("#editarNombre").val(respuesta['nombre']);
            $("#editarUsuario").val(respuesta['usuario']);
            $("#editarPerfil").html(respuesta['perfil']);

            if(respuesta['foto'] != '') {
                $('.previsualizar').attr('src', respuesta['foto']);
            }
        }
    });
});