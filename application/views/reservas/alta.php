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
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Mascota</th>
                            <th>Trabajo</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th class="col-sm-3"></th>
                        </tr>
                    </thead> 
                    <tbody>
                        <tr>
                            <th id="clientet"></th>
                            <th id="nMascotat"></th>
                            <th id="nArticulot"></th>
                            <th id="fechat"></th>
                            <th id="horat"></th>
                            <th class="col-sm-3"></th>                           
                        </tr>
                    </tbody>                   
                </table>
            </div>
                            

            <div class="form-group">
                <label for="autoInst">Cliente:</label>
                <input required="required" class="form-control form-required ui-autocomplete-input" id="autoInst" type="text" name="autoInst" placeholder="Comience a escribir..." autocomplete="off" disabled="disabled"/>
                <input id="hInst" name="cliente" type="hidden" value=""/>
                <div id="id" class="cliente-id" name="id"></div>
                <div id="nombre" name="nombre"></div>
                <div id="direccion" name="direccion"></div>
                <div id="idMascota" name="idMascota"></div>
                <div id="nombreMascota" name="nombreMascota"></div>
            </div>

            <div class="form-group">
                <label for="selector-mascota">Seleccionar Mascota:</label>
                <div class="selector-mascota">
                     Elija una Mascota
                     <select><option value="0">Seleccione un cliente</option></select>
                </div>
                <input id="idInput" name="cliente" type="hidden" value=""/>
                <div id="nMascota" name="nMascota"></div>
                <div id="nRaza" name="nRaza"></div>
                <div id="obs" name="obs"></div>
            </div>
                    </form>
            </div>
        </div>
    </div>
</div>