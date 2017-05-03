<HTML>
	<head>
	
		<link rel="stylesheet" type="text/css" href="css/detailbaju.css">
		<title>Transaksiku</title>
		 <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- COBA -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Bootstrap Core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css\agency.min.css">
		<link href="css\basic.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<link href="css/agency.min.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
		<![endif]-->

		
	</head>
	<body>
		<!-- Navigation -->
     <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Evoy Production</a>
				<ul style="list-style-type : none;">
					
				
	</div>
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#services">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#portfolio">Katalog</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php#contact">Contact</a>
                    </li>
				<?php
					session_start();
					if (isset($_SESSION['username'])){
						$id=$_SESSION['username'];
						$sql="select * from pengunjung where email='$id'";
						include('konek.php');						
						$parsesql = oci_parse($conn, "SELECT * from pengunjung where email ='$id'");
						oci_execute($parsesql);						
						while($rows=oci_fetch_object($parsesql)){	
						?>
						<li class="dropdown" >
					<a href="#" class="dropdown-toggle"  data-toggle="dropdown"><?php echo $rows->NAMA; } ?></a>
						<ul class="dropdown-menu" >
							<li>
								<a href="edit.php" style="color:black"><i class="fa fa-fw fa-user"></i> Edit Profile</a>
							</li>
							<li>
								 <a href="transaksiku.php"style="color:black"><i class="fa fa-fw fa-shopping-cart"></i> Transaksiku</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="proseslogout.php" style="color:black"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							</li>

						</ul>
					</li>
					<?php }else {
					?>
					<li>
                        <a class="page-scroll" href="login.php">Login</a>
                    </li>
					<li>
                        <a class="page-scroll" href="register.php">Daftar</a>
                    </li>
					<?php } ?>
				
                </ul>
            </div>
			</ul>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
	
</nav>
		<?php
			include("konek.php");
			if (isset($_SESSION['username'])){
				$id=$_SESSION['username'];
				if (isset($_POST['sb'])){
					$idp=$_GET['id_peminjaman'];
					$gmbr = oci_parse($conn,"select gambar from pakaian where kode_pakaian = 
							(select kode_pakaian from peminjaman where id_peminjaman = '$idp')");
					oci_execute($gmbr);
					while($row = oci_fetch_object($gmbr)){
		?>			
		<div id="imgholder">
			<?php echo "<img src='pages/gambar/".$row->GAMBAR."' width='305px' height='300px'/>"; ?>				
		</div>
		<div id="ket">
		Kode Peminjaman : <?php echo $idp; ?> <br>
		<?php
					}
					$idk = oci_parse($conn,"select kode_pakaian from peminjaman where id_peminjaman = '$idp'");
					oci_execute($idk);
					while($row = oci_fetch_object($idk)){
					?>
				
		Id Pakaian : <?php echo $row->KODE_PAKAIAN; 
					}
					$namabaju = oci_parse($conn,"select nama_pakaian from pakaian where kode_pakaian = 
									(select kode_pakaian from peminjaman where id_peminjaman='$idp')");
					oci_execute($namabaju);
					while($row = oci_fetch_object($namabaju)){
					?>
		<br>
		Nama Pakaian : <?php echo $row->NAMA_PAKAIAN; 
					}
					$asal = oci_parse($conn,"select asal_daerah_pakaian from pakaian where kode_pakaian = 
								(select kode_pakaian from peminjaman where id_peminjaman='$idp')");
					oci_execute($asal);
					while($row = oci_fetch_object($asal)){
		?>
		<br>
		Asal Pakaian : <?php echo $row->ASAL_DAERAH_PAKAIAN;
					}
					$tglpinjam = oci_parse($conn,"select tgl_pinjam from peminjaman where id_peminjaman='$idp'");
					oci_execute($tglpinjam);
					while($row = oci_fetch_object($tglpinjam)){
					?>
		<br>
		Tanggal Pinjam : <?php echo $row->TGL_PINJAM;
					}
					$tglkembali = oci_parse($conn,"select tgl_kembali from peminjaman where id_peminjaman='$idp'");
					oci_execute($tglkembali);
					while($row = oci_fetch_object($tglkembali)){
					?>
		<br>
		Tanggal Kembali : <?php echo $row->TGL_KEMBALI;
					}
					?>
		
		<?php		
				}
		?>
		</div>
		<?php
			}
		?>

		<div id="btnuploadresi">
			<center>UPLOAD BUKTI PENGEMBALIAN ANDA DI SINI</center>
			<form method="post" enctype="multipart/form-data">
				Keterangan Info Pengembalian 
				<input type="text" name="noresi" class="form-control" required><br>
				<input type="file" name="gambar" >
				<div align = "right">
				<input type="submit" name="sbresi" value="UPLOAD" class="btn btn-default">
				</div>
			</form>
		</div>
		
		<?php 
			if (isset($_SESSION['username'])){
				if(isset($_POST['sbresi'])){
					$idpem = $_GET['id_peminjaman'];
					$noresi = $_POST['noresi'];
					$tgl = date('d-M-y');
					$gambar = $_FILES['gambar']['name'];
					$tmp_name = $_FILES['gambar']['tmp_name'];
					$path = "pages/resipengembalian/".$gambar;
					move_uploaded_file($tmp_name,$path);

					$insert = oci_parse($conn,"update pengembalian set no_resi_gambar='$noresi', gambar='$gambar',tanggal ='$tgl' where id_peminjaman ='$idpem'");
					oci_execute($insert);
					oci_commit($conn);
					echo "<script type='text/javascript'>alert('Upload Berhasil!');document.location='transaksiku.php'</script>";
					exit();
				}
			}
				
			
		?>
		
		<div id="btnuploadtf">
			<center>UPLOAD BUKTI TRANSFER ANDA DI SINI</center><br>
			<form method="post" enctype="multipart/form-data">
				<input type="file" name="foto">
				<div align = "right">
				<input type="submit" name="sbtf" value="UPLOAD" class="btn btn-default">
				</div>
			</form>
		</div>
		
		<?php
		if (isset($_SESSION['username'])){
			if(isset($_POST['sbtf'])){
				$idpem = $_GET['id_peminjaman'];
				$kode = oci_parse($conn,"select max(id_tf) as maxid from buktitf");
				oci_execute($kode);
				while($rows=oci_fetch_object($kode)){
					$kodebaru = $rows->MAXID;
				}
				$id = (int) $kodebaru;
				$id++;	
				
				$foto = $_FILES['foto']['name'];
				$tmp_name = $_FILES['foto']['tmp_name'];
				$path = "pages/transfer/".$foto;
				move_uploaded_file($tmp_name,$path);

				$insert = oci_parse($conn,"insert into buktitf values('$id','$foto','$idpem')");
				oci_execute($insert);
				oci_commit($conn);
				echo "<script type='text/javascript'>alert('Upload Berhasil!');document.location='transaksiku.php'</script>";
				exit();
			}
		}
		?>

	</body>
</html>