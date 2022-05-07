<?php
session_start();
if (!$_SESSION['personas']) {
	$_SESSION['personas']=[];
}
	array_push($_SESSION['personas'], $_POST);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="">
        <form class="" action="formulario.php" method="post">
          <label for="formGroupExampleInput">Nombre</label>
          <input type="text" name="nombre" value="" placeholder="Ingrese el nombre" class="form-control" id="formGroupExampleInput">
          <label for="formGroupExampleInput">Apellido</label>
          <input type="text" name="apellido" value="" placeholder="Ingrese el apellido" class="form-control" id="formGroupExampleInput2">
          <label for="formGroupExampleInput">Fecha de Nacimiento</label>
          <input type="date" name="fenac" value="" placeholder="Ingrese la fecha de nacimiento" class="form-control" id="formGroupExampleInput2">
          
          <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
          <button type="" name="eliminar" class="btn btn-primary">Eliminar sesion</button>
        </form>
      </div>
  </body>
</html>

<?php
$errores=[];
$error=0;
if(isset($_REQUEST["enviar"])){
  if($_POST['nombre']==""){
    $error++;
    array_push($errores, "El nombre no debe estar vacio");
  }
  if($_POST['apellido']==""){
    $error++;
    array_push($errores, "El apellido no debe estar vacio");
  }
  $nfecha=date_parse($_POST['fenac']);
  if($nfecha['error_count']){
    $error++;
    array_push($errores, "La fecha debe ser valida");
  }

  if($error>0){
    print_r($errores);
    echo "<br>La solicitud no pudo ser validada";
  } else{
    echo 	"<table  class="."table table-striped".">
		<div class="."container".">
			<thead>
			  	<tr id="."tab_cabe".">
				    <th>Apellido</th>
				    <th>Nombre</th>
				    <th>F. Nacimiento</th>
				</tr>
			</thead>
			<tbody id="."tab_datos".">
				<tr>";
			for ($i=0; $i<count($_SESSION['personas']) ; $i++) {
				echo "<td>".$_SESSION['personas'][$i]['apellido']."</td><td>".$_SESSION['personas'][$i]['nombre']."</td><td>".$_SESSION['personas'][$i]['fenac']."</td>"."</tr>";
			}
			echo "</tbody>
		</div>
	</table>";
  }
}

if (isset($_REQUEST["eliminar"])) {
  session_destroy();
}
?>
