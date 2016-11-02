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

<!-- Ver DEPRECATED-->
<div class="modal fade" id="verCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Juan Perez</h4>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th class="text-right header_table">ID Cliente</th>
							<td>101</td>
						</tr>
						<tr>
							<th class="text-right header_table">Nombre y Apellido</th>
							<td>Juan Perez</td>
						</tr>
						<tr>
							<th class="text-right header_table">Dirección</th>
							<td>Alvear 114</td>
						</tr>
						<tr>
							<th class="text-right header_table">Teléfono</th>
							<td>4555-5555</td>
						</tr>
						<tr>
							<th class="text-right header_table">Celular</th>
							<td>156554844</td>
						</tr>
					</table>
					<div class="page-header">
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#mascotas" aria-expanded="false" aria-controls="collapseExample"> Mascotas </a>
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#proximosTurnos" aria-expanded="false" aria-controls="collapseExample"> Próximos Turnos </a>
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#historial" aria-expanded="false" aria-controls="collapseExample"> Historial Turnos </a>
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#estadoCuenta" aria-expanded="false" aria-controls="collapseExample"> Estado de Cuenta </a>
					</div>
					<div class="collapse" id="mascotas">
						<h4>Mascotas</h4>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Raza</th>
									<th>Observaciones</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Bobby</td>
									<td>Labrador</td>
									<td>Alérgico al shampoo</td>
								</tr>
								<tr>
									<td>Lisa</td>
									<td>Pekinés</td>
									<td>S/D</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="collapse" id="proximosTurnos">
						<h4>Próximos Turnos</h4>
						<table class="table table-striped">
							<tbody>
								<tr>
									<td><span class="label label-info">30/10/16</span></td>
									<td>14:00</td>
									<td>Corte</td>
									<td>"Bobby"</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="collapse" id="historial">
						<h4>Historial de Trabajos</h4>
						<table class="table table-striped">
							<tbody>
								<tr>
									<td><span class="label label-success">01/10/16</span></td>
									<td>14:00</td>
									<td>Corte</td>
									<td>"Bobby"</td>
									<td><span class="label label-success">Hecho</span></td>
								</tr>
								<tr>
									<td><span class="label label-danger">10/10/16</span></td>
									<td>14:00</td>
									<td>Corte</td>
									<td>"Bobby"</td>
									<td><span class="label label-danger">Suspendido</span></td>
								</tr>
								<tr>
									<td><span class="label label-warning">20/10/16</span></td>
									<td>11:00</td>
									<td>Corte</td>
									<td>"Bobby"</td>
									<td><span class="label label-warning">Postergado 31/10/16</span></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="collapse" id="estadoCuenta">
						<h4>Estado de Cuenta</h4>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Concepto</th>
									<th>Monto</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><span class="label label-success">01/10/16</span></td>
									<td>Abono 3x2</td>
									<td>$ 300</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>