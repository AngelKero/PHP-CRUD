<html>
<head>
	<title>Agregar usuario</title>
</head>

<body>
<?php
//se incluye la configuracion para conectar la base de datos
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// revisando campos vacios
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>El campo de nombre esta vacio.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>El campo de edad esta vacio.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>El campo de email esta vacio.</font><br/>";
		}
		
		//link a la pagina anterior
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// Si todas las filas estan llenas 
			
		//Agregar datos a la base de datos
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
		
		//Muestra mensaje de operacion exitosa
		echo "<font color='green'>Datos agrgados correctamente :)";
		echo "<br/><a href='index.php'>Ver resultados.</a>";
	}
}
?>
</body>
</html>
