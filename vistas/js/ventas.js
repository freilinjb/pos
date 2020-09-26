/**
 * @todo CARGAR LA TABLA DINÁMICA DE VENTAS
 */

// $.ajax({
//   url: "ajax/datatable-ventas.ajax.php",
//   success: function (respuesta) {
//     console.log("respuesta: ", respuesta);
//   },
// });

$(".tablaVentas").DataTable({
  ajax: "ajax/datatable-ventas.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo:
      "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
    buttons: {
      copy: "Copiar",
      colvis: "Visibilidad",
    },
  },
});

/**
 * AGRERGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
 */

$(".tablaVentas tbody").on("click", "button.agregarProducto", function () {
  const idProducto = $(this).attr("idProducto");

  $(this).removeClass("btn-primary agregarProducto");

  $(this).addClass("btn-default");

  const datos = new FormData();
  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log("respuesta: ", respuesta);

      const descripcion = respuesta["descripcion"];
      const stock = respuesta["stock"];
      const precio = respuesta["precio_venta"];
        console.log('precio: ',stock);
      /**
       * EVITAR AGRERGAR PRODUCTO CUANDO EL STOCK ESTÁ EN CERO
       */

      if (stock == 0) {
        swal({
          title: "No hay stock disponible",
          type: "error",
          confirmButtonText: "¡Cerrar!",
        });

        $(`button[idProducto='${idProducto}']`).addClass(
          "btn-primary agregarProducto"
        );

        return;
      }

      $(".nuevoProducto").append(` 
        <div class="row" style="padding:5px 15px">
            <!-- Descripcion del producto -->
            <div class="col-xs-6" style="padding-right: 0px;">
                <div class="input-group">

                    <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="${idProducto}"><i class="fa fa-times"></i></button></span>

                    <input type="text" class="form-control" id="agregarProducto" name="agrergarProducto" value="${descripcion}" readonly require>

                </div>
            </div>
            <!-- Cantidad del producto -->
            <div class="col-xs-3" style="padding-right: 0px;">
            <!-- LA VARIABLE STOCK ES PARA SUMAR O RESTAR  -->

                <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="${stock}" require>
            </div>

            <!-- Precio del producto -->
            <div class="col-xs-3 ingresoPrecio">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                    <input type="number" class="form-control nuevoPrecioProducto" name="nuevoPrecioProducto" value="${precio}" readonly require>
                </div>
            </div>
        </div>`);
    },
  });
});

/**
 * CUANDO CARQUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
 */
//evento que se ejecuta cada vez que se dibuja
$(".tablaVentas").on("draw.dt", function () {
  if (localStorage.getItem("quitarProducto") != null) {
    var listarIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

    for (let i = 0; i < listarIdProductos.length; i++) {
      $(
        `button.recuperarBoton[idProducto='${listarIdProductos[i]["idProducto"]}']`
      ).removeClass("btn-default");
      $(
        `button.recuperarBoton[idProducto='${listarIdProductos[i]["idProducto"]}']`
      ).addClass("btn-primary agrergarProducto");
    }
  }
});

//QUITAR PRODUCTOS DE LAS VENTAS Y RECUPERAR EL BOTON
//Este cargado con las pestañas cargadas
var idQuitarProducto = [];

//limpia el localstorage cada vez que recargue la pagina
localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", ".quitarProducto", function () {
  $(this).parent().parent().parent().parent().remove();

  const idProducto = $(this).attr("idProducto");

  //ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
  if (localStorage.getItem("quitarProducto") == null) {
    idQuitarProducto = [];
  } else {
    idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
  }

  idQuitarProducto.push({ idProducto: idProducto });

  localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

  //Habilita el boton para volver agregar producto
  $(`button.recuperarBoton[idProducto='${idProducto}']`).removeClass(
    "btn-default"
  );

  $(`button.recuperarBoton[idProducto='${idProducto}']`).addClass(
    "btn-primary agrergarProducto"
  );
});

/**
 * AGRERGANDO PRODUCTO DESDE EL BOTON PARA DISPOSITIVOS
 */

 var numProducto = 0;

$(".btnAgregarProducto").click(function () {

    numProducto ++;

  const datos = new FormData();
  datos.append("traerProductos", "ok");

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
        $(".nuevoProducto").append(` 
        <div class="row" style="padding:5px 15px">
            <!-- Descripcion del producto -->
            <div class="col-xs-6" style="padding-right: 0px;">
                <div class="input-group">

                    <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>

                    <select class="form-control nuevaDescripcionProducto" id="producto${numProducto}" idProducto name="nuevaDescripcion" required>
                        <option>Seleccione el producto</option>
                    </select>

                </div>
            </div>
            <!-- Cantidad del producto -->
            <div class="col-xs-3 ingresoCantidad" style="padding-right: 0px;">
            <!-- LA VARIABLE STOCK ES PARA SUMAR O RESTAR  -->

                <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock require>
            </div>

            <!-- Cantidad del producto -->
            <div class="col-xs-3 ingresoPrecio">
                <div class="input-group">
                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                    <input type="number" class="form-control nuevoPrecioProducto" name="nuevoPrecioProducto" value readonly require>
                </div>
            </div>
        </div>`);

        //AGREGAR LOS PRODUCTOS AL SELECT
        respuesta.forEach(function(item, index) {
            if(item.stock != 0) {
                //Solo cargan los productos que tengan en el stock
                $(`#producto${numProducto}`).append(
                    `<option idProducto=${item.id} value=${item.id}>${item.descripcion}</option>`
                );
            }
        });
    }
  });
});

/**
 * SELECCIONAR PRODUCTO
 */

 $('.formularioVenta').on("change", "select.nuevaDescripcionProducto", function() {
    const idProducto = $(this).val();

    const nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
    const nuevoCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

    const datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
           $(nuevoCantidadProducto).attr('stock', respuesta["stock"]);
           $(nuevoPrecioProducto).val(respuesta["precio_venta"]);

        }
    });
 });

 /**
  * MODIFICAR LA CANTIDAD
  */

 $('.formularioVenta').on("change","input.nuevaCantidadProducto", function () {
   
  const precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
  console.log('precio: ', precio.val());

   const precioFinal = $(this).val() * precio.val();
   precio.val(precioFinal);

   console.log('cambio: ',$(this).val());
 });