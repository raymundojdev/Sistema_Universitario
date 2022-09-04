

<div class="content-wrapper">
	
	<section class="content-header">

		<?php

		$columna = "id";
		$valor = $_SESSION["id_carrera"];

		$carrera = CarrerasC::VerCarreras2C($columna, $valor);

		echo '<h1>Plan de Estudios: '.$carrera["nombre"].'</h1>';

		?>
		
		

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped">

					<thead>
						<tr>
							
							<th>Código</th>
							<th>Nombre</th>
							<th>Grado</th>
							<th>Tipo</th>
							<th>Programa</th>
							<th>Nota</th>

						</tr>
					</thead>

					<tbody>

						<?php

						$resultado = MateriasC::VerMateriasC();

						foreach ($resultado as $key => $value) {
							
							if($value["id_carrera"] == $_SESSION["id_carrera"]){

							echo '<tr>
							
									<td>'.$value["codigo"].'</td>
									<td>'.$value["nombre"].'</td>
									<td>'.$value["grado"].'</td>
									<td>'.$value["tipo"].'</td>';

									if($value["programa"] != ""){

										echo '<td><a href="'.$value["programa"].'" download="'.$value["nombre"].'">Descargar PDF</a></td>';

									}else{

										echo '<td>No tiene Programa.</td>';

									}


									$columna = "id_materia";
									$valor = $value["id"];

									$nota = MateriasC::VerNotasC($columna, $valor);

									foreach ($nota as $key => $N) {
										
										if($N["id_alumno"] == $_SESSION["id"] && $N["id_materia"] == $value["id"]){

											if($N["estado"] == "Aprobado"){

												echo '<td class="bg-primary">'.$N["nota_final"].' '.$N["estado"].'</td>';

											}else if($N["estado"] == "Regular"){

												echo '<td class="bg-success">'.$N["nota_final"].' '.$N["estado"].'</td>';

											}else if($N["estado"] == "Desaprobado"){

												echo '<td class="bg-danger">'.$N["nota_final"].' '.$N["estado"].'</td>';

											}else{

												echo '<td>'.$N["estado"].'</td>';

											}

										}

									}
									

									echo '</tr>';

							}

						}

						?>
						
					</tbody>
					
				</table>

			</div>

		</div>

	</section>

</div>