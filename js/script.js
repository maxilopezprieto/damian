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
		$.getJSON('buscarMascotaJSON?idMascota='+$(".selector-mascota select").val(),function(value){
			$("#nMascota").empty();
			$("#nRaza").empty();
			$("#obs").empty();
			$("#nMascota").html(value.nMascota);
			$("#nRaza").html(value.nRaza);
			$("#obs").html(value.obs);
		});
	});

//DATEPICKER
	var salida = $("#datetimepicker").val().replace("/", "-");
	var res = salida.slice(0,9);
	//var getReservasJSON = base_url(document.base_url) + "getReservasJSON/" + res;
	var getReservasJSON = res;
	$('#datetimepicker').blur(function() {

		var $this = $(this);
		var fecha = $this.val();
		var dataString = 'fecha=' + fecha;

		$this.addClass("ui-autocomplete-loading");

			$.ajax({
				url : getReservasJSON,
				type : "GET",
				dataType : "json",
				data : {
					term : salida.slice(0,9)
				},
				success : function(data) {
					var array = $.map(data, function(reserva) {
						return {
							label : reserva.id + " (" + reserva.nCliente + ")",
							value : reserva.id
						};
					});
					response($.ui.autocomplete.filter(array, request.term));
				}
			});


		/*$.ajax({
			type : "GET",
			url : getReservasJSON,
			data : dataString,
			dataType : "json",
			success : function(data) {
				console.log(data);
				$this.removeClass("ui-autocomplete-loading");
				if (data.re) {
					$this.addClass("validation-ok");
					$(".form-required").removeAttr("required");
				} else {
					$(".form-remove").slideDown(500);
				}
			}
		});*/
	});

	$('#dni').focus(function() {
		$(this).removeClass("validation-ok");
		$(".form-remove").slideUp(500);
		$(".form-required").attr("required", "required");
	});

});

function base_url(segment) {
	// get the segments
	pathArray = window.location.pathname.split('/');
	// find where the segment is located
	indexOfSegment = pathArray.indexOf(segment);
	// make base_url be the origin plus the path to the segment
	return window.location.origin + pathArray.slice(0, indexOfSegment).join('/') + '/';
}   