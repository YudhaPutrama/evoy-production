<?php
	include('konek.php');
	if(isset($_POST['submit'])){
		$nama=$_POST['nama'];
		$ktp =$_POST['ktp'];
		$email = $_POST['email'];
		$pass1=$_POST['pass1'];
		$jk=$_POST['gender'];
		$notelp=$_POST['nohp'];
		$tgllahir=$_POST['tgllahir'];
		$alamat=$_POST['alamat'];
		$cek = oci_parse($conn,"select * from pengunjung where email='$email'");
		oci_execute($cek);
		if($cek==true){
			while($row=oci_fetch_object($cek)){
				if($email==$row->EMAIL){
					echo "<script type='text/javascript'>alert('Email Telah Terdaftar!');document.location='register.php'</script>";
					exit();
				}
			}
		}
		$cek2 = oci_parse($conn,"select * from pengunjung where no_ktp='$ktp'");
		oci_execute($cek2);
		if($cek2==true){
			while($row=oci_fetch_object($cek2)){
				if($ktp==$row->NO_KTP){
					echo "<script type='text/javascript'>alert('Nomor KTP Sudah Terdaftar!');document.location='register.php'</script>";
					exit();
				}
			}
		}
		
		$insert=oci_parse($conn, "insert into pengunjung values('$ktp','$email','$nama','$pass1','$jk','$notelp','$tgllahir','$alamat','')");
		oci_execute($insert);
		if($insert==true){
			oci_commit($conn);
			echo "<script type='text/javascript'>alert('Berhasil Daftar!');document.location='login.php'</script>";
			exit();
		}		
		
	}
?>