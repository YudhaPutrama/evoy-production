<html>
<head>

</head>

<body>
	<?php 
		include("konek.php");
		$id = $_GET['id_peminjaman'];
		//update stok
		$e = oci_parse($conn,"select stok from pakaian where kode_pakaian = 
								(select kode_pakaian from peminjaman where id_peminjaman='$id' )");
		oci_execute($e);
		$stok = oci_fetch_assoc($e);
		$stok2 = (int) $stok['STOK'];
		$r = oci_parse($conn,"select jumlah from peminjaman where id_peminjaman='$id'" );
		oci_execute($r);
		$rr = oci_fetch_assoc($r);
		$rrr = (int) $rr['JUMLAH'];
		$stokbaru = $stok2 + $rrr;
		$t = oci_parse($conn,"update pakaian set stok ='$stokbaru' where kode_pakaian = 
								(select kode_pakaian from peminjaman where id_peminjaman='$id')");
		oci_execute($t);
		
		
		$q = oci_parse($conn,"delete from peminjaman where id_peminjaman='$id'");
		oci_execute($q);
		
		$w = oci_parse($conn,"delete from pengembalian where id_peminjaman='$id'");
		oci_execute($w);
		if ($q AND $w AND $t){
			oci_commit($conn);
			echo "<script type='text/javascript'>document.location='transaksiku.php'</script>";
			exit();
		}
	?>
</body>

</html>