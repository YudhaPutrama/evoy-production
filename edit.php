<html lang="en">
<?php 
	include("konek.php");
?>
<head>
	<link rel="stylesheet" type="text/css" href="css/edit.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Profile</title>
	
	<!-- COBA -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link href="css/basic.css" rel="stylesheet">
    

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

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
	
	<div class="container">
	<?php 
		
		if (isset($_SESSION['username'])){
		$id=$_SESSION['username'];
		$sql="select * from pengunjung where email='$id'";
		include('konek.php');						
		$parsesql = oci_parse($conn, "SELECT * from pengunjung where email ='$id'");
		oci_execute($parsesql);	
		while($rows=oci_fetch_object($parsesql)){	
	?>
		
		<div class="row">
                    <div class="col-lg-6">
					<div class="panel-body">
		<form method="post">
		
		<br><br><br>
			<h3>EDIT PROFILE</h3>
			<br>
			<b>Nama</b> <input type="text" name="nama" class="form-control" value="<?php echo $rows->NAMA; ?>">
			<br><b>No KTP</b><input type="text" name="ktp" class="form-control" value="<?php echo $rows->NO_KTP; ?>" disabled>
			<br><b>Email</b><input type="email" name="email"  class="form-control" value="<?php echo $rows->EMAIL; ?>" disabled>
			<br><b>Password</b><input type="password" name="pass1" class="form-control" value="<?php echo $rows->PASSWORD; ?>">
			<br><b>Nomor HP</b><input type="text" name="nohp"  class="form-control" value="<?php echo $rows->NO_HP;?>">
			<br><b>Alamat</b><input type="text" name="alamat" class="form-control" value="<?php echo $rows->ALAMAT; }}?>"></textarea>
			<br>
			<input type="submit" name="update" class="btn btn-primary" value="UPDATE" >
		</form>
		</div>
	</div>
                    
                </div>
			
				<br>
				
		<form method="post" action="" enctype="multipart/form-data">
			<div id="uploadktp">
				<div align="left">Upload Foto KTP di Sini</div><br>
				<input type="file" name="fotoktp"><br>
				<div align="right"><input type="submit" value="UPLOAD" name="ktpup" class="btn btn-default"></div>
			</div>
		</form>
		<br>
	<?php 
		$ktp = oci_parse($conn,"select * from pengunjung where email='$id'");
		oci_execute($ktp);
		$k = oci_parse($conn,"select count(gambar) as adatidak from pengunjung where email='$id'");
		oci_execute($k);
		$l = oci_fetch_assoc($k);
		$z = $l['ADATIDAK'];
		if($z != 0){
			while($rows=oci_fetch_object($ktp)){
	?>
		<div style="height:100px;width:100px;margin-top:-414px;margin-left:630px;">
		Foto KTP : 
			<img src="pages/ktp/<?php echo $rows->GAMBAR;?>" width="250px" height="250px"></img>
		</div>
	<?php 
			}
		} else {
	?>
		<div style="height:100px;width:300px;margin-top:-414px;margin-left:630px;">
		Foto KTP : <br><br>
			Belum di Upload.<br>
			Silahkan Upload Lewat Form di Atas.
		</div>
	<?php 
		}
	?>
	<?php
		if(isset($_POST['update'])){
			if (isset($_SESSION['username'])){
				$id=$_SESSION['username'];
				$namabaru = $_POST['nama'];
				$pass = $_POST['pass1'];
				$ktpbaru = $_POST['ktp'];
				$nobaru = $_POST['nohp'];
				$almtbaru = $_POST['alamat'];
				$up = oci_parse($conn,"update pengunjung set nama='$namabaru',password='$pass',
										no_hp='$nobaru',  alamat='$almtbaru' where email='$id'");
				if(oci_execute($up)){
					echo "<script>
								alert('Data berhasil diupdate');
								window.location.replace('edit.php');
						</script>";
					oci_commit($conn);
				}
			}
		}
	?>
	<?php 
		$id=$_SESSION['username'];
		if(isset($_POST['ktpup'])){
			$foto = $_FILES['fotoktp']['name'];
			$tmp_name = $_FILES['fotoktp']['tmp_name'];
			$path = "pages/ktp/".$foto;
			move_uploaded_file($tmp_name,$path);
			
			$insert = oci_parse($conn,"update pengunjung set gambar='$foto' where email='$id'");
			oci_execute($insert);
			oci_commit($conn);
			if($insert){
				echo "<script>alert('Berhasil Upload!');document.location='edit.php';</script>";
			}

		}
	?>
	</div>
</body>
</html>