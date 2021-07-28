<!DOCTYPE html>
<html>
<head>
	<title>Aypoo E-commerce</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/469e0bb689.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		form{
			max-width: 460px;
			width: calc(100% - 40px);
			padding: 20px;
			background: #fff;
			border-radius: 5px;
			margin: auto;
		}
		form h3{
			margin: 5px 0;
		}
		form input{
			padding: 7px 10px;
			width: calc(100% - 22px);
			margin-bottom: 10px;
		}
		form button{
			padding: 10px 15px;
			width: calc(100%);
			background: var(--main-red);
			border: none;
			color: #fff;
		}
		form p{
			margin: 0;
			margin-bottom: 5px;
			color: var(--main-red);
			font-size: 14px;
		}
	</style>
</head>
<body>
	<header>
		<div class="logo-place"><a href="index.php"><img src="assets/logo.png"></a></div>
	</header>
	<div class="main-content">
		<div class="content-page">
			<form action="servicios/login.php" method="POST">
				<h3>Iniciar Sesión</h3>
				<input type="text" name="emausu" placeholder="Mail">
				<input type="password" name="pasusu" placeholder="Contraseña">
				<?php
					if (isset($_GET['e'])) {
						switch ($_GET['e']) {
							case '1':
								echo '<p>Error de conexión</p>';
								break;
							case '2':
								echo '<p>Email inválido</p>';
								break;
							case '3':
								echo '<p>Contraseña incorrecta</p>';
								break;
							default:
								break;
						}
					}
				?>
				<button type="submit">Ingresar</button>
			</form>
			<form action="servicios/register.php" method="POST">
				<h3>Registrate</h3>
				<input type="text" name="nomusureg" placeholder="Nombre">
				<input type="text" name="apeusureg" placeholder="Apellido">
				<input type="text" name="dirusureg" placeholder="Domicilio">
				<input type="text" name="localsureg" placeholder="Localidad">
				<input type="text" name="provsureg" placeholder="Provincia">
				<input type="text" name="codpossureg" placeholder="Código Postal">
				<input type="text" name="telusureg" placeholder="Número de Whatsapp">
				<input type="text" name="cuitsureg" placeholder="Número de CUIT">
				<input type="text" name="cfisureg" placeholder="Condición frente al IVA">
				<input type="text" name="emausureg" placeholder="Mail">
				<input type="password" name="pasusureg" placeholder="Contraseña">
				<input type="password" name="pasusu2reg" placeholder="Confirmar contraseña">
				<?php
					if (isset($_GET['ereg'])) {
						switch ($_GET['ereg']) {
							case '1':
								echo '<p>Error de conexión</p>';
								break;
							case '2':
								echo '<p>Lo siento, este email ya está en uso</p>';
								break;
							case '3':
								echo '<p>Las contraseñas no coinciden</p>';
								break;
							default:
								break;
						}
					}
				?>
				<button type="submit">Crear cuenta</button>
			</form>
 
		</div>
	</div>
</body>
</html>