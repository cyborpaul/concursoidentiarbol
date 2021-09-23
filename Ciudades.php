<?php
include "Conexion.php";
$db=connect();
$provi=$_GET['continente_id'];
list($codi,$departamento) = explode('-',$provi);
$prov=$_GET['pais_id'];
list($codigo,$departamento) = explode('-',$prov); 
$query=$db->query("select * from distritos where id_provincia=$codigo and id_departamento=$codi");
$states = array();
while($r=$query->fetch_object()){ $states[]=$r; }
if(count($states)>0){
print "<option></option>";
foreach ($states as $s) {
	print "<option value='$s->identificador_distrito-$s->nom_distrito'>$s->nom_distrito</option>";
}
}else{
print "<option value=''>-- NO HAY DATOS --</option>";
}
?> 