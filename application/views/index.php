	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			<div class="col-xs-12 col-sm-12">
				<div class="jumbotron">
					<h2>Reservas de hoy: <span class="label label-success"><?php echo date('d-m-y')?></span></h2>
					<br>
          <div class="table-responsive">
            <table class="table table-striped">
              <tbody>
                  <?php foreach ($reservas as $reserva){ ?>
                <tr>
                  <td><span class="label label-default"><?php echo $reserva->hora?></span></td>
                  <td><?php echo $reserva->nArticulo?></td>
                  <td><?php echo $reserva->nCliente?></td>
				  <td><?php echo $reserva->telefono." / ".$reserva->celular;?></td>
                  <td><?php echo $reserva->nMascota?></td>
				  <td><?php echo $reserva->pArticulo?></td>
				  <td>
				  <a href="verCliente?id=<?php echo $reserva->idCliente?>" span class="label label-info" aria-label="Left Align">ver mas</span></a>
				  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
				</div>	
			</div>
		</div>
	</div>