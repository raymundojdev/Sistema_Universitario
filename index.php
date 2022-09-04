<?php

require_once "Controladores/plantillaC.php";

require_once "Controladores/usuariosC.php";
require_once "Modelos/usuariosM.php";

require_once "Controladores/carrerasC.php";
require_once "Modelos/carrerasM.php";


require_once "Controladores/ajustesC.php";
require_once "Modelos/ajustesM.php";

require_once "Controladores/materiasC.php";
require_once "Modelos/materiasM.php";

$plantilla = new Plantilla();
$plantilla -> LlamarPlantilla();

?>