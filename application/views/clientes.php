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
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</button>
								</div>
								<div class="col-sm-3">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Buscar por nombre...">
										<span class="input-group-btn">
											<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>	
				</div>
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
						<tr>
						  <td>101</td>
						  <td>Juan Perez</td>
						  <td>Alvear 114</td>
						  <td>4555-5555</td>
						  <td>156554844</td>
						  <td class="text-left col-sm-3">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verCliente" aria-label="Left Align">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarCliente" aria-label="Left Align">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-danger" aria-label="Left Align" data-toggle="modal" data-target="#eliminarConfirm">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						  </td>
						</tr>
					   <tr>
						  <td>102</td>
						  <td>Juan Perez</td>
						  <td>Alvear 114</td>
						  <td>4555-5555</td>
						  <td>156554844</td>
						  <td class="text-left col-sm-3">
							<button type="button" class="btn btn-primary" aria-label="Left Align">
							<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-warning" aria-label="Left Align">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-danger" aria-label="Left Align">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						  </td>
						</tr>
					   <tr>
						  <td>103</td>
						  <td>Juan Perez</td>
						  <td>Alvear 114</td>
						  <td>4555-5555</td>
						  <td>156554844</td>
						  <td class="text-left col-sm-3">
							<button type="button" class="btn btn-primary" aria-label="Left Align">
							<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-warning" aria-label="Left Align">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
							<button type="button" class="btn btn-danger" aria-label="Left Align">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						  </td>
						</tr>
					  </tbody>
					</table>
				  </div>
			</div>
		</div>
	</div>

<!-- Modal -->
<!-- Nuevo-->
<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="guardar" method="POST">
					<div class="form-group">
						<label for="nombre" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nombre" placeholder="Nombre...">
						</div>
					</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="direccion" placeholder="Dirección...">
					</div>
				</div>
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Teléfono</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="telefono" placeholder="Teléfono...">
					</div>
				</div>
				<div class="form-group">
					<label for="celular" class="col-sm-2 control-label">Celular</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="celular" placeholder="Celular...">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Guardar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</form>
		</div>
    </div>
  </div>
</div>

<!-- Ver-->
<div class="modal fade" id="verCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#mascotas" aria-expanded="false" aria-controls="collapseExample">
						Mascotas
						</a>
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#proximosTurnos" aria-expanded="false" aria-controls="collapseExample">
						Próximos Turnos
						</a>
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#historial" aria-expanded="false" aria-controls="collapseExample">
						Historial Turnos
						</a>
						<a class="btn btn-default" role="button" data-toggle="collapse" href="#estadoCuenta" aria-expanded="false" aria-controls="collapseExample">
						Estado de Cuenta
						</a>
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

<!-- Editar-->
<div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Nuevo Cliente</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="guardar" method="POST">
					<div class="form-group">
						<label for="nombre" class="col-sm-2 control-label">Nombre</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="nombre" value="Juan Perez">
						</div>
					</div>
				<div class="form-group">
					<label for="direccion" class="col-sm-2 control-label">Dirección</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="direccion" value="Alvear 114">
					</div>
				</div>
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Teléfono</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="telefono" value="4555-5555">
					</div>
				</div>
				<div class="form-group">
					<label for="celular" class="col-sm-2 control-label">Celular</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="celular" value="156554844">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Actualizar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</form>
		</div>
    </div>
  </div>
</div>

<!--Eliminar -->
<div class="modal fade bs-example-modal-sm" id="eliminarConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Eliminar</h4>
			</div>
			<div class="modal-body">
				<div class="center-block">
					<p class="text-center">Desea eliminar el cliente $nombreCliente?</p>
				</div>
				<div class="center-block">
					<p class="text-center">
						<button type="button" class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</button>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>