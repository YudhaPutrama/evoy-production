<?php
	include("connect.php");
	
	if (isset($_POST['sbinptresi'])){
		$noresi = $_POST ['resi'];
		$id = $_POST ['id'];
		
		$input = oci_parse($conn,"update peminjaman set no_resi='$noresi' where id_peminjaman='$id'");
		oci_execute($input);
		oci_commit($conn);
		echo "<script type='text/javascript'>document.location='pinjam.php'</script>";
		exit();
	}
?>