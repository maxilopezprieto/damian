<div class="container show-top-margin separate-rows tall-rows">
	<div class="row row-offcanvas row-offcanvas-right">
		<div class="col-xs-12 col-sm-12 col-lg-12">
			<div class="page-header clearfix">
				<div class="row">
					<div class="col-xs-9 col-sm-9 col-lg-9">
						<h2 class="pull-left">Clientes</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-sm-2">
									<a button type="button" class="btn btn-success" href="altaCliente">
										<span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</a>
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
							<th>Nombre y Apellido</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>Celular</th>
							<th class="col-sm-3"></th>
						</tr>
					</thead>
					<tbody>
					    <?php
					       foreach ($clientes as $cliente){?>
					           <tr>
					           <td><?php echo $cliente->id?></td>
					           <td><?php echo $cliente->nombre?></td>
					           <td><?php echo $cliente->direccion?></td>
					           <td><?php echo $cliente->telefono?></td>
					           <td><?php echo $cliente->celular?></td>
					           <td class="text-left col-sm-3">
                               <a button href="verCliente?id=<?php echo $cliente->id?>" type="button" class="btn btn-primary" aria-label="Left Align">
                               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                               </button>
                               <a href="bajaLogica?id=<?php echo $cliente->id?>" button type="button" class="btn btn-warning" aria-label="Left Align">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                               </button></td>
					       <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>