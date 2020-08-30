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
            <li class="active">Administrar usuarios</li>
        </ol>

    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgrergarUsuario">
                    Agregar usuario
                </button>
            </div>

            <div class="box-body">
                <table class="table table-border table-striped tablas">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Último login</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Usuario Administrador</td>
                            <td>Administrador</td>
                            <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt="Foto"></td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td>
                            <td>2017-12-11 12:05:32</td>

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
                            <td>Administrador</td>
                            <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt="Foto"></td>
                            <td>Administrador</td>
                            <td>
                                <button class="btn btn-success btn-xs">Activado</button>
                            </td>
                            <td>2017-12-11 12:05:32</td>

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

<!-- MODAL AGRERGAR USUARIO -->

<div id="modalAgrergarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- enctype es para enviar archivos -->
            <form role="form" method="post" enctype="multipart/form-data">
                <!-- CABEZA -->
                <div class="modal-header" style="background: #3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar usuario</h4>
                </div>
                <div class="modal-body">

                    <div class="box-body">
                        <!-- ENTRADA PARA EL USUARIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg " name="nuevoNombre" placeholder="Ingresar nombre" require>
                            </div>
                        </div>

                        <!-- ENTRADA PARA EL USUARIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control input-lg " name="nuevoUsuario" placeholder="Ingresar usuario" require>
                            </div>
                        </div>
                        <!-- ENTRADA PARA EL CONTRASEÑA -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="text" class="form-control input-lg " name="nuevoPassword" placeholder="Ingresar contraseña" require>
                            </div>
                        </div>

                        <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lg" name="nuevoPerfil">
                                    <option value="">Seleccionar perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->
                    <div class="form-group">
                        <div class="panel">SUBIR FOTO</div>
                        <input type="file" id="nuevaFoto" name="nuevaFoto">

                        <p class="help-block">Peso máximo de la foto 200 mb</p>
                        <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumdnail" width="100px" alt="Foto">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>