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
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoCliente">
										<span class="glyphicon glyphicon-plus"></span> Nuevo Cliente
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
					    <!-- Inicio de código dinámico -->
					    
					    <?php
					       foreach ($clientes as $cliente){?>
					           <tr>
					           <td><?php echo $cliente->id?></td>
					           <td><?php echo $cliente->nombre?></td>
					           <td><?php echo $cliente->direccion?></td>
					           <td><?php echo $cliente->telefono?></td>
					           <td><?php echo $cliente->celular?></td>
					           <td class="text-left col-sm-3">
                               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verCliente" aria-label="Left Align">
                               <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                               </button>
                               <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarCliente" aria-label="Left Align">
                               <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                               </button>
                               <button type="button" class="btn btn-danger" aria-label="Left Align" data-toggle="modal" data-target="#eliminarConfirm">
                               <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                               </button></td>
					       <?php } ?>
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
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title">Nuevo Cliente</h4>
			</div>
			<div class="modal-body" id="myModalBody">
				<div id="modalForm">
					<?php
                    $attributes = array("name" => "contact_form", "id" => "contact_form");
                    echo form_open("panel_controller/altaCliente", $attributes);
                ?>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" id="nombre" placeholder="Nombre..." value="<?php echo set_value('nombre'); ?>">
					</div>
					<div class="form-group">
						<label for="direccion">Dirección</label>
						<input type="text" class="form-control" id="direccion" placeholder="Dirección..." value="<?php echo set_value('direccion'); ?>">
					</div>
					<div class="form-group">
						<label for="telefono">Teléfono</label>
						<input type="text" class="form-control" id="telefono" placeholder="Teléfono..." value="<?php echo set_value('telefono'); ?>">
					</div>
					<div class="form-group">
						<label for="celular">Celular</label>
						<input type="text" class="form-control" id="celular" placeholder="Celular..." value="<?php echo set_value('celular'); ?>">
					</div>
					<div id="alert-msg"></div>
					<div class="success" id="success"></div>
					<div class="modal-footer">
						<input class="btn btn-default" id="submit" name="submit" type="button" value="Agregar" />
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Cancelar
						</button>
					</div>
					<?php echo form_close(); ?>
				</div>
				<div id="modalResult" class="hidden"></div>
			</div>
		</div>
	</div>
</div>

<!-- Ver-->
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

<!-- Editar-->
<div class="modal fade" id="editarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
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
							<button type="submit" class="btn btn-success">
								Actualizar
							</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">
								Cancelar
							</button>
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
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Eliminar</h4>
			</div>
			<div class="modal-body">
				<div class="center-block">
					<p class="text-center">
						Desea eliminar el cliente $nombreCliente?
					</p>
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
<!--load jquery & bootstrap js files-->
<script type="text/javascript" src="<?php echo base_url("js/jquery-1.12.4.min.js"); ?>"></script>
<script src="<?php echo base_url("js/bootstrap.min.js"); ?>"></script>
<script type="text/javascript">
	$('#submit').click(function() {
var form_data = {
nombre: $('#nombre').val(),
direccion: $('#direccion').val(),
telefono: $('#telefono').val(),
celular: $('#celular').val()
};
$.ajax({
url: "<?php echo site_url('panel_controller/altaCliente'); ?>
	",
	type: 'POST',
	data: form_data,
	dataType: "json",
	success: function(data) {
	if (data.msg){
	$('#modalResult').html('<div class="alert alert-success text-center">'+data.txt+'</div>').removeClass('hidden');
	$('#modalForm').addClass('hidden');
	}else{
	$('#alert-msg').html('<div class="alert alert-danger">' + data.txt + '</div>');
	}
	},
	error: function(data){
	console.log($.parseJSON(data.responseText));
	}
	});
	return false;
	});
	$('#nuevoCliente').on('hidden.bs.modal',function(){
	$('#modalResult').html('').addClass('hidden');
	$('#modalForm').removeClass('hidden');
	$('#contact_form')[0].reset();
	$('#alert-msg').html('');
	});
</script>