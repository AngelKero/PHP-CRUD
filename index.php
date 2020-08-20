<?php
//se incluye la configuracion para conectar la base de datos
include_once("config.php");

//Mostrar los datos en forma descendente
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pagina de inicio</title>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/web.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>

<body>
	<header>
        <nav>
            <div class="container">
                <div class="elementos">
                    <div class="logo">
                        <img src="img/logo.png" alt="logo de aliens secrets">
                    </div>
                    <ul class="lista">
                        <li>Tipos
                            <ul>
                                <li>Grises</li>
                                <li>Ancestrales</li>
                                <li>Marcianos</li>
                            </ul>
                        </li>
                        <li>Historia
                            <ul>
                                <li>Avistamientos</li>
                                <li>Cultura</li>
                                <li>Area 51</li>
                            </ul>
                        </li>
                        <li>Ovnis
                            <ul>
                                <li>Grabaciones</li>
                                <li>Fotos</li>
                                <li>Abduciones</li>
                            </ul>
						</li>
						<h3>Registro para aliens</h3>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="animacion">
            <div class="texto">
                <h1>Registro de <span class="aliens">Aliens</span></h1>
            </div>
            <div class="rgb">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="botones">
                <nav>
                    <a target="about_blank" href="https://www.youtube.com/results?search_query=reptilianos">Videos</a>
                    <a target="about_blank" href="https://www.istockphoto.com/es/fotos/extraterrestre?mediatype=photography&phrase=extraterrestre&sort=mostpopular">Fotos</a>
                    <a target="about_blank" href="https://www.youtube.com/watch?v=iG1o5xLqqcY" class="cumbia">Cumbia</a>
                </nav>
            </div>
        </div>
	</header>
	<section class="tabla">
		<div class="container">
			<h2>Tabla de aliens en la tierra</h2>
			<a href="add.html" class="add">Agregar nuevo usuario<i class="fas fa-user-plus"></i></a>

			<table width='80%' border=0>

				<tr class="tipos">
					<td>Nombre</td>
					<td>Edad</td>
					<td>Email</td>
					<td>Actualizar</td>
				</tr>
				<?php 
				//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
				while($res = mysqli_fetch_array($result)) { 		
					echo "<tr class=\"datos\">";
					echo "<td>".$res['name']."</td>";
					echo "<td class=\"edad\">".$res['age']."</td>";
					echo "<td>".$res['email']."</td>";	
					echo "<td class=\"actualizar\">
							<a href=\"edit.php?id=$res[id]\"><i class=\"fas fa-sync-alt\"></i>Editar</a>
							<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('¿Estas seguro de elimar usuario')\">Eliminar<i class=\"fas fa-user-minus\"></i></a>
						</td>";		
				}
				?>
			</table>
		</div>

	</section>
	
</body>
</html>
