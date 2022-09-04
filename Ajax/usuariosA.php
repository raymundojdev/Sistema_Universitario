<?php 

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

class UsuariosA{

	public $Uid;

	public  function EditarUsuariosA()
	{
		$columna ="id";
		$valor = $this->Uid;

		$resultado = UsuariosC::VerUsuariosC($columna, $valor);

		echo json_encode($resultado);
	}

	public $verificarLibreta;

	public function VerificarLibreta(){

		$columna ="libreta";
		$valor = $this->verificarLibreta;

		$resultado = UsuariosC::VerUsuariosC($columna, $valor);

		echo json_encode($resultado);
	}


}

if (isset($_POST["Uid"])) {
	
	$editarU = new UsuariosA();
	$editarU -> Uid = $_POST["Uid"];
	$editarU -> EditarUsuariosA();
}

if (isset($_POST["verificarLibreta"])) {
	
	$verificarU = new UsuariosA();
	$verificarU -> verificarLibreta = $_POST["verificarLibreta"];
	$verificarU -> VerificarLibreta();
}

 ?>