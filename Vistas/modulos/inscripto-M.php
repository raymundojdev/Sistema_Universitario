<?php

$exp = explode("/", $_GET["url"]);

if($_SESSION["id_carrera"] != $exp[1]){

	echo '<script>

	window.location = "http://localhost/universidad/inicio";
	</script>';

	return;

}


?>


<div class="content-wrapper">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				

					<?php

					$exp = explode("/", $_GET["url"]);

					$columna = "id";
					$valor = $exp[2];

					$materia = MateriasC::VerMaterias2C($columna, $valor);

					echo '<h2>Materia: <br><br> '.$materia["nombre"].'</h2>
					

					<div class="row">
						
						<div class="col-md-6 col-xs-12">
							
							<h2>Código: '.$materia["codigo"].'</h2>

							<h2>Grado: '.$materia["grado"].'</h2>

						</div>

						<div class="col-md-6 col-xs-12">
							
							<h2>Tipo: '.$materia["tipo"].'</h2>';


						$columna = "id_materia";
						$valor = $exp[2];

						$insC = MateriasC::VerInscMateriasC($columna, $valor);

						foreach ($insC as $key => $C) {
							
							if($C["id_alumno"] == $_SESSION["id"]){

								$columna = "id";
								$valor = $C["id_comision"];

								$comision = MateriasC::VerComisiones2C($columna, $valor);

								echo '<h2>Su Comisión: </h2><h3>'.$comision["dias"].' - '.$comision["horario"].'</h3>';

							

								echo '<br><br>

								<div class="alert alert-success">Usted ya está inscripto a esta Materia...</div>

								<a href="http://localhost/universidad/inscripto-M/'.$exp[1].'/'.$exp[2].'/'.$C["id"].'">

									<button class="btn btn-danger">Dar de Baja</button>

								</a>
								';

							}

						}
						


					?>


						</div>

					</div>


			</div>

		</div>

	</section>

</div>


<?php

$borrarI = new MateriasC();
$borrarI -> BorrarInscMC();