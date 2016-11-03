<div class="container show-top-margin separate-rows tall-rows">
    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="page-header clearfix">
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-lg-9">
                        <h2 class="pull-left"><?php echo $articulo->nombre?></h2>
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
                    <form action="doEditarArticulo" method="post">
                        <input type="hidden" name="id" value="<?php echo $articulo->id?>">
                        <input type="hidden" name="activo" value="<?php echo $articulo->activo?>">
                        <table class="table table-bordered">
                            <tr>
                                <th class="text-right header_table">#</th>
                                <td><?php echo $articulo->id?></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Nombre</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="nombre" placeholder="Nombre..." value="<?php echo $articulo->nombre; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Descripción</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="descripcion" placeholder="Descripción..." value="<?php echo $articulo->descripcion; ?>"></td>
                            </tr>
                            <tr>
                                <th class="text-right header_table">Precio</th>
                                <td><input type="text" class="form-control editar" readonly="readonly" name="precio" placeholder="Precio..." value="<?php echo $articulo->precio; ?>"></td>
                            </tr>
                        </table>
                        <input class="btn btn-default" id="submit" type="submit" value="Editar" disabled/>
                    </form>
                </div>
        </div>
    </div>
</div>