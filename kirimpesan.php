<?php
	include("konek.php");
	
	if(isset($_POST['psn'])){
		$id = oci_parse($conn,"select max(id_pesan) as maxidp from pesan");
		oci_execute($id);
		$idpesan = oci_fetch_assoc($id);
		$idbaru = (int) $idpesan['MAXIDP'];
		
		$nama = $_POST['name'];
		$email = $_POST['email'];
		$nohp = $_POST['phone'];
		$pesan = $_POST['message'];
		$tanggal = date("d-m-Y");
		
		$input = oci_parse($conn,"insert into pesan values('$idbaru','$nama','$email','$nohp','$pesan'','$tanggal')");
		oci_execute($input);
		oci_commit($conn);
		
	}
?>