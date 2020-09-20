/**EDITAR CLIENTE */

$('.btnEditarCliente').click(function(){
    const idCliente = $(this).attr('idCliente');
    console.log('idCliente: ',idCliente);

    const datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({
        url: 'ajax/clientes.ajax.php',
        method:'POST',
        data: datos,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            $('#idCliente').val(respuesta['id']);
            $('#editarCliente').val(respuesta['nombre']);
            $('#editarDocumentoId').val(respuesta['documento']);
            $('#editarEmail').val(respuesta['email']);
            $('#editarTelefono').val(respuesta['telefono']);
            $('#editarDireccion').val(respuesta['direccion']);
            $('#editarFechaNacimiento').val(respuesta['fecha_nacimiento']);
        }
    });
});

/**
 * ELIMINAR CLIENTE
 */

 $('.btnEliminarCliente').click(function() {
    const idCliente = $(this).attr('idCliente');
    // console.log('idCliente: ', idCliente);

    swal({
        title: '¿Está seguro de borrar el cliente?',
        text: '¡Si no lo está puede cancelar la acción',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar categoría'
    }).then((result)=> {
        if(result.value) {
            window.location = `index.php?ruta=clientes&idCliente=${idCliente}`;
        }
    });
 });    