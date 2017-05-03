<?php
	include("connect.php");
	
	if(isset($_POST['kmbl'])){
		$id = $_POST['id'];
		$stokt = oci_parse($conn,"select jumlah  from peminjaman where id_peminjaman='$id'");
		oci_execute($stokt);
		$stok = oci_fetch_assoc($stokt);
		$jmlpinjam = (int) $stok['JUMLAH'];
		$m = oci_parse($conn,"select stok from pakaian where kode_pakaian = 
								(select kode_pakaian from peminjaman where id_peminjaman='$id')");
		oci_execute($m);
		$mm = oci_fetch_assoc($m);
		$mmm = (int) $mm['STOK'];
		$stokbaru = $jmlpinjam + $mmm;
		$up = oci_parse($conn,"update pakaian set stok='$stokbaru' where kode_pakaian = 
								(select kode_pakaian from peminjaman where id_peminjaman='$id')");
		oci_execute($up);
		$konfirm = oci_parse($conn,"delete from pengembalian where id_peminjaman = '$id'");
		oci_execute($konfirm);
		$konfirm2 = oci_parse($conn,"delete from peminjaman where id_peminjaman = '$id'");
		oci_execute($konfirm2);
		oci_commit($conn);
		echo "<script type='text/javascript'>document.location='kembali.php'</script>";
		exit();
	}
?>