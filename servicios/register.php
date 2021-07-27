<?php
//1: Error de conexion
//2: Email invalido
//3: Contraseña incorrecta
include('_conexion.php');
$emausu=$_POST['emausureg'];
$sql="SELECT * FROM USUARIO WHERE emausu='$emausu'";
$result=mysqli_query($con,$sql);
if ($result) {
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if ($count==0) {
		//Puede crear un nuevo usuario
		$nomusu=$_POST['nomusureg'];
		$apeusu=$_POST['apeusureg'];
		$dirusu=$_POST['dirusureg'];
		$localsu=$_POST['localsureg'];
		$provsu=$_POST['provsureg'];
		$codpossu=$_POST['codpossureg'];
		$telusu=$_POST['telusureg'];
		$cuitsu=$_POST['cuitsureg'];
		$cfisu=$_POST['cfisureg'];
		$pasusu=$_POST['pasusureg'];
		$pasusu2=$_POST['pasusu2reg'];
		if ($pasusu!=$pasusu2) {
			header('Location: ../login.php?ereg=3');
		}else{
			$sql="INSERT into usuario (codusu,emausu,apeusu,nomusu,pasusu,dirusu,localsu,provsu,codpossu,telusu,cuitsu,cfisu,estado) VALUES ('','$emausu','$nomusu','$apeusu','$pasusu','$dirusu','$localsu','$provusu','$codpossu','$telusu','$cuitsu','$cfisu',1)";
			$result=mysqli_query($con,$sql);
			$codusu=mysqli_insert_id($con);
			session_start();
			$_SESSION['codusu']=$codusu;
			$_SESSION['emausu']=$emausu;
			$_SESSION['nomusu']=$nomusu;
			header('Location: ../');
		}
	}else{
		header('Location: ../login.php?ereg=2');
	}
}else{
	header('Location: ../login.php?ereg=1');
}
