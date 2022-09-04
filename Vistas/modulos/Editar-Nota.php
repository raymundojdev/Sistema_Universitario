<?php 

if($_SESSION["rol"] != "Administrador"){

    echo '<script>
    window.locations = "http://localhost/universidad/inicio";
    </script>';
    return;
}

?>
<div class="content-wrapper">
    
    <section class="conten">
        
        <div class="box">
            
            <div class="box-body">
                
                <form method="post">

                    <?php 

                    $exp = explode("/", $_GET["url"]);

                    $columna ="libreta";
                    $valor = $exp[2];

                    $estudiante = UsuariosC::VerUsuariosC($columna, $valor);

                    echo '<h3>Alumno:'.$estudiante["nombre"].' '.$estudiante["apellido"].' - Libreta:'.$estudiante["libreta"].'</h3>';

                    echo '<input type="hidden" name="id_alumno" value="'.$estudiante["id"].'">

                    <input type="hidden" name="libreta" value="'.$estudiante["libreta"].'">

                    <input type="hidden" name="id_carrera" value="'.$exp[1].'">';

                    $columna = "id";
                    $valor = $exp[1];

                    $materia = MateriasC::VerMaterias2C($columna, $valor);

                    echo '<h3>Materia: '.$materia["nombre"].'</h3>

                    <input type="hidden" name="id_materia" value="'.$materia["id"].'">';

                     ?>         

                    <div class="row">
                        
                        <div class="col-md-6 col-xs-12">

                            <?php 

                            $columna = "id";
                            $valor = $exp[3];

                            $resultado = MateriasC::VerNotas2C($columna, $valor);

                            echo'<h3>Fecha:</h3>    

                                <input type="text" class="input-lg" name="nota_id" value="'.$resultado["fecha"].'">
                                
                                <input type="text" class="input-lg" name="fecha" value="'.$resultado["id"].'">

                                <h3>Profesor:</h3>
                                <input type="text" class="input-lg" name="profesor" value="'.$resultado["profesor"].'">
                                </div>

                                <div class="col-md-6 col-xs-12">
                                    
                                    <h3>Estado Actual: '.$resultado["estado"].'</h3>
                                    <select class=" input-lg" name="estado">
                                        <option value="'.$resultado["estado"].'">Seleccionar...</option>

                                        <option value="No Cursado">No Cursado</option>
                                        <option value="Aprobado">Aprobado</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Reprobado">Reprobado</option>
                                    </select>

                                    <h3>Nota Final:</h3>
                                    <input type="text" class=" input-lg" name="nota_final" value="'.$resultado["nota_final"].'">';

                             ?>                                                     
                            <br><br>                            
                        </div>

                            <button class="btn btn-success btn-lg center-block" type="submit">Guardar nota</button>
                    </div>

                    <?php 

                    $notas = new MateriasC();
                    $notas -> ColocarNotaC();                   

                     ?>
                </form>
            </div>
        </div>
    </section>
</div>