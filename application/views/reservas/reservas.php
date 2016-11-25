<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left">Reservas</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-2">
                                    <a button type="button" class="btn btn-success" href="altaReserva">
                                        <span class="glyphicon glyphicon-plus"></span> Nueva Reserva</a>
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
                            <th># Cliente</th>
                            <th>Mascota</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th class="col-sm-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           foreach ($reservas as $reserva){?>
                               <tr>
                               <td><?php echo $reserva->idCliente?></td>
                               <td><?php echo $reserva->nMascota?></td>
                               <td><?php echo $reserva->fecha?></td>
                               <td><?php echo $reserva->hora?></td>
                               <td class="text-left col-sm-3">
                               <a button href="verReserva?id=<?php echo $reserva->id?>" type="button" class="btn btn-primary" aria-label="Left Align">
                               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                               </button>
                               <a href="eliminarReserva?id=<?php echo $reserva->id?>" button type="button" class="btn btn-warning" aria-label="Left Align">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                               </button></td>
                           <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>