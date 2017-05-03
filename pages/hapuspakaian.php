<?php
	include 'connect.php';
	if(isset($_GET['KODE_PAKAIAN'])){
		$ID= $_GET['KODE_PAKAIAN'];
		$delete = oci_parse($conn, "delete from pakaian where KODE_PAKAIAN='$ID'");
		if(oci_execute($delete)){
			Header('location:viewpakaian.php');
		}
	}
?>