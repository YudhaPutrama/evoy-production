<?php 
	session_start();
	include ("konek.php");
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$pas = $_POST['password'];
		if (($username == 'admin') AND ($pas == 'admin')){
			$_SESSION['username'] = $username;
			header("location:indexadmin.html");
			exit();
		}
		$query = "SELECT * FROM pengunjung WHERE email='$username' and password='$pas'";
		$hasil = oci_parse($conn,$query);
		oci_execute($hasil);
		while($row=oci_fetch_object($hasil)){
			if (($username == $row->EMAIL) AND ($pas == $row->PASSWORD)){
				$_SESSION['username'] = $username;
				$cek = oci_parse($conn,"select count(gambar) as cek from pengunjung where email='$username'");
				oci_execute($cek);
				$a = oci_fetch_assoc($cek);
				$b = $a['CEK'];
				if($b==0){
					echo "<script>alert('Silahkan Upload Foto KTP Jika Anda Ingin Proses Peminjaman Dapat di Proses!');document.location='edit.php'</script>";
				}else{
					header("location:katalog.php");
				}
			}
			exit();
		}
		echo "<script type='text/javascript'>alert('Email atau password yang anda masukkan salah !');document.location='login.php'</script>";
		
	}
?>