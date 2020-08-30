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
                <table class="table table-border table-striped">
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

<!-- Modal -->
<div id="modalAgrergarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>