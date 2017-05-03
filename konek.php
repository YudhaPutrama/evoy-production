<?php
	$username="evoy";
	$password="evoy";
	$dbname="localhost/XE";
	$conn=oci_connect($username, $password, $dbname);
		if (!$conn) {
			echo "Koneksi ke server database gagal dilakukan";
			exit();
		}else{
			
	}
?>