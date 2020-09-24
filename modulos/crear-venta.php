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
                    <div class="box-header with-border">

                    </div>
                    <form role="form" method="post" class="formularioVenta">

                        <div class="box-body">
                            <div class="box">
                                <!-- ENTRADA DEL VENDEDOR -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["nombre"];?>" readonly>
                                        <input type="hidden" value="<?php echo $_SESSION["id"];?>">
                                    </div>

                                </div>
                                <!-- ENTRADA DEL VENDEDOR -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                        <?php 
                                            $item = null;
                                            $valor = null;

                                            $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
                                            
                                            if(!$ventas) {
                                                echo '<input type="text" class="form-control" id="nuevaVenta" 
                                                    name="nuevaVenta" value="10001" readonly>';
                                            } else {
                                                $codigo = $value['codigo']+1;
                                                
                                                echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                                          
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!-- ENTRADA DEL CLIENTE -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                        <select class="form-control" id="agrergarCliente" name="agrergarCliente">
                                            <option value="">Seleccionar cliente</option>
                                            <?php
                                                $item = null;
                                                $valor = null;
                                                $clientes = ControladorCliente::ctrMostrarClientes($item, $valor);

                                                foreach($clientes as $key => $value) {
                                                    echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                                                }
                                            ?>
                                        </select>

                                        <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                                    </div>
                                </div>

                                <!-- ENTRADA PARA AGREGAR PRODUCTO -->
                                <div class="form-group row nuevoProducto">
                                   
                                </div>

                                <!-- BOTON PARA AGRERGAR PRODUCTO -->
                                <button type="button" class="btn btn-default hidden-lg">Agrergar producto</button>
                                <!-- IMPUESTO Y TOTAL -->
                                <div class="row">
                                    <div class="col-xs-8 pull-right">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Impuesto</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 50%;">
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" name="nuevoImpuestoVenta" id="nuevoImpuestoVenta" placeholder="0" require>
                                                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                                        </div>
                                                    </td>

                                                    <td style="width: 50%;">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                                            <input type="number" class="form-control" name="nuevoTotalVenta" id="nuevoTotalVenta" placeholder="00000" readonly require>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- METODO DE PAGO -->

                                <div class="form-group row">
                                    <div class="col-xs-6" >
                                        <div class="form-group">
                                            <select class="form-control" name="nuevoMetodoPago" id="nuevoMetodoPago" require>
                                                <option value="">Seleccione método de pago</option>
                                                <option value="efectivo">Efectivo</option>
                                                <option value="tarjetaCredito">Tarjeta Crédito</option>
                                                <option value="tarjetaDebito">Tarjeta Débito</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-6" style="padding-left:0px">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion"
                                            placeholder="Codigo transaccion" require>

                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <br>

                            </div>
                        </div>
                    </form>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right" data-dismiss="modal">Guardar venta</button>
                    </div>
                </div>
            </div>

            <!-- LA TABLA DE PRODUCTOS -->
            <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
                <div class="box box-warning">
                    <div class="box-header with-border">

                    </div>
                    <div class="box-body">
                    <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
                    </div>
                </div>

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
            $crearCliente->ctrCrearCliente();
            ?>
        </div>
    </div>
</div>