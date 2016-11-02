<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left">Nuevo Cliente</h2>
                    </div>
                </div>
            </div>
            <?php if (validation_errors()){?><div class="alert alert-danger" style="width: 350px; margin: 0 auto;"><?php echo validation_errors();?></div><?php }?>
            <div id="form" style="width: 350px; margin: 0 auto;">
                    <form action="doaltacliente" method="post">
                        <div class="form-group" style="width: 350px">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre..." value="<?php echo set_value('nombre'); ?>">
                        </div>
                        <div class="form-group" style="width: 350px">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" placeholder="Dirección..." value="<?php echo set_value('direccion'); ?>">
                        </div>
                        <div class="form-group" style="width: 350px">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" name="telefono" placeholder="Teléfono..." value="<?php echo set_value('telefono'); ?>">
                        </div>
                        <div class="form-group" style="width: 350px">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" name="celular" placeholder="Celular..." value="<?php echo set_value('celular'); ?>">
                        </div>
                        <input type="hidden" name="activo" value="1">
                        <div class="modal-footer" style="width: 350px">
                            <input class="btn btn-default" type="submit" value="Agregar" />
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>