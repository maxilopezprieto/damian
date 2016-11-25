<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left"><?php 
                                echo $reserva->fecha;
                                echo " ".$reserva->hora;
                                ?>
                        </h2>
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
                        <input type="hidden" name="id" value="<?php echo $reserva->id?>">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-right header_table">#</th>
                                <td><?php echo $reserva->id?></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Cliente</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="idCliente" placeholder="Nombre..." value="<?php echo $reserva->idCliente; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Mascota</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="nMascota" placeholder="Dirección..." value="<?php echo $reserva->nMascota; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Fecha</th>
                                <td><input type="text" id="datetimepicker" class="form-control editar" readonly="readonly" name="fecha" placeholder="Teléfono..." value="<?php echo $reserva->fecha; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Hora</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="hora" placeholder="Celular..." value="<?php echo $reserva->hora; ?>"></td>
                            </tr>
                        </table>
                        <input class="btn btn-default" id="submit" type="submit" value="Editar" disabled/>
                    </form>
                </div>
        </div>
    </div>
</div>