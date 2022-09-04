<?php

if($_SESSION["rol"] != "Administrador"){

	echo '<script>

	window.locations = "inicio";
	</script>';

	return;

}

?>


<div class="content-wrapper">
	
	<section class="content-header">

		<?php

		$exp = explode("/", $_GET["url"]);

		$columna = "id";
		$valor = $exp[1];

		$carrera = CarrerasC::CarreraC($columna, $valor);

		echo '<h1>Gestor de Materias de la Carrera: '.$carrera["nombre"].'</h1>';

		?>
		

	</section>	


	<section class="content">

		<div class="box">
			
			<div class="box-header">
				
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearMateria">Crear Materia</button>

			</div>

			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped T">
					
					<thead>
						<tr>
							
							<th>Código</th>
							<th>Nombre</th>
							<th>Grado</th>
							<th>Tipo</th>
							<th>Programa</th>
							<th></th>

						</tr>
					</thead>

					<tbody>

						<?php

						$resultado = MateriasC::VerMateriasC();

						foreach ($resultado as $key => $value) {

							if($value["id_carrera"] == $exp[1]){

							echo '<tr>
							
									<td>'.$value["codigo"].'</td>
									<td>'.$value["nombre"].'</td>
									<td>'.$value["grado"].'</td>
									<td>'.$value["tipo"].'</td>';

									if($value["programa"] != ""){

										echo '<td><a href="'.$value["programa"].'" download="'.$value["nombre"].'">Descargar Programa</a></td>';

									}else{

										echo '<td>No tiene programa.</td>';

									}
									

									echo '<td>
										
										<div class="btn-group">
											
											<a href="http://localhost/universidad/Crear-Comisiones/'.$value["id"].'">
												<button class="btn btn-default">Comisiones</button>
											</a>

											<a href="#">
												<button class="btn btn-danger EliminarMateria" Mid="'.$value["id"].'" Cid="'.$exp[1].'">Eliminar</button>
											</a>

										</div>

									</td>

								</tr>';

							}

						}
							

						?>
						
					</tbody>

				</table>

			</div>

		</div>
		
	</section>

</div>


<?php

$eliminarM = new MateriasC();
$eliminarM -> EliminarMateriaC();	

?>



<div class="modal fade" id="CrearMateria">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" enctype="multipart/form-data">
				
				<div class="modal-body">
					
					<div class="form-group">

						<h2>Código:</h2>
						
						<input type="text" class="form-control input-lg" name="codigo" required="">

						<?php

						echo '<input type="hidden" name="Cid" value="'.$exp[1].'">';

						?>
						

					</div>

					<div class="form-group">

						<h2>Nombre:</h2>
						
						<input type="text" class="form-control input-lg" name="nombre" required="">

					</div>

					<div class="form-group">

						<h2>Grado:</h2>
						
						<input type="number" class="form-control input-lg" name="grado" required="">

					</div>

					<div class="form-group">

						<h2>Tipo:</h2>
						
						<select class="form-control input-lg" name="tipo">
							
							<option>Seleccionar...</option>

							<option value="Anual">Anual</option>
							<option value="1er Cuatrimestre">1er Cuatrimestre</option>
							<option value="2do Cuatrimestre">2do Cuatrimestre</option>

						</select>

					</div>

					<div class="form-group">

						<h2>Programa:</h2>
						
						<input type="file" name="programa">

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Crear Materia</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>


				<?php

				$crearM = new MateriasC();
				$crearM -> CrearMateriaC();

				?>


			</form>

		</div>

	</div>

</div>