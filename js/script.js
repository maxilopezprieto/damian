$(function() {

	var instJSON = base_url(document.base_url) + "getClientesJSON";
	var mascotasJSON = base_url(document.base_url) + "getMascotasJSON/" + $("#hInst").val();

	$("#autoInst").removeAttr("disabled");

	$("#autoInst").autocomplete({
		source : function(request, response) {
			$.ajax({
				url : instJSON,
				type : "GET",
				dataType : "json",
				data : {
					term : $("#autoInst").val()
				},
				success : function(data) {
					var array = $.map(data, function(item) {
						return {
							label : item.id + " (" + item.nombre + ")",
							value : item.id
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
			$("#hInst").val(ui.item.value);
		},
		change : function(event, ui) {
			if (ui.item == null || ui.item == undefined) {
				$(this).val("");
				$("#hInst").val("");
			}
		}
	});

	$("form").submit(function() {
		if ($("autoInst").val() == "") {
			e.preventDefault();
		}

	});

//Mascota
	$("#autoMasc").removeAttr("disabled");
	$("#autoMasc").autocomplete({
		source : function(request, response) {
			$.ajax({
				url : mascotasJSON,
				type : "GET",
				dataType : "json",
				data : {
					term : $("#autoMasc").val()
				},
				success : function(data) {
					var array = $.map(data, function(mascota) {
						return {
							label : mascota.id + " (" + mascota.nmascota + ")",
							value : mascota.id
						};
					});
					response($.ui.autocomplete.filter(array, request.term));
				}
			});
		},
		minLength : 4,
		select : function(event, ui) {
			event.preventDefault();
			$(this).val(ui.mascota.label);
			$("#hMasc").val(ui.mascota.value);
		},
		change : function(event, ui) {
			if (ui.mascota == null || ui.mascota == undefined) {
				$(this).val("");
				$("#hMasc").val("");
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
	var reservasJSON = base_url(document.base_url) + "getReservasJSON/" + res;
	$('#datetimepicker').blur(function() {

		var $this = $(this);
		var fecha = $this.val();
		var dataString = 'fecha=' + fecha;

		$this.addClass("ui-autocomplete-loading");

		$.ajax({
			type : "POST",
			url : reservasJSON,
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
		});
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