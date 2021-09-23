<?php
//Para trabajar en local
// simple conexion a la base de datos
function connect(){
	return new mysqli("localhost","root","","invental_identiarbol");
}

//Para subir al servidor
/*function connect(){
	return new mysqli("localhost","invental_root","inventalo@23$$$$","invental_identiarbol");
}*/


?>