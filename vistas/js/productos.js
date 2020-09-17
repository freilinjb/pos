/**
 * @todo CARGAR LA TABLA DINÁMICA DE PRODUCTOS
 */

//  $.ajax({
//     url: 'ajax/datatable-productos.ajax.php',
//     success: function(respuesta) {
//         console.log('respuesta: ', respuesta);
//     }

//  });

 $('.tablasProductos').DataTable( {
    "ajax": "ajax/datatable-productos.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
        }
    }
} );

/**
 * @todo CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
 */

$('#nuevaCategoria').change(function() {

    const idCategoria = $(this).val();
    console.log('idCategoria', idCategoria);
    
    var datos = new FormData();
    datos.append('idCategoria', idCategoria);

    $.ajax({
        url: 'ajax/productos.ajax.php',
        method: 'POST',
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            if(!respuesta) {
                const nuevoCodigo = idCategoria+"01";
                $('#nuevoCodigo').val(nuevoCodigo);
            } else {
                const nuevoCodigo = Number(respuesta['codigo']) + 1;
                // console.log('respuestaCodigo: ', nuevoCodigo);
                $('#nuevoCodigo').val(nuevoCodigo);
            }   
        }
    });
});

/**
 * @todo AGREGAR PRECIO DE VENTA
 * CADA VEZ QUE CAMBIA EL PRECIO DE COMPRA
 * VERIFICA EL PORCENTAJE 
 */

 $('#nuevoPrecioCompra').change(function() {
    //Pregunta si el porcentaje esta habilidado
    if($('.porcentaje').prop('checked')) {
        const valorPorcentaje = $('.nuevoPorcentaje').val();
        console.log('valor porcentaje: ', valorPorcentaje);

        const porcentaje = $('#nuevoPrecioCompra').val()*Number((1+'.'+valorPorcentaje));
        
        $('#nuevoPrecioVenta').val(porcentaje.toFixed(2));
        //CAMBIAR A SOLO LECTURA CUAL ESTA HABILIDADO EL CHECKBOX
        $('#nuevoPrecioVenta').prop('readonly', true);
    } 
 });

/**
 * CADA VEZ QUE CAMBIA EL PORCENTAJE
 * VERIFICA EL PORCENTAJE 
 */

$('.nuevoPorcentaje').change(function() {
    //Pregunta si el porcentaje esta habilidado
    if($('.porcentaje').prop('checked')) {
        const valorPorcentaje = $('.nuevoPorcentaje').val();
        console.log('valor porcentaje: ', valorPorcentaje);

        const porcentaje = $('#nuevoPrecioCompra').val()*Number((1+'.'+valorPorcentaje));
        
        $('#nuevoPrecioVenta').val(porcentaje.toFixed(2));
        //CAMBIAR A SOLO LECTURA CUAL ESTA HABILIDADO EL CHECKBOX
        $('#nuevoPrecioVenta').prop('readonly', true);
    } 
 });

 $(".porcentaje").on('ifUnchecked', function() {
    $('#nuevoPrecioVenta').prop('readonly', false);

 });

 $(".porcentaje").on('ifChecked', function() {
    $('#nuevoPrecioVenta').prop('readonly', true);
 });