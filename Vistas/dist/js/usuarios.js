$(".T").on ("click" ".EditarUsuario", function(){

	var Uid = $(this).attr("Uid");

	var datos = new FormData();
	datos.append("Uid",Uid);

	$.ajax({

		url: "Ajax/usuariosA.php";
		method: "POST",
		data:dattos,
		dataType:"json",
		cache:false,
		contentType:false,
		processData:false,
	})

})