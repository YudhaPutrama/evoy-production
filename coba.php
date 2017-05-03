<?php
	include("konek.php");
	$kode = oci_parse($conn,"select max(id_peminjaman) as maxkode from peminjaman");
	oci_execute($kode);
	while($rows=oci_fetch_object($kode)){
		$kodebaru = $rows->MAXKODE;
	}
	$no = (int) substr($kodebaru,5,3);
	$no++;
	$char = "EVOY-";
	$newid = $char . sprintf("%03s", $no);
	$ins = oci_parse($conn,"insert into peminjaman (id_peminjaman) values('$newid')");
	oci_execute($ins);
	oci_commit($conn);
	if($ins){
		echo "".$newid." berhasil di masukkan ";
	} else{
		echo "Gagal";
	}
?>