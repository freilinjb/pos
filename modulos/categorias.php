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
                    Agregar categoria
                </button>
            </div>

            <div class="box-body">
                <table class="table table-border table-striped table-bordered table-hover tablas dt-responsive">
                    <thead>
                        <tr>
                            <th style="width: 10px;">#</th>
                            <th>Categorias</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                        $item = null;
                        $valor = null;

                        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                        foreach($categorias as $key => $value) {
                            echo '<tr>
                                    <td>'.($key+1).'</td>
                                    <td class="text-uppercase">'.$value['categoria'].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value['id'].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value['id'].'"><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>';
                        }
                    ?>
                    </tbody>
                </table>
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


<!-- MODAL EDITAR CATEGORÍA -->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- enctype es para enviar archivos -->
            <form role="form" method="post">
                <!-- CABEZA -->
                <div class="modal-header" style="background: #3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar categorÍas</h4>
                </div>
                <div class="modal-body">

                    <div class="box-body">
                        <!-- ENTRADA PARA EL CATEGORÍA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg " id="editarCategoria" name="editarCategoria" placeholder="Ingresar categoria" require>
                                <!-- PARA PODER IDENTIFICAR QUE CATEGORIA ES QUE ESTOY EDITANDO Y ENVIARLO POR AJAX -->
                                <input type="hidden" name="idCategoria" id="idCategoria">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
                
                 <?php 
                    $editarCategoria = new ControladorCategorias();
                    $editarCategoria->ctrEditarCategoria();
                ?>
            </form>

        </div>
    </div>

</div>

<?php 
    $crearCategoria = new ControladorCategorias();
    $crearCategoria->ctrBorrarCategoria();
?>