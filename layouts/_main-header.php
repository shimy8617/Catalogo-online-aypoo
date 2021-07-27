<header>
	<div class="logo-place"><a href="index.php"><img src="assets/logo.png"></a></div>
	<div class="search-place">
		<input type="text" id="idbusqueda" placeholder="Escribe el producto que buscas" value="<?php if(isset($_GET['text'])){echo $_GET['text'];}else{echo '';} ?>">
		<button class="btn-main btn-search" onclick="search_producto()"><i class="fas fa-search"></i></button>
	</div>
	<div class="options-place">
		<?php
		if (isset($_SESSION['codusu'])) {
			echo 
			'<div class="item-option" onclick="mostrar_opciones()"><i class="fas fa-user-circle"></i><p>'.$_SESSION['nomusu'].'</p></div>';
		}else{
		?>
		<div class="item-option" title="Registrate"><a href="login.php"><i class="fas fa-user-circle"></i></div>
		<div class="item-option" title="Ingresar a mi cuenta"><a href="login.php"><i class="fas fa-sign-in-alt"></i></div>
		<?php
		}
		?>
		<div class="item-option" title="Mi Carrito">
			<a href="carrito.php"><i class="fas fa-shopping-cart"></i></a>
		</div>
	</div>
</header>

<script type="text/javascript">
	function mostrar_opciones(){
		if(document.getElementById("ctrl-menu").style.display=="none") {
			document.getElementById("ctrl-menu").style.display="block";
		}else{
		document.getElementById("ctrl-menu").style.display="none";		
		}
	}
</script>
<div class="menu-opciones" id="ctrl-menu" style="display:none;">
	<ul>
		<li><a href="historial.php">
			<div class="menu-opcion">Historial de compras</div>
		</a></li>
		<li><a href="_logout.php">
			<div class="menu-opcion">Salir</div>
		</a></li>
	</ul>
</div>