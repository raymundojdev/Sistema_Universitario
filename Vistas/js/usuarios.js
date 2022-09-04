$(".T").on("click", ".EditarUsuario", function(){

	var Uid= $(this).attr("Uid");

	var datos = new FormData();
	datos.append("Uid", Uid);

	$.ajax({

		url: "Ajax/usuariosA.php",
		method: "POST",
		data: datos,
		dataType:"json",
		cache:false,
		contentType:false,
		processData:false,

		success: function(resultado){

		$("#Uid").val(resultado["id"]);

		$("#apellidoEU").val(resultado["apellido"]);
		$("#nombreEU").val(resultado["nombre"]);
		$("#usuarioEU").val(resultado["libreta"]);
		$("#claveEU").val(resultado["clave"]);

		if(resultado["rol"] == "Administrador"){
			$("#carrera").hide();
		}else{
			$("#carrera").show();
		}
		
		$("#rolActual").html("Rol Actual: " +resultado["rol"]);

		$("#rol").val(resultado["rol"]);
		$("#rol").hide();

		$("#carr").val(resultado["id_carrera"]);
		$("#carr").hide();

		}


	})
})

$(".T").on("click", ".EliminarUsuario", function(){

	var Uid = $(this).attr("Uid");

	window.location = "index.php?url=usuarios&Uid= "+Uid;
})

$("#libreta").change(function(){

	$(".alert").remove();

	var libreta = $(this).val();

	var datos = new FormData();
	datos.append("verificarLibreta", libreta);

	$.ajax({

		url: "Ajax/usuariosA.php",
		method: "POST",
		data: datos,
		dataType:"json",
		cache:false,
		contentType:false,
		processData:false,

		success: function(resultado){
			if (resultado) {

				$("#libreta").parent().after('<div class="alert alert-danger">La libreta o Usuario ya existe.</div>');

				$("#libreta").val("");

			}
		}
	})
})