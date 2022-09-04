<?php 

if($_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;
}

?>
<div class="content-wrapper">
	
	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<div class="row">
					
					<div class="col-md-6 col-xs-12">

						<?php 

						 $columna = "id";
				         $valor = 1;

				         $resultado = AjustesC::VerAjustesC($columna, $valor);

				         echo '<h2>Cuatrimestre Actual: '.$resultado["cuatrimestre"].'</h2>

						<form method="post">
							
							<button type="submi" class="btn btn-primary">1er Cuatrimestre</button>

							<input type="hidden" name="cuatrimestreA" value="1er Cuatrimestre">';

						$cuatrimestre = new AjustesC();
						$cuatrimestre -> CambiarCuatrimestreC();

						echo '</form>

						<br>

						<form method="post">
							
							<button type="submi" class="btn btn-success">2do Cuatrimestre</button>

							<input type="hidden" name="cuatrimestreA" value="2do Cuatrimestre">';

							$cuatrimestre = new AjustesC();
						$cuatrimestre -> CambiarCuatrimestreC();

						echo '</form>

						<br>

						<form method="post">
							
						<h2>1er Cuatrimestre

						<h3>Inicio:<input type="text" class="input-md" name="1_fecha_inicio" value="'.$resultado["1_fecha_inicio"].'"></h2></h3>

						<h3>Fin:<input type="text" class="input-md" name="1_fecha_fin" value="'.$resultado["1_fecha_fin"].'"></h2></h3>

							<br>

						<h2>2do Cuatrimestre

						<h3>Inicio:<input type="text" class="input-md" name="2_fecha_inicio" value="'.$resultado["2_fecha_inicio"].'"></h3>

						<h3>Fin:<input type="text" class="input-md" name="2_fecha_fin" value="'.$resultado["2_fecha_fin"].'"></h3>

					</div>
					
					<div class="col-xs-12 col-md-6">
						<br>

						<h2> Fechas de Examenes Proximas:</h2>

						<h3>Desde:<input type="text" class="input-md" name="examenes_i" value="'.$resultado["examenes_i"].'"></h3>

						<h3>Hasta:<input type="text" class="input-md" name="examenes_f" value="'.$resultado["examenes_f"].'"></h3>

						<br>

						<h2> Fechas para Inscripción a Materias:</h2>

						<h3>Desde:<input type="text" class="input-md" name="materias_i" value="'.$resultado["materias_i"].'"></h3>

						<h3>Hasta:<input type="text" class="input-md" name="materias_f" value="'.$resultado["materias_f"].'"></h3>

					
						</div>					

					<br>

					<button type="submit" class="btn btn-success btn-lg ">Guardar Cambios</button>';

					$guardarAjustes = new AjustesC();
					$guardarAjustes -> ActualizarAjustesC();

					 ?>			

					</form>
					
				</div>
			</div>
		</div>
	</section>

</div>