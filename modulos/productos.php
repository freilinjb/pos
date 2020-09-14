<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <h1>
            Administrar productos
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
                <table class="table table-border table-striped dt-responsive tablasProductos">
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
                </table>
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
                        
                        <!-- ENTRADA PARA SELECCIONAR SU CATEGORIA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" require>
                                    <option value="">Seleccionar categoria</option>
                                    <?php
                                        $item = null;
                                        $valor = null;

                                        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                                        foreach($categorias as $key => $value) {

                                            echo '<option value="'.$value['id'].'">'.$value['categoria'].'</option>';

                                        }
                                    ?>                                    
                                </select>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL CÓDIGO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                <input type="text" class="form-control input-lg " id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL PRODUCTO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                <input type="text" class="form-control input-lg " name="nuevoDescripcion" placeholder="Ingresar descripción" require>
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

                                    <input type="number" class="form-control input-lg" min="0" id="nuevoPrecioCompra" name="nuevoPrecioCompra" placeholder="Precio de compra" require>
                                </div>
                            </div>
                           
                            <div class="col-xs-6">
                                <!-- ENTRADA PARA EL PREIO VENTA -->
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                                    <input type="number" class="form-control input-lg" min="0" id="nuevoPrecioVenta" name="nuevoPrecioVenta" placeholder="Precio de venta" require>
                                </div>

                                <br>
                                <!-- CHECK PARA PORCENTAJE -->
                                <div class="col-xs-4" style="padding: 0">
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="minimal porcentaje" checked>
                                            Utilizar porcentaje
                                        </label>
                                    </div>
                                </div>

                                <!-- ENTRADA PARA PORCENTAJE -->
                                <div class="col-xs-8">
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
                    $crearProducto = new ControladorProductos();
                    $crearProducto->ctrCrearProducto();
                ?>
            </form>

        </div>
    </div>

</div>