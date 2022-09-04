<?php

session_start();

?>


<!DOCTYPE html>
<html>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Universidad</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/universidad/Vistas/dist/css/skins/skin-blue.min.css">


  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>



<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->




 <?php

 if(isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true){

  echo '<div class="wrapper">';

  include "modulos/cabecera.php";

  if($_SESSION["rol"] == "Administrador"){

    include "modulos/menu.php";

  }

  $url = array();

  if(isset($_GET["url"])){

    $url = explode("/", $_GET["url"]);

    if($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "mis-datos" || $url[0] == "Carreras" || $url[0] == "Editar-Carrera" || $url[0] == "usuarios" || $url[0] == "Estudiantes" || $url[0] == "Editar-Inicio"|| $url[0] == "Crear-Materias" || $url[0] == "Crear-Comisiones" || $url[0] == "Ver-Plan" || $url[0] == "Nota-Materia" || $url[0] == "Editar-Nota"){

      include "modulos/".$url[0].".php";

    }
   

  }else{

    include "modulos/inicio.php";

  }

   echo '</div>';



 }else if(isset($_GET["url"])){

  if($_GET["url"] == "Ingresar"){

    include "modulos/Ingresar.php";

  }


 }else{

   include "modulos/Ingresar.php";

 }

  

 ?>

  <!-- =============================================== -->

  

  <!-- =============================================== -->

 
 

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost/universidad/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/universidad/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost/universidad/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/universidad/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/universidad/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/universidad/Vistas/dist/js/demo.js"></script>

<script src="http://localhost/universidad/Vistas/js/usuarios.js"></script>

<script src="http://localhost/universidad/Vistas/js/materias.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
