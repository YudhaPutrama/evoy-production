<?php
	include("konek.php");

	$stok = oci_parse($conn,"select angka from coba where angka='5'");
	oci_execute($stok);
	$coba = oci_fetch_assoc($stok);
	$i = 1;
	while ($i <= $coba['ANGKA']){
		echo $i;
		$i++;
	}
?>
	