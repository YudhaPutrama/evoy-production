<?php
	include("konek.php");
	$hrg = oci_parse($conn,"select harga from pakaian where kode_pakaian = 'Bali-02-001'");
	oci_execute($hrg);
	
	$hrg2 = oci_fetch_assoc($hrg);
	$hrghrg = $hrg2['HARGA'];
	
	$jml = 2;
	$hrgjml = $hrghrg * $jml;
	$hrglama = $hrghrg * 2;
	
	$hrgttl = $hrghrg + $hrgjml + $hrglama;
	echo $hrgttl;
?>