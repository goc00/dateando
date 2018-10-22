$(document).ready(function() {
	
	var processing = false; // semáforo para controlar único proceso
	
	$('#datetimepicker1').datepicker({
		format: 'dd/mm/yyyy',
		todayHighlight: true,
		autoclose: true
	});
	
	$("#more-logged-in-top").click(function() {
		var target = $("div.logged-in-top");
		target.toggle();
	});
	
	// Publicar dato
	$("#frmSubirDato").submit(function() {
		
		if(!processing) {
			
			processing = true;
		
			var $frm = $(this); 
			$.ajax( {
				type: 'POST',
				url: $frm.attr("action"),
				data: new FormData(this),
				processData: false,
				contentType: false, // no content type header
				cache: false,
				dataType: 'json',
				success: function(response) {
					
					if(response.exito == "si") {
						var func = function() {
							location.href = response.resultado;
						};
						displayMessage(response.mensaje, "ok", false, func);
					} else {
						processing = false; // libera proceso
						displayMessage(response.mensaje, "error", false, null);
					}

				}
			});
		}
		
		return false;
	});
	
	
	// Autentificación normal de usuario
	$("#frmLogin").submit(function() {
		var func = function(data) {
			if(data.exito == "si") {
				var func2 = function() {
					location.href = data.go;
				};
				displayMessage(data.mensaje, "ok", false, func2);
				
			} else {
				displayMessage(data.mensaje, "error", false, null);
			}
		};
		processNormalFormJson($(this), func);
		return false;
	});
	
	// Registro de usuario
	$("#frmRegistro").submit(function() {
		var func = function(data) {
			if(data.exito == "si") {
				var func2 = function() {
					location.href = data.go;
				};
				displayMessage(data.mensaje, "ok", false, func2);
				
			} else {
				displayMessage(data.mensaje, "error", false, null);
			}
		};
		processNormalFormJson($(this), func);
		return false;
	});
	
	
	// Lógica para autentificación con Facebook
	$("#login-fb").click(function(e) {

		// Verifica si existe conexión con Facebook
		FB.getLoginStatus(function(response) {
			
			var $status = response.status;

			if ($status === 'connected') {
				// Conectado
				FB.api('/me', {fields: 'name, email'}, function(responseFb) {
					// Genera session con info desde Fb
					processFb(responseFb.name, responseFb.email, responseFb.id);
				});
			} else if($status === 'not_authorized' || $status === 'unknown') {
				
				// Está autentificado en Facebook, pero no en la app
				$("#login-fb").fadeOut("fast", function() {
					$("#login-aceptar-fb").fadeIn("fast", function() {
						
						var ref = $(this);
						ref.click(function() {
							
							//var action = ref.data("action"); // action
							
							FB.login(
								function(response) {
									if(response.authResponse) {
										// Se aceptó, así que se trae la info necesaria
										FB.api('/me', {fields: 'name, email'}, function(responseMe) {
											processFb(responseMe.name, responseMe.email, responseMe.id);
										});

									} else {
										// Presiona cancelar
										displayMessage("No has autorizado a la aplicación.", "error", false, null);
									}

								},
								{scope: 'public_profile,email'}
							);
						});
						
					});
				});
		
			}
		
			
		});

		e.preventDefault();
	});
	
	
	// Ver más (datos)
	$("#verMasBtn").click(function() {
		
		// Obtiene último elemento
		var last = $("#listDatos").children("div").last();
		var id = last.data("order");
		
		var $obj = {
				"order" : id,
				"criterio" : window.location.pathname
			};
	
		var $func = function(data) {
			if(data.errCode == 0) {
				$("#listDatos").append(data.result);
			} else {
				displayMessage(data.errMessage, "error", false, null);
			}
		};
		
		//var uri = location.
		
		doPost($(this).data("action"), $obj, $func);

	});
	
	// Agregar a favoritos
	$(document).on("click", ".add-fav", function(e) {
		
		e.preventDefault();
		
		var $id = $(this).data("fav");
		
		// Envía identificador
		var $obj = {
				"id" : $id
			};
	
		var $func = function(data) {
			if(data.errCode == 0) {
				displayMessage(data.result, "ok", false, null);
			} else {
				displayMessage(data.errMessage, "error", false, null);
			}
		};

		doPost($(this).data("fav-action"), $obj, $func);

	});
	
	
});
function processNormalFormJson($this, $func) {
	var $action = $this.attr("action");
	doPost($action, $this.serialize(), $func);
}

/**
 * Despliega mensaje y permite invocar una función luego de terminar
 * el despliegue de este (si es que no llega como detenido)
 *
 * @access public
 * @return void
 */
function displayMessage(msg, error, stop, func) {

	var div = $("#div-info");
	var color = (error == "ok") ? "#090" : "#b00";
	var segundos = 3;
	
	div.css("background-color", color);
	div.html(msg);
	
	if(stop) {
		div.slideDown("fast");
	} else {
		if(func != null) div.slideDown("fast").delay(segundos*1000).slideUp("fast", func);
		else div.slideDown("fast").delay(segundos*1000).slideUp("fast");
	}
}

function doPost($action, $obj, $function) {
	
	$.post(
		$action,
		$obj,
		function(data) { $function(data) },
		"json"
	);
	
}

function processFb(name, email, id) {
	
	var $action = $("#login-aceptar-fb").data("action"); // action
	var seg = 2;
		
	var obj = {
				"name" : name,
				"email" : email,
				"id" : id
			};
	
	var func = function(data) {
		if(data.exito == "si") {
			displayMessage(data.mensaje, "ok", true);
			setTimeout(function (){
				location.href = data.go;
			}, seg*1000);
		} else {
			displayMessage(data.mensaje, "error", false, null);
		}
	};
	
	doPost($action, obj, func);
}
function mensaje(obj) {
	obj.setCustomValidity('Debes completar el campo');
}