/**
 * @todo CARGAR LA TABLA DINÁMICA DE PRODUCTOS
 */

//  $.ajax({
//     url: 'ajax/datatable-productos.ajax.php',
//     success: function(respuesta) {
//         console.log('respuesta: ', respuesta);
//     }

//  });

 $('.tablaProductos').DataTable( {
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

 $('#nuevoPrecioCompra, #editarPrecioCompra').change(function() {
    //Pregunta si el porcentaje esta habilidado
    if($('.porcentaje').prop('checked')) {
        const valorPorcentaje = $('.nuevoPorcentaje').val();
        console.log('valor porcentaje: ', valorPorcentaje);

        const porcentaje = $('#nuevoPrecioCompra').val()*Number((1+'.'+valorPorcentaje));
        
        const editarPorcentaje = $('#editarPrecioCompra').val()*Number((1+'.'+valorPorcentaje));
        
        //MODAL CREAR PRODUCTO
        $('#nuevoPrecioVenta').val(porcentaje.toFixed(2));
        $('#nuevoPrecioVenta').prop('readonly', true);

        //MODAL EDITAR PRODUCTO
        $('#editarPrecioVenta').val(editarPorcentaje.toFixed(2));
        $('#editarPrecioVenta').prop('readonly', true);
    } 
 });

/**
 * CADA VEZ QUE CAMBIA EL PORCENTAJE
 * VERIFICA EL PORCENTAJE 
 */

$('.nuevoPorcentaje').change(function() {
    //Pregunta si el porcentaje esta habilidado
    if($('.porcentaje').prop('checked')) {
        //PARA QUE TOME EL VALOR DEL 
        const valorPorcentaje = $(this).val();
        console.log('valor porcentaje: ', valorPorcentaje);

        const porcentaje = $('#nuevoPrecioCompra').val()*Number((1+'.'+valorPorcentaje));
        
        const editarPorcentaje = $('#editarPrecioCompra').val()*Number((1+'.'+valorPorcentaje));
        
        $('#nuevoPrecioVenta').val(porcentaje.toFixed(2));
        //CAMBIAR A SOLO LECTURA CUAL ESTA HABILIDADO EL CHECKBOX
        $('#nuevoPrecioVenta').prop('readonly', true);

        //MODAL EDITAR PRODUCTO
        $('#editarPrecioVenta').val(editarPorcentaje.toFixed(2));
        $('#editarPrecioVenta').prop('readonly', true);
        
    } 
 });

 $(".porcentaje").on('ifUnchecked', function() {
    $('#nuevoPrecioVenta').prop('readonly', false);
    $('#editarPrecioVenta').prop('readonly', false);

 });

 $(".porcentaje").on('ifChecked', function() {
    $('#nuevoPrecioVenta').prop('readonly', true);
    $('#editarPrecioVenta').prop('readonly', true);
 });

 //SUBIENDO LA FOTO DEL PRODUCTO
$(".nuevaImagen").change(function(){

    var imagen = this.files[0];

    /*=============================================
      VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
      =============================================*/

    if (imagen["type"] !== "image/jpeg" && imagen["type"] !== "image/png") {
    
        $(".nuevaImagen").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
    } else if (imagen["size"] > 2000000) {

        $(".nuevaImagen").val("");

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
});


/**
 * @todo EDITAR PRODUCTO
 */

 /** 
  * Hay que ponerlo asi para que espere al cargar la tabla completa
  * Es una forma de que tenga que esperar a que javascript carge todos los 
  * datos primero
 */
 $('.tablaProductos tbody').on('click', 'button.btnEditarProducto', function() {
    const idProducto = $(this).attr('idProducto');
    
    const datos = new FormData();
    datos.append('idProducto', idProducto);

    $.ajax({
        url: 'ajax/productos.ajax.php',
        method: 'POST',
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {

            var datosCategoria = new FormData();
            datosCategoria.append('idCategoria', respuesta['id_categoria']);

            $.ajax({
                url: 'ajax/categorias.ajax.php',
                method: 'POST',
                data: datosCategoria,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(respuesta) {
                    
                    $('#editarCategoria').val(respuesta['id']);
                    $('#editarCategoria').html(respuesta['categoria']);
                }
            });
            $('#editarCodigo').val(respuesta['codigo']);
            $('#editarDescripcion').val(respuesta['descripcion']);
            $('#editarStock').val(respuesta['stock']);
            $('#editarPrecioCompra').val(respuesta['precio_compra']);
            $('#editarPrecioVenta').val(respuesta['precio_venta']);

            if(respuesta['imagen'] != '') {}
                $('#imagenActual').val(respuesta['imagen']);
                $('.previsualizar').attr('src',respuesta['imagen']);
        }
    });
 });


 /**
  * @todo ELIMINAR PRODUCTO
  */

  $('.tablaProductos tbody').on('click', 'button.btnEliminarProducto', function() {
    const idProducto = $(this).attr('idProducto');
    const codigo = $(this).attr('codigo');
    const imagen = $(this).attr('imagen');

    swal({
        title: '¿Está seguro de borrar el producto?',
        text: '¡Si no lo esta puede candelar la accion!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
    }).then((result) => {
        if(result.value) {
            window.location = "index.php?ruta=productos&idProducto="+idProducto+"&imagen="+imagen+"&codigo="+codigo;
        }
    });
    // console.log('idProducto: ', idProducto);
  });