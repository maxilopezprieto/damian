<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left"><?php echo $venta->idVentas?></h2>
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
                    <form action="doEditarVenta" method="post">
                        <input type="hidden" name="id" value="<?php echo $venta->idVentas?>">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-right header_table">#</th>
                                <td><?php echo $venta->idVentas?></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table"># Cliente</th>
                                <!--<td><input type="text" class="form-control editar" readonly="readonly" name="idCliente" placeholder="idCliente" value="<?php echo $mascota->idCliente; ?>"></td>-->
                                <td><select id="idCliente" name="idCliente" class="form-control editar" disabled="disabled">
                            <?php foreach ($clientes as $cliente) {?>
                                <option value="<?php echo $cliente->id?>"<?php 
                                        if($venta->idCliente == $cliente->id){
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
                                <th class="text-right header_table"># Articulo</th>
                                <!--<td><input type="text" class="form-control editar" readonly="readonly" name="idCliente" placeholder="idCliente" value="<?php echo $mascota->idCliente; ?>"></td>-->
                                <td><select id="idArticulo" name="idArticulo" class="form-control editar" disabled="disabled">
                            <?php foreach ($articulos as $articulo) {?>
                                <option value="<?php echo $articulo->id?>"<?php 
                                        if($venta->idArticulo == $articulo->id){
                                            echo "selected";
                                        }
                                    ?>>
                                    <?php 
                                        echo $articulo->nombre;
                                    ?></option>
                            <?php } ?>
                                </select></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Fecha</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="fecha" placeholder="AAA/MM/DD" value="<?php echo $venta->fecha; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Cantidad</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="cantidad" placeholder="Cantidad..." value="<?php echo $venta->cantidad; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Precio Unitario</th>
                                <td><?php echo $venta->precio; ?></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Precio Total</th>
                                <td><?php echo ($venta->cantidad * $venta->precio); ?></td>
                            </tr>
                        </table>
                        <input class="btn btn-default" id="submit" type="submit" value="Editar" disabled/>
                    </form>
                </div>
        </div>
    </div>
</div>