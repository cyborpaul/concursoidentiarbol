<?php
require 'connect_db.php';
$dato=$_GET['competition'];
$identificador=$_GET['val'];

$resultado = mysqli_query($mysqli,"UPDATE usuario SET competition='$dato' where Id='$identificador'");
if($resultado==true){
    echo '<script>location.href="starter.php"</script>';
}else{
    echo '<script>location.href="competition.php"</script>';
}

?>