<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left"><?php echo $mascota->nMascota?></h2>
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
                    <form action="doEditarMascota" method="post">
                        <input type="hidden" name="id" value="<?php echo $mascota->id?>">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-right header_table">#</th>
                                <td><?php echo $mascota->id?></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table"># Cliente</th>
                                <!--<td><input type="text" class="form-control editar" readonly="readonly" name="idCliente" placeholder="idCliente" value="<?php echo $mascota->idCliente; ?>"></td>-->
                                <td><select id="idCliente" name="idCliente" class="form-control editar" disabled="disabled">
                            <?php foreach ($clientes as $cliente) {?>
                                <option value="<?php echo $cliente->id?>"<?php 
                                        if($mascota->idCliente == $cliente->id){
                                            echo "selected";
                                        }
                                    ?>>
                                    <?php 
                                        echo $cliente->id;
                                        echo ' ('.$cliente->nombre.' )';
                                    ?></option>
                            <?php } ?>
                                </select></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Nombre</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="nombre" placeholder="Nombre..." value="<?php echo $mascota->nMascota; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Raza</th>
                                <!--<td><input type="text" class="form-control editar" readonly="readonly" name="idRaza" placeholder="Teléfono..." value="<?php echo $mascota->nRaza; ?>"></td>-->
                                <td><select id="idRaza" name="idRaza" class="form-control editar" disabled="disabled" required>
                                <?php foreach ($razas as $raza) {?>
                                <option value="<?php echo $raza->id?>"<?php 
                                        if($mascota->idRaza == $raza->id){
                                            echo "selected";
                                        }
                                    ?>>
                                    <?php echo $raza->nombre?>
                                </option><?php } ?>
                                </select></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Observaciones</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="obs" placeholder="Observaciones..." value="<?php echo $mascota->obs; ?>"></td>
                            </tr>
                        </table>
                        <input class="btn btn-default" id="submit" type="submit" value="Editar" disabled/>
                    </form>
                </div>
        </div>
    </div>
</div>