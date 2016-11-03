<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left">Mascotas</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-2">
                                    <a button type="button" class="btn btn-success" href="altaMascota">
                                        <span class="glyphicon glyphicon-plus"></span> Nueva Mascota</a>
                                    </button>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Buscar por nombre...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($success){ ?><div class="alert alert-success"><?php echo $success;?></div><?php }?>
            <?php if ($error){ ?><div class="alert alert-danger"><?php echo $error;?></div><?php }?>
            <?php if ($undo){ ?><div class="alert alert-warning"><?php echo $undo;?></div><?php }?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th># Dueño</th>
                            <th>Nombre</th>
                            <th>Raza</th>
                            <th>Observaciones</th>
                            <th class="col-sm-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           foreach ($mascotas as $mascota){?>
                               <tr>
                               <td><?php echo $mascota->id?></td>
                               <td><?php echo $mascota->idCliente?></td>
                               <td><?php echo $mascota->mNombre?></td>
                               <td><?php echo $mascota->nRaza?></td>
                               <td><?php echo $mascota->obs?></td>
                               <td class="text-left col-sm-3">
                               <a button href="verMascota?id=<?php echo $mascota->id?>" type="button" class="btn btn-primary" aria-label="Left Align">
                               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                               </button>
                               <a href="eliminarMascota?id=<?php echo $mascota->id?>" button type="button" class="btn btn-warning" aria-label="Left Align">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                               </button></td>
                           <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>