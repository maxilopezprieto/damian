jQuery(document).ready(function($) {
		$('#btnEditar').click(function() {
			$('input.editar').removeAttr('readonly');
			$('#submit').removeAttr('disabled');
			$('#idCliente').removeAttr('disabled');
			$('#idRaza').removeAttr('disabled');
			$('#idArticulo').removeAttr('disabled');
		});
	});