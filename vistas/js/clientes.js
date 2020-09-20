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
            console.log('respuesta: ',  respuesta);
        }
    });
});