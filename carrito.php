<?php
	session_start();
	if (!isset($_SESSION['codusu'])) {
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aypoo e-commerce</title>
	<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Sen&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/469e0bb689.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body>
	<?php include("layouts/_main-header.php"); ?>
	<div class="main-content">
		<div class="content-page">
			<h3>Mi Carrito</h3>
			<div class="body-pedidos" id="space-list">
			</div>
			<input class="ipt-procom" type="text" id="dirusu" placeholder="Dirección">
			<br>
			<input class="ipt-procom" type="text" id="telusu" placeholder="Celular">
			<br>
			<h4>Tipo de pago</h4>
			<div class="metodo-pago">
				<input type="radio" name="tipopago" value="1" id="tipo1">
				<label for="tipo1">Pago por transferencia o deposito</label>
			</div>
			<div class="metodo-pago">
				<input type="radio" name="tipopago" value="2" id="tipo2">
				<label for="tipo2">Pago con tarjeta de crédito/débito</label>
			</div>

			<div class="metodo-pago">
				<input type="radio" name="tipopago" value="2" id="tipo3">
				<label for="tipo3">Pago con MercadoPago, Rapipago o Pagofacil</label>
			</div>
			<div class="metodo-pago">
				<input type="radio" name="tipopago" value="3" id="tipo4">
				<label for="tipo4">Pago en efectivo en el local</label>
			</div>
			<button onclick="procesar_compra()" style="margin-top: 5px">Procesar compra</button>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'servicios/pedido/get_enespera.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="assets/products/'+data.datos[i].rutimapro+'">'+
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nompro+'</h3>'+
								'<p><b>Precio:</b> S/ '+data.datos[i].prepro+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecped+'</p>'+
								'<p><b>Estado:</b> '+data.datos[i].estado+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'+
								'<p><b>Celular:</b> '+data.datos[i].telusuped+'</p>'+
							'</div>'+
						'</div>';
					}
					document.getElementById("space-list").innerHTML=html
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function procesar_compra(){
			let dirusu=document.getElementById("dirusu").value;
			let telusu=$("#telusu").val();
			let tipopago=1;
			if (document.getElementById("tipo2").checked) {
				tipopago=2;
			}
			if (document.getElementById("tipo3").checked) {
				tipopago=3;
			}
			if (document.getElementById("tipo4").checked) {
				tipopago=4;
			}
			if (dirusu=="" || telusu=="") {
				alert("Complete los campos");
			}else{
				if (!document.getElementById("tipo1").checked &&
					!document.getElementById("tipo2").checked &&
					!document.getElementById("tipo3").checked &&
					!document.getElementById("tipo4").checked) {
					alert("Seleccione un método de pago!");
				}else{
					$.ajax({
							url:'servicios/pedido/confirm.php',
							type:'POST',
							data:{
								dirusu:dirusu,
								telusu:telusu,
								tipopago:tipopago
							},
							success:function(data){
								console.log(data);
								if (data.state) {
									window.location.href="pedido.php";
								}else{
									alert(data.detail);
								}
							},
							error:function(err){
								console.error(err);
							}
						});
					}
				}
		}
	</script>
</body>
</html>
