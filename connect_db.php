<?php
		

		$mysqli = new MySQLi('localhost','root','','invental_identiarbol');
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else

		//Para trabajar en servidor

		/*$mysqli = new MySQLi("localhost", "invental_root","inventalo@23$$$$", "invental_identiarbol");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexi車n a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else*/
?>