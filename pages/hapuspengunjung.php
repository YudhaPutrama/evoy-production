<?php
	include 'connect.php';
	if(isset($_GET['NO_KTP'])){
		$ID= $_GET['NO_KTP'];
		$delete = oci_parse($conn, "delete from pengunjung where NO_KTP='$ID'");
		if(oci_execute($delete)){
			Header('location:viewpengunjung.php');
		}
	}
	

?>