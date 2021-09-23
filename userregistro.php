<?php
	$realname=$_POST['realname'];
	$apellidos=$_POST['apellidos'];	
	$mail=$_POST['nick'];
	$dni=$_POST['dni'];
	$direccion= $_POST['direccion'];
	$_SESSION['sele'] = $_REQUEST['sexo'];
	$sexo=$_SESSION['sele'];
	$telefono=$_POST['telefono'];
	$edad=$_POST['edad'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];
	$intitucion=$_POST['instituto'];
	$competition="0";
	require("connect_db.php");
	if($edad>10){
		$checkemail=mysqli_query($mysqli,"SELECT * FROM usuario WHERE email='$mail'");
		$checkdni=mysqli_query($mysqli,"SELECT * FROM usuario WHERE dni='$dni'");
	$check_mail=mysqli_num_rows($checkemail);
	$check_dni=mysqli_num_rows($checkdni);
		if($pass==$rpass){
			if($check_mail>0 || $check_dni>0){
				echo ' <div class="alert alert-danger" role="alert">Atención!!. El email o DNI ya está designado para un usuario del sistema. Por favor verifique sus datos.</div>';
			}else{
				mysqli_query($mysqli,"INSERT INTO usuario (usuario,apellidos,dni,email,password,direccion,sexo,edad,telefono,privilegios,habilitado,competition,instituto) VALUES('$realname','$apellidos','$dni','$mail','$pass','$direccion','$sexo','$edad','$telefono','2','1','$competition','$intitucion')");				
				echo ' <div class="alert alert-success" role="alert">Usuario registrado correctamente. Por favor inicie sesión.</div> ';
				echo '<script>location.href="login.php"</script>';
				//header("Location::userregistro.php");			
			}			
		}else{
			echo '<div class="alert alert-danger" role="alert">Las contraseñas no coinciden. Por favor verifique.</div>';
		}
	}else{
		echo ' <div class="alert alert-danger" role="alert">Eres menor de edad, no puedes registrarte.</div>';
		//header("Location:userregistro.php");
	}
?>