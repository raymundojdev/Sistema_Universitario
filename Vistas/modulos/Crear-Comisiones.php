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

				<?php

				$exp = explode("/", $_GET["url"]);

				$columna = "id";
				$valor = $exp[1];

				$materia = MateriasC::VerMaterias2C($columna, $valor);

				echo '<h2>Comisiones de la Materia:</h2>
				<h1><b>'.$materia["nombre"].'</b></h1>';

				?>
				
				

				<div class="row">
					
					<div class="col-md-12 col-xs-12">
						
						<button class="btn btn-primary btn-md" data-toggle="modal" data-target="#CrearComision">Crear Comisión</button>

						<h2>Comisiones:</h2>

						<table class="table table-bordered table-hover table-striped T">
							
							<thead>
								<tr>
									
									<th>N°</th>
									<th>Cantidad Máxima de Alumnos</th>
									<th>Días</th>
									<th>Horario</th>

									<th></th>

								</tr>
							</thead>

							<tbody>

								<?php

								$columna = "id_materia";
								$valor = $exp[1];

								$comisiones = MateriasC::VerComisionesC($columna, $valor);

								foreach ($comisiones as $key => $value) {
									
									echo '<tr>
									
											<td>'.$value["numero"].'</td>
											<td>'.$value["c_maxima"].'</td>
											<td>'.$value["dias"].'</td>
											<td>'.$value["horario"].'</td>

											<td>

												<a href="http://localhost/universidad/tcpdf/pdf/Inscriptos-Materia.php/'.$exp[1].'/'.$value["id"].'" target="blank">

													<button class="btn btn-primary">Generar PDF</button>

												</a>
												
												

												<button class="btn btn-danger BorrarComision" Cid="'.$value["id"].'" Mid="'.$exp[1].'">Borrar Comisión</button>

											</td>

										</tr>';

								}

								?>
								
							</tbody>

						</table>

					</div>

				</div>

			</div>

		</div>

	</section>

</div>


<div class="modal fade" id="CrearComision">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post">
				
				<div class="box-body">
					
					<div class="form-group">
						
						<h2>Número:</h2>

						<input type="number" class="form-control input-lg" name="numero" required="">

						<?php

						echo '
						<input type="hidden" class="form-control input-lg" name="id_materia" value="'.$exp[1].'" required="">';

						?>

					</div>

					<div class="form-group">
						
						<h2>Cantidad Máxima de Alumnos:</h2>

						<input type="number" class="form-control input-lg" name="c_maxima" required="">

					</div>

					<div class="form-group">
						
						<h2>Días:</h2>

						<input type="texto" class="form-control input-lg" name="dias" required="">

					</div>

					<div class="form-group">
						
						<h2>Horarios:</h2>

						<input type="text" class="form-control input-lg" name="horario" required="">

					</div>

				</div>


				<div class="modal-footer">
					
					<button class="btn btn-primary" type="submit">Crear</button>

					<button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

				</div>


				<?php

				$crearC = new MateriasC();
				$crearC -> CrearComisionC();

				?>

			</form>

		</div>

	</div>

</div>


<?php

$borrarC = new MateriasC();
$borrarC -> BorrarComisionC();

?>