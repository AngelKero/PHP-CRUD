<?php
//se incluye la configuracion para conectar la base de datos
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
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
	} else {	
		//Actualizar la tabla
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//Redirigir a la pagina principal
		header("Location: index.php");
	}
}
?>
<?php
//obteniendo datos de la url
$id = $_GET['id'];

//seleccionando datos relicionados con este id particular
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Editar datos</title>
</head>

<body>
	<a href="index.php">Inicio</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nombre</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Edad</td>
				<td><input type="text" name="age" value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
