/**
 * EDITAR CATEGORIA
 */

$(document).on('click','.btnEditarCategoria' , function() {
     
//  })
//  $('.btnEditarCategoria').click(function() {


     const idCategoria = $(this).attr('idCategoria');
     console.log('idCategoria: ', idCategoria);


     var datos = new FormData();
     datos.append('idCategoria', idCategoria);

     $.ajax({
        url: 'ajax/categorias.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {
            console.log('respuesta: ', respuesta);
        }
     });
 })