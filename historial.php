<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aypoo E-commerce</title>
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
			<div class="title-section">Mis compras realizadas</div>
			<div class="products-list" id="space-list">
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'servicios/pedido/get_all_pedidos.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html = '';
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="detail-box">'+
							'<div class="img">'+
								'<img src="assets/products/'+data.datos[i].rutimapro+'">'+
							'</div>'+
							'<div class="detail">'+
								'<h3 class="mb5">'+data.datos[i].nompro+'</h3>'+
								'<p class="mb5">'+data.datos[i].fecped+'</p>'+
								'<p class="mb5">'+data.datos[i].despro+'</p>'+
								'<h4 class="mb5">'+formato_precio(data.datos[i].prepro)+'</h4>'+
							'</div>'+
						'</div>';
					}
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function formato_precio(valor){
			//10.99
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "$ "+array[0]+".<span>"+array[1]+"</span>";
		}
	</script>
</body>
</html>