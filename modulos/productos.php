<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Administrar usuarios
            <small>Panel de control</small>

        </h1>

        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar productos</li>
        </ol>

    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgrergarUsuario">
                    Agregar producto
                </button>
            </div>

            <div class="box-body">
                <table class="table table-border table-striped tablas dt-responsive">
                    <thead>
                        <tr>
                            <th style="width: 10px;">#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Agregado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" alt="Foto"></td>
                            <td>0001</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                            <td>Lorem Ipsun</td>
                            <td>20</td>
                            <td>RD$5.59</td>
                            <td>RD$10.59</td>
                            <td>2020-12-11 12:10:20</td>
                            <!-- <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td> -->
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" alt="Foto"></td>
                            <td>0001</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                            <td>Lorem Ipsun</td>
                            <td>20</td>
                            <td>RD$5.59</td>
                            <td>RD$10.59</td>
                            <td>2020-12-11 12:10:20</td>
                            <!-- <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td> -->
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px" alt="Foto"></td>
                            <td>0001</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
                            <td>Lorem Ipsun</td>
                            <td>20</td>
                            <td>RD$5.59</td>
                            <td>RD$10.59</td>
                            <td>2020-12-11 12:10:20</td>
                            <!-- <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td> -->
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="box-footer">
                Footer
            </div>
        </div>

    </section>
</div>

<!-- MODAL AGRERGAR PRODUCTOS -->

<div id="modalAgrergarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- enctype es para enviar archivos -->
            <form role="form" method="post" enctype="multipart/form-data">
                <!-- CABEZA -->
                <div class="modal-header" style="background: #3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar productos</h4>
                </div>
                <div class="modal-body">

                    <div class="box-body">
                        <!-- ENTRADA PARA EL CÓDIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                <input type="text" class="form-control input-lg " name="nuevoCodigo" placeholder="Ingresar código" require>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL PRODUCTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                <input type="text" class="form-control input-lg " name="nuevoDescripcion" placeholder="Ingresar descripción" require>
                            </div>
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU CATEGORIA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoCategoria">
                                    <option value="">Seleccionar categoria</option>
                                    <option value="Taladros">Taladros</option>
                                    <option value="Andamos">Andamos</option>
                                    <option value="Equipos para construcción">Equipos para construcción</option>
                                </select>
                            </div>
                        </div>
                        
                        <!-- ENTRADA PARA EL STOCK -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                <input type="number" class="form-control input-lg" min="0" name="nuevoStock" placeholder="Cantidad disponible" require>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-xs-6">
                                <!-- ENTRADA PARA EL PRECIO COMPRA -->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                                    <input type="number" class="form-control input-lg" min="0" name="nuevoPrecioCompra" placeholder="Precio de compra" require>
                                </div>
                            </div>
                           
                            <div class="col-xs-6">
                                <!-- ENTRADA PARA EL PREIO VENTA -->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                                    <input type="number" class="form-control input-lg" min="0" name="nuevoPrecioVenta" placeholder="Precio de venta" require>
                                </div>

                                <br>
                                <!-- CHECK PARA PORCENTAJE -->
                                <div class="col-xs-6" style="padding: 0">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="minimal porcentaje" checked>
                                            Utilizar porcentaje
                                        </label>
                                    </div>
                                </div>

                                <!-- ENTRADA PARA PORCENTAJE -->
                                <div class="col-xs-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40"  name="" id="" require>
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                        <div class="form-group">
                            <div class="panel">SUBIR IMGEN</div>
                            <input type="file" id="nuevaImagen" name="nuevaImagen">

                            <p class="help-block">Peso máximo de la imgen 200 mb</p>
                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumdnail" width="100px" alt="Imagen">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </div>
                </div>
                <?php 
                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario->ctrCrearUsuario();
                ?>
            </form>

        </div>
    </div>

</div>