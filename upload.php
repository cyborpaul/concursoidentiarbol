<?php

$route="uploads/";
//$route=$_SERVER['DOCUMENT_ROOT']."/concurso/uploads/";
$codigoarbol=$_GET['codarbol'];
$id=$_GET['ID'];
$tipo_mime = $_FILES['file']['type'];  

$route=$route.$_FILES['file']['name']; 
$nombre=$_FILES['file']['name']; 

      
// Extrae su tamaño
$tamanio = $_FILES['file']['size'];        
// Extrae su ubicación del archivo temporal
$archivo_temporal = $_FILES['file']['tmp_name'];        
// Extrae el codigo de error
$codigo_error = $_FILES['file']['error'];         
$zonahoraria="-5";
$formato="Y-m-d H:i:s a";
$time=gmdate($formato, time()+($zonahoraria*3600));
 

move_uploaded_file($_FILES['file']['tmp_name'],$route);

/* ENVIO A LA BASE DE DATOS */
require 'connect_db.php';
$sql = "INSERT INTO imagen (IDPlanta,IDUsuario,TaImagen,urlImagen,Fecha,Tipo_Imagen,nombre) VALUES('$codigoarbol','$id','$tamanio','$route','$time','$tipo_mime','$nombre') ";
$query  = mysqli_query($mysqli,$sql);    


?>