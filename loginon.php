<?php
session_start();
	require 'connect_db.php';//Realizamos la conexión a la base de datos
	$username=$_POST['mail'];
	$pass=$_POST['pass'];
	$sql=mysqli_query($mysqli,"SELECT * FROM usuario WHERE email='$username' or dni='$username'");
	if($f=mysqli_fetch_assoc($sql)){
		if($pass==$f['password']){
			$_SESSION['Id']=$f['Id'];
			$_SESSION['usuario']=$f['usuario'];
			$_SESSION['competition']=$f['competition'];
			$dato=$f['competition'];
			//echo '<script>alert("BIENVENIDO IDENTIARBOL")</script> ';
			if($dato==1 || $dato==2){
				echo '<script>location.href="starter.php"</script>';
			}else{
				echo '<script>location.href="competition.php"</script>';
			}
			
			
			
			//header("Location: starter.php"); 
		}else{
			echo '<div class="alert alert-danger" role="alert">Contraseña incorrecta.</div> ';			
		}		
	}else{		
		echo '<div class="alert alert-danger" role="alert">Este usuario no existe. Por favor registrese para poder ingresar.</div>';			
	}
?>