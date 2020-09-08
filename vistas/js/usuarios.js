
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
    var idUsuario = $(this).attr('idUsuario');
    
    var datos = new FormData();
    //variables post
    datos.append('idUsuario', idUsuario);

    $.ajax({
        url:'ajax/usuarios.ajax.php',
        method:'POST',
        data:datos,
        cache: false,
        contentType:false,
        processData:false,
        dataType:'json',
        success: function(respuesta) {
            respuesta = (JSON.parse(respuesta));
            
            $("#editarNombre").val(respuesta['nombre']);
            $("#editarUsuario").val(respuesta['usuario']);
            $("#editarPerfil").html(respuesta['perfil']);
            //Para que se mangenta en valor por si se va a modificar
            $("#editarPerfil").val(respuesta['perfil']);

            //Carga la foto y lo carga en el input:hidden 
            //para guardarlo para modificarlo
            $("#fotoActual").val(respuesta['foto']);

            $("#passwordActual").val(respuesta['password']);

            if(respuesta['foto'] != '') {
                $('.previsualizar').attr('src', respuesta['foto']);
            }
        }
    });
});

/**
 * ACTIVAR USUARIO
 */

 $('.btnActivar').click(function() {

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function( respuesta) {
             
        }
    });

    if(estadoUsuario == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario', 1);

    } else {
        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activar');
        $(this).attr('estadoUsuario', 0);
    }

 });

 /**
  * REVISAR SI EL USUARIO ESTÁ REGISTRADO
  */

  $('#nuevoUsuario').change(function() {
    //Remueve el mensaje de alerta
    $('.alert').remove();

      const usuario = $(this).val();
      let datos = new FormData();
      datos.append('validarUsuario', usuario);

      $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function( respuesta) {

             if(respuesta != false) {
                 respuesta = JSON.parse(respuesta);
             }
            if(respuesta) {
                $('#nuevoUsuario').parent().after('<div class="alert alert-warning">Este usuario ya existe en la DB</div>');
                // $('#nuevoUsuario').befone('<div class="alert alert-warning">Este usuario ya existe en la DB</div>');
                $('#nuevoUsuario').val();

            }
        }
    });

  });

  /**
   * todo ELiminar Usuario
   */

   $('.btnEliminarUsuario').click( function() {

        const idUsuario = $(this).attr('idUsuario');
        const fotoUsuario = $(this).attr('fotoUsuario');

        swal({
            title: '¿Estás seguro de borrar el usuario?',
            text: '¡Si no lo está puede cancelar la acción!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, borrar usuario!'
        }).then((result) => {
            if(result.value) {
                window.location = 'index.php?ruta=usuarios&idUsuario='+idUsuario+'&fotoUsuario='+fotoUsuario;
            }
        });
   });