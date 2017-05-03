<?php
	$username="evoy";
	$password="evoy";
	// $dbname="(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=trivalier.id)(PORT=49161))(CONNECT_DATA=(SID=XE)))";
	$dbname = "trivalier.id:49161/XE";
	$conn=oci_connect($username, $password, $dbname);
		if (!$conn) {
			echo "Koneksi ke server database gagal dilakukan";
			exit();
		}else{
			
	}
?>