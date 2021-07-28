<header>
	<div class="logo-place"><a href="index.php"><img src="assets/aypoo.jpg"></a></div>
	<div class="search-place">
		<input type="text" id="idbusqueda" placeholder="Escribe el producto que buscas" value="<?php if(isset($_GET['text'])){echo $_GET['text'];}else{echo '';} ?>">
		<button class="btn-main btn-search" onclick="search_producto()"><i class="fas fa-search"></i></button>
	</div>
	<div class="options-place">
		<?php
		if (isset($_SESSION['codusu'])) {
			echo 
			'<div class="item-option" onclick="mostrar_opciones()"><i class="far fa-user"></i><p>'.$_SESSION['nomusu'].'</p></div>';
		}else{
		?>
		<div class="item-option" title="Registrate"><a href="login.php"><i class="far fa-user"></i></div>
		<div class="item-option" title="Ingresar a mi cuenta"><a href="login.php"><i class="fas fa-sign-in-alt"></i></div>
		<?php
		}
		?>
		<div class="item-option" title="Mi Carrito">
			<a href="carrito.php"><i class="fas fa-shopping-bag"></i></a>
		</div>
	</div>
	<div class="mobile-menu">
		<div class="item-option" onclick="mostrar_opciones()"><i class="fas fa-bars"></i></div>		
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
	<?php
	if (isset($_SESSION['codusu'])) {
	?>
	<ul>
		<li>
			<a href="Historial.php">
				<div class="menu-opcion">Historial de compras</div>
			</a>
		</li>
		<li>
			<a href="pedido.php">
				<div class="menu-opcion">Pedidos pendientes de pago</div>
			</a>
		</li>
		<li>
			<a href="_logout.php">
			<div class="menu-opcion">Salir</div>
			</a>
		</li>
	</ul>
	<?php
	}else{
	?>
	<ul>
		<li>
			<a href="login.php">
				<div class="menu-opcion">Iniciar sesión</div>
			</a>
		</li>
		<li>
			<a href="carrito.php">
			<div class="menu-opcion">Carrito</div>
			</a>
		</li>
	</ul>
	<?php
	}
	?>
</div>