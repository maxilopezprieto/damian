$(function() {
	var instJSON = base_url(document.base_url) + "getClientesJSON"; //Variable con la URL del action
	$("#autoInst").removeAttr("disabled"); //Al principio figura como DISABLED y esto lo activa. No se por que
	$("#autoInst").autocomplete({ //Le dice que a lo q se llama autoInst lo va a autocompletar con lo q sigue
		source : function(request, response) {
			$.ajax({
				url : instJSON, //Donde apunta
				type : "GET", //Método de envpio
				dataType : "json", //Valor que espera recibir
				data : { //Dato que va a enviar-> variable: valor (en este caso tomado del campo que empecé a escribir)
					term : $("#autoInst").val()
				},
				success : function(data) { //En el caso de éxito:
					var array = $.map(data, function(item) { //La respuesta es un JSON completo
						return {
							label : item.id,
							value : item.id,
							nombre : item.nombre,
							direccion : item.direccion
						};
					});
					response($.ui.autocomplete.filter(array, request.term)); //El valor que retorna
				}
			});
		},
		minLength : 1,
		select : function(event, ui) {
			event.preventDefault();
			$(this).val(ui.item.label);
			$("#nMascota").empty();
			$("#nRaza").empty();
			$("#obs").empty();
			$("#hInst").val(ui.item.value);
			$("#id").html(ui.item.value);
			$("#nombre").html(ui.item.nombre);
			$("#direccion").html(ui.item.direccion);
			var mascotasJSON = base_url(document.base_url) + 'getMascotasClienteJSON?idCliente=';
			$(".selector-mascota select").empty();
			$(".selector-mascota select").append('<option value="">Seleccione</option>');
			$.getJSON(mascotasJSON+$(".cliente-id").text(),function(data){
			    $.each(data, function(id,value){
					$(".selector-mascota select").append('<option value="'+value.id+'">'+value.nMascota+'</option>');
			    });
			});
		},
		change : function(event, ui) {
			if (ui.item == null || ui.item == undefined) {
				$(this).val("");
				$("#hInst").val("");
				$("#hInst2").html("");
			}
		}
	});
	$("form").submit(function() {
		if ($("autoInst").val() == "") {
			e.preventDefault();
		}
	});

	$(".selector-mascota select").change(function() {
		$.getJSON(base_url(document.base_url) + 'buscarMascotaJSON?idMascota='+$(".selector-mascota select").val(),function(value){
			$("#nMascota").empty();
			$("#nRaza").empty();
			$("#obs").empty();
			$("#nMascota").html(value.nMascota);
			$("#nRaza").html(value.nRaza);
			$("#obs").html(value.obs);
		});
	});
});

	$("#datetimepicker").blur(function() {
			var salida = $("#datetimepicker").val().replace("///g", "-");
			var res = salida.slice(0,10);
			var envio = 'getReservasJSON?fecha='+res;
			$.getJSON(base_url(document.base_url) + envio, function(data){
			    $.each(data, function(id,value){ //Tira el último, debe generar cada fila
					$("#clientet").html(value.nCliente);
					$("#nMascotat").html(value.nMascota);
					$("#nArticulot").html(value.nArticulo);
					$("#fechat").html(value.fecha);
					$("#horat").html(value.hora);
			    });
			});
	});
	
	$("#datetimepicker").change(function () {
					$("#clientet").empty();
					$("#nMascotat").empty();
					$("#nArticulot").empty();
					$("#fechat").empty();
					$("#horat").empty();		
	});

function base_url(segment) {
	pathArray = window.location.pathname.split('/');
	indexOfSegment = pathArray.indexOf(segment);
	return window.location.origin + pathArray.slice(0, indexOfSegment).join('/') + '/';
}   