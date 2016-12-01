<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left">Nueva Reserva</h2>
                    </div>
                </div>
            </div>
            <?php if (validation_errors()){?><div class="alert alert-danger" style="width: 350px; margin: 0 auto;"><?php echo validation_errors();?></div><?php }?>
            <div style="width: 350px; margin: 0 auto;">
                    <form name="form" id="form" action="altaReserva" method="post">
                            <div class="form-group form-required" style="width: 350px">
                                <label for="datetime">Seleccione fecha</label>
                                <input type="text" class="form-control" id="datetimepicker" name="datetime" placeholder="Fecha y Hora value="<?php echo set_value('nombre'); ?>">
                            </div>
                            <div class="modal-footer" style="width: 350px">
                                <input class="btn btn-default" type="submit" value="Ver Reservas" />
                            </div>
                            <label id="reservaDe"></label>
                            

            <div class="form-group">
                <label for="autoInst">Cliente:</label>
                <input required="required" class="form-control form-required ui-autocomplete-input" id="autoInst" type="text" name="autoInst" placeholder="Comience a escribir..." autocomplete="off" disabled="disabled"/>
                <input id="hInst" name="cliente" type="hidden" value=""/>
                <div id="id" name="id"></div>
                <div id="nombre" name="nombre"></div>
                <div id="direccion" name="direccion"></div>
                <!--<button type="button" id="getMascota" name="getMascota" class="btn btn-primary">Primary</button>-->
                <div id="idMascota" name="idMascota"></div>
                <div id="nombreMascota" name="nombreMascota"></div>
            </div>
            
            <div class="form-group">
                <label for="autoMasc">Mascota:</label>
                <input required="required" class="form-control form-required ui-autocomplete-input" id="autoMasc" type="text" name="autoMasc" placeholder="Comience a escribir..." autocomplete="off" disabled="disabled"/>
                <input id="hMasc" name="mascota" type="hidden" value=""/>
            </div>
            
            <div class="autoMasc2">
     			Mascota:
     		<select></select>
</div>
                    </form>
            </div>
        </div>
    </div>
</div>