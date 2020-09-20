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