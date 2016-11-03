<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left">Nueva Mascota</h2>
                    </div>
                </div>
            </div>
            <?php if (validation_errors()){?><div class="alert alert-danger" style="width: 350px; margin: 0 auto;"><?php echo validation_errors();?></div><?php }?>
            <div id="form" style="width: 350px; margin: 0 auto;">
                    <form action="doaltamascota" method="post">
                        <div class="form-group" style="width: 350px">
                            <label for="idCliente"># Cliente</label>
                            <select name="idCliente" class="form-control form-required" required>
                                <option value="" selected hidden>-Seleccione una opción-</option>
                            <?php foreach ($clientes as $cliente) {?>
                                <option value="<?php echo $cliente->id?>">
                                    <?php 
                                        echo $cliente->id;
                                        echo ' ('.$cliente->nombre.' )';
                                    ?></option>
                            <?php } ?>
                                </select>
                        </div>
                        <div class="form-group form-required" style="width: 350px">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre..." value="<?php echo set_value('nombre'); ?>">
                        </div>
                        <div class="form-group form-required" style="width: 350px">
                            <label for="raza">Raza</label>
                            <select name="idRaza" class="form-control" required>
                                <option value="" selected hidden>-Seleccione una opción-</option>
                                <?php foreach ($razas as $raza) {?>
                                <option value="<?php echo $raza->id?>"><?php echo $raza->nombre
                                    ?></option>
                                <?php } ?>
                                </select>
                        </div>
                        <div class="form-group" style="width: 350px">
                            <label for="obs">Observaciones</label>
                            <input type="text" class="form-control" name="obs" placeholder="Observaciones..." value="<?php echo set_value('obs'); ?>">
                        </div>
                        <div class="modal-footer" style="width: 350px">
                            <input class="btn btn-default" type="submit" value="Agregar" />
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>