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
            <li class="active">Administrar categorias</li>
        </ol>

    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgrergarCategoria">
                    Agregar usuario
                </button>
            </div>

            <div class="box-body">
                <table class="table table-border table-striped tablas dt-responsive">
                    <thead>
                        <tr>
                            <th style="width: 10px;">#</th>
                            <th>Categorias</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>EQUIPOS ELECTROMECÁNICOS</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Usuario Administrador</td>
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

<!-- MODAL AGRERGAR CATEGORÍA -->

<div id="modalAgrergarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- enctype es para enviar archivos -->
            <form role="form" method="post">
                <!-- CABEZA -->
                <div class="modal-header" style="background: #3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar categorÍas</h4>
                </div>
                <div class="modal-body">

                    <div class="box-body">
                        <!-- ENTRADA PARA EL CATEGORÍA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg " name="nuevaCategoria" placeholder="Ingresar categoria" require>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Guardar categoria</button>
                </div>
                
                <?php 
                    $crearCategoria = new ControladorCategorias();
                    $crearCategoria->ctrCrearCategoria();
                ?>
            </form>

        </div>
    </div>

</div>