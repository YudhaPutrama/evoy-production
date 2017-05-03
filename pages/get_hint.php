<?php
	include("connect.php");
	$id = $_GET['ID_PULAU'];
	$query = oci_parse($conn,"select * from prov where id_pulau='$id'");
	oci_execute($query);
	echo "<b>Asal Provinsi Pakaian</b>";
	echo "<select name='prov' class='form-control'>";
	echo "<option value ='' disabled='disabled' selected='selected'>Pilih Provinsi</option>";
	while($baris = oci_fetch_object($query)){
		echo "<option value='$baris->ID_PROV'>$baris->NAMA_PROV</option>";
	}
	echo "</select>";
?>