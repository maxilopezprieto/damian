<?php include 'header.php'?>
	<div class="container show-top-margin separate-rows tall-rows">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-12">
				<div class="page-header clearfix">
					<div class="row">
						<div class="col-xs-9 col-sm-9">
							<h2 class="pull-left">Artículos</h2>
						</div>
					</div>
					<div class="row">
					<div class="col-xs-12 col-sm-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-sm-2">
									<a data-toggle="collapse" aria-expanded="false" aria-controls="" href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nueva Artículo</a>
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
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Precio</th>
							<th class="col-sm-3"></th>
						</tr>
					</thead>
					  <tbody>
						<tr>
						  <td>3101</td>
						  <td>Corte</td>
						  <td>Corte general</td>
						  <td>$ 100</td>
						  <td class="text-left col-sm-3">
							<button type="button" class="btn btn-success" aria-label="Left Align">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
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
						  <td>3102</td>
						  <td>Baño</td>
						  <td>Baño General</td>
						  <td>$ 120</td>
						  <td class="text-left col-sm-3">
							<button type="button" class="btn btn-success" aria-label="Left Align">
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
						  <td>3103</td>
						  <td>Eukanuba Puppy Large Breed</td>
						  <td>Alimento Balanceado</td>
						  <td>$ 50</td>
						  <td class="text-left col-sm-3">
							<button type="button" class="btn btn-success" aria-label="Left Align">
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
<?php include 'footer.php'?>