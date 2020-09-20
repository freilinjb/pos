<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Reportes de ventas
            <small>Panel de control</small>

        </h1>
        
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Reportes de ventas</li>
        </ol>

    </section>

    <!-- Main content --> 
    <section class="content">
        <div class="row">
            <!-- EL FORMULARIO -->
            <div class="col-lg-5 col-xs-12">
                <div class="box box-success">
                    <div class="box-header with-border"></div>
                    <div class="box-body">
                        <form role="form" method="POST">
                            <div class="box">
                                <!-- ENTRADA DEL VENDEDOR -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="usuarioAdministrador" readonly>
                                    </div>
                                </div>
                                <!-- ENTRADA DEL VENDEDOR -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <input type="text" class="form-control"  id="nuevaVenta" name="nuevaVenta"value="10002343" readonly>
                                    </div>
                                </div>
                                <!-- ENTRADA DEL CLIENTE -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        
                                        <select class="form-control" id="agrergarCliente" name="agrergarCliente">
                                            <option value="">Seleccionar cliente</option>
                                        </select>

                                        <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                                    </div>
                                </div>

                                <!-- ENTRADA PARA AGREGAR PRODUCTO -->
                                <div class="form-group row nuevoProducto">
                                    <!-- Descripcion del producto -->
                                    <div class="col-xs-6" style="padding-right: 0px;">
                                        <div class="input-group">

                                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>

                                            <input type="text" class="form-control" id="agregarProducto" name="agrergarProducto" placeholder="Descripcion del producto" require>

                                        </div>
                                    </div> 
                                    <!-- Cantidad del producto -->
                                    <div class="col-xs-3" style="padding-right: 0px;">
                                        <input type="number" class="form-control" id="nuevaCantidadProducto" 
                                        name="nuevaCantidadProducto" min="0" placeholder="0" require>
                                    </div>

                                    <!-- Cantidad del producto -->
                                    <div class="col-xs-3">
                                       <div class="input-group">
                                            <input type="number" class="form-control" id="nuevoPrecioProducto"
                                            name="nuevoPrecioProducto" placeholder="000000" readonly require>

                                            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                       </div>
                                    </div>
                                </div>
                                
                                    <!-- BOTON PARA AGRERGAR PRODUCTO -->
                                    <button type="button" class="btn btn-default hidden-lg">Agrergar producto</button>
                                    <hr>

                                    <div class="row">
                                        
                                    </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

            <!-- LA TABLA DE PRODUCTOS -->
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
            <div class="box box-warning"></div>

            </div>
        </div>
    </section>
</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post">

                <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar cliente</h4>

                </div>

                <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

                <div class="modal-body">
                    <div class="box-body">
                        <!-- ENTRADA PARA EL NOMBRE -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL DOCUMENTO ID -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL EMAIL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL TELÉFONO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA DIRECCIÓN -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>
                            </div>
                        </div>
                        <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cliente</button>
                </div>
            </form>
            <?php
                $crearCliente = new ControladorCliente();
                $crearCliente -> ctrCrearCliente();
            ?>
        </div>
    </div>
</div>

