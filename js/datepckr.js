	//var salida = $("#datetimepicker").val().replace("/", "-");
	//var res = salida.slice(0,9);
	//var getReservasJSON = base_url(document.base_url) + "getReservasJSON/" + res;
	//var getReservasJSON = res;
	
	var reservas = base_url(document.base_url) + "getReservasJSON?fecha=" + $("#datetimepicker").val();
	
	$("#boton").click(function() {
	  alert( "Handler for .click() called." );
	});
	
	$('#datetimepicker').blur(function() {
		alert("pichu");
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

	/*
	$('#dni').focus(function() {
		$(this).removeClass("validation-ok");
		$(".form-remove").slideUp(500);
		$(".form-required").attr("required", "required");
	});
	*/
});