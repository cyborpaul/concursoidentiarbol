<?php
include "Conexion.php";
$db=connect();
$provi=$_GET['continente_id'];
list($codig,$departamento) = explode('-',$provi);
$query=$db->query("select * from provincias where id_departamento=$codig");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; } 
if(count($states)>0){
print "<option></option>";
foreach ($states as $s) {
	print "<option value='$s->id_provi-$s->provincia'>$s->provincia</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?> 