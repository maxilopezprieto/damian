$(function() {
	var instJSON = base_url(document.base_url) + "getClientesJSON"; //Variable con la URL del action
	var it_works;
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
			$("#hInst").val(ui.item.value);
			$("#id").html(ui.item.value);
			$("#nombre").html(ui.item.nombre);
			$("#direccion").html(ui.item.direccion);
			//TEST
			var mascotasJSON = base_url(document.base_url) + 'getMascotasClienteJSON?idCliente=';
			$(".selector-mascota select").empty();
			$.getJSON(mascotasJSON+$(".cliente-id").text(),function(data){
			    $.each(data, function(id,value){
				$(".selector-mascota select").append('<option value="'+id+'">'+value.nMascota+'</option>');
			    });
			});		
			//FIN TEST
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

//Mascota
var cliente;
	var mascotasJSON = base_url(document.base_url) + 'getMascotasClienteJSON?idCliente=' + cliente;
	alert(mascotasJSON);
	$("#autoMasc").removeAttr("disabled");
	$("#autoMasc").autocomplete({
		source : function(request, response) {
			$.ajax({
				url : mascotasJSON,
				type : "GET",
				dataType : "json",
				data: {term: $("#autoMasc").val()}, //Es el dato por el que va a filtrar
				success : function(data) {
					var array = $.map(data, function(item) {
						return {
							label : item.mNombre, //Es lo que devuelve
							value : item.mNombre
						};
					});
					response($.ui.autocomplete.filter(array, request.term));
				}
			});
		},
		minLength : 2,
		select : function(event, ui) {
			event.preventDefault();
			$(this).val(ui.item.label);
			$("#hMasc").val(ui.item.value); //Es donde va a volcar los datos tal como viene del return de ajax
		},
		change : function(event, ui) {
			if (ui.item == null || ui.item == undefined) {
				$(this).val("");
				$("#hMasc").val(""); //Es donde va a volcar los datos tal como viene del return de ajax. Es hiden
			}
		}
	});

	$("form").submit(function() {
		if ($("autoMasc").val() == "") {
			e.preventDefault();
		}

	});
//FIN Mascota











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