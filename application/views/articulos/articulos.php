<div class="container show-top-margin separate-rows tall-rows">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-12 col-lg-12">
			<div class="page-header clearfix">
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-lg-9">
						<h2 class="pull-left">Artículos</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-sm-2">
									<a button type="button" class="btn btn-success" href="altaArticulo">
										<span class="glyphicon glyphicon-plus"></span> Nuevo Artículo</a>
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
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th class="col-sm-3"></th>
						</tr>
					</thead>
					<tbody>
					    <?php
					       foreach ($articulos as $articulo){?>
					           <tr>
					           <td><?php echo $articulo->id?></td>
					           <td><?php echo $articulo->nombre?></td>
					           <td><?php echo $articulo->descripcion?></td>
					           <td><?php echo $articulo->precio?></td>
					           <td class="text-left col-sm-3">
                               <a button href="verArticulo?id=<?php echo $articulo->id?>" type="button" class="btn btn-primary" aria-label="Left Align">
                               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                               </button>
                               <a href="bajaLogicaArticulo?id=<?php echo $articulo->id?>" button type="button" class="btn btn-warning" aria-label="Left Align">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                               </button></td>
					       <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>