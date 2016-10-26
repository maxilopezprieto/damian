<?php include 'header.php'?>
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-12">
				<div class="jumbotron">
					<h2>Reservas de hoy: Jueves 20</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                <tr>
                  <td><span class="label label-default">10:00</span></td>
                  <td>Corte</td>
                  <td>Juan Perez</td>
				  <td>45454545</td>
                  <td>"Bobby"</td>
				  <td>$ 100</td>
				  <td>
				  <span class="label label-info" data-toggle="modal" data-target="#verMas" aria-label="Left Align">ver mas</span>
				  </td>
                </tr>
                <tr>
                  <td><span class="label label-default">11:00</td>
                  <td>Corte</td>
                  <td>Ramon Ramirez</td>
				  <td>45454545</td>
                  <td>"Rocky"</td>
				  <td>$ 100</td>
				  <td>
				  <span class="label label-info" data-toggle="modal" data-target="#verMas" aria-label="Left Align">ver mas</span>
				  </td>
                </tr>
				<tr>
					<td><span class="label label-default">14:00</td>
					<td>Baño</td>
					<td>Fulano Tal</td>
					<td>45454545</td>
					<td>"Lisa"</td>
					<td>$ 100</td>
				  <td>
				  <span class="label label-info" data-toggle="modal" data-target="#verMas" aria-label="Left Align">ver mas</span>
				  </td>
                </tr>
              </tbody>
            </table>
          </div>
				</div>	
			</div>
		</div>
	</div>
	
	<!-- MODAL -->
	<div class="modal fade" id="verMas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
						<h4>Mascotas</h4>
					</div>
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
							</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
</div>
	
<?php include 'footer.php'?>