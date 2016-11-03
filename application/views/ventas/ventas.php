<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left">Ventas</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-2">
                                    <a button type="button" class="btn btn-success" href="altaVenta">
                                        <span class="glyphicon glyphicon-plus"></span> Nueva Venta</a>
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
                            <th># Cliente</th>
                            <th>Artículo</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Precio Total</th>
                            <th class="col-sm-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           foreach ($ventas as $venta){?>
                               <tr>
                               <td><?php echo $venta->idVenta?></td>
                               <td><?php echo $venta->idCliente?></td>
                               <td><?php echo $venta->nArticulo?></td>
                               <td><?php echo $venta->fecha?></td>
                               <td><?php echo $venta->cantidad?></td>
                               <td><?php echo $venta->precio?></td>
                               <td><?php echo $venta->cantidad * $venta->precio?></td>
                               <td class="text-left col-sm-3">
                               <a button href="verVenta?id=<?php echo $venta->idVenta?>" type="button" class="btn btn-primary" aria-label="Left Align">
                               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                               </button>
                               <a href="eliminarVenta?id=<?php echo $venta->idVenta?>" button type="button" class="btn btn-warning" aria-label="Left Align">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                               </button></td>
                           <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>