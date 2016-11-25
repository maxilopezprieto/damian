<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left"><?php echo $cliente->nombre?></h2>
                    </div>
                </div>
            </div>
            <?php if (validation_errors()){?><div class="alert alert-danger" style="width: 350px; margin: 0 auto;"><?php echo validation_errors();?></div><?php }?>
            <div>
                <button id="btnEditar" type="button" class="btn btn-warning" aria-label="Left Align" >
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>                
            </div>
            <!-- INICIO -->
                <div class="table-responsive">
                    <form action="doEditarCliente" method="post">
                        <input type="hidden" name="id" value="<?php echo $cliente->id?>">
                        <input type="hidden" name="activo" value="<?php echo $cliente->activo?>">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-right header_table">#</th>
                                <td><?php echo $cliente->id?></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Nombre y Apellido</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="nombre" placeholder="Nombre..." value="<?php echo $cliente->nombre; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Dirección</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="direccion" placeholder="Dirección..." value="<?php echo $cliente->direccion; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Teléfono</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="telefono" placeholder="Teléfono..." value="<?php echo $cliente->telefono; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Celular</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="celular" placeholder="Celular..." value="<?php echo $cliente->celular; ?>"></td>
                            </tr>
                        </table>
                        <input class="btn btn-default" id="submit" type="submit" value="Editar" disabled/>
                    </form>
                    <div class="page-header">
                        <a class="btn btn-default" role="button" data-toggle="collapse" href="#mascotas" aria-expanded="false" aria-controls="collapseExample"> Mascotas </a>
                        <a class="btn btn-default" role="button" data-toggle="collapse" href="#proximosTurnos" aria-expanded="false" aria-controls="collapseExample"> Próximos Turnos </a>
                        <a class="btn btn-default" role="button" data-toggle="collapse" href="#historial" aria-expanded="false" aria-controls="collapseExample"> Historial Turnos </a>
                        <a class="btn btn-default" role="button" data-toggle="collapse" href="#estadoCuenta" aria-expanded="false" aria-controls="collapseExample"> Estado de Cuenta </a>
                    </div>
                    <div class="collapse" id="mascotas">
                        <h4>Mascotas</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Raza</th>
                                    <th>Observaciones</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($mascotas as $mascota){?>
                                <tr>
                                    <td><?php echo $mascota->nMascota?></td>
                                    <td><?php echo $mascota->nRaza?></td>
                                    <td><?php echo $mascota->obs?></td>
                                    <td>
                                        <a button href="verMascota?id=<?php echo $mascota->id?>" type="button" class="btn btn-primary" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                        </button>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <div class="collapse" id="proximosTurnos">
                        <h4>Próximos Turnos</h4>
                        <table class="table table-striped">
                            <tbody>
                                <?php foreach ($reservas as $reserva) {?>
                                <tr>
                                    <td><span class="label label-info"><?php echo $reserva->fecha?></span></td>
                                    <td><?php echo $reserva->hora?></td>
                                    <td><?php echo $reserva->nArticulo?></td>
                                    <td><?php echo $reserva->nMascota?></td>
                                    <td><span class="label label-success">
                                        <?php
                                            switch ($reserva->estado) {
                                                case '0':
                                                    echo "Proyectado";
                                                    break;
                                                case '1':
                                                    echo "Hecho";
                                                    break;
                                                case '2': 
                                                    echo "Postergado";   
                                                    break;
                                                case '3':
                                                    echo "Suspendido";
                                                    break;
                                                default:
                                                    break;
                                            }
                                        ?>    
                                            </span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="collapse" id="historial">
                        <h4>Historial de Trabajos</h4>
                        <table class="table table-striped">
                            <tbody>
                                <?php foreach ($historialReservas as $hreserva) {?>
                                <tr>
                                    <td><span class="label label-success"><?php echo $hreserva->fecha?></span></td>
                                    <td><?php echo $hreserva->hora?></td>
                                    <td><?php echo $hreserva->nArticulo?></td>
                                    <td><?php echo $hreserva->nMascota?></td>
                                    <td>
                                        <?php
                                            switch ($hreserva->estado) {
                                                case '0':
                                                    echo '<span class="label label-info">';
                                                    echo "Proyectado";
                                                    break;
                                                case '1':
                                                    echo '<span class="label label-success">';
                                                    echo "Hecho";
                                                    break;
                                                case '2': 
                                                    echo '<span class="label label-warning">';
                                                    echo "Postergado";   
                                                    break;
                                                case '3':
                                                    echo '<span class="label label-danger">';
                                                    echo "Suspendido";
                                                    break;
                                                default:
                                                    break;
                                            }
                                        ?>    
                                            </span></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="collapse" id="estadoCuenta">
                        <h4>Estado de Cuenta</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Concepto</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ventas as $venta){ ?>
                                <tr>
                                    <td><span class="label label-success"><?php echo $venta->fecha?></span></td>
                                    <td><?php echo $venta->nArticulo?></td>
                                    <td><?php echo $venta->precio?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- Fin -->
        </div>
    </div>
</div>