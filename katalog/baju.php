<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="css/detailbaju.css">
		<TITLE>Pakaian Adat Bali</TITLE>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>evoy production</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/portfolio-item.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css\katalog.css" rel="stylesheet" type="text/css">
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
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
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
                <a class="navbar-brand page-scroll" href="index.php">Evoy Production</a>
				<ul style="list-style-type : none;">
				<?php 
					session_start();
					if (isset($_SESSION['username'])){
						$id=$_SESSION['username'];
						$sql="select * from pengunjung where email='$id'";
						include('../konek.php');						
						$parsesql = oci_parse($conn, "SELECT * from pengunjung where email ='$id'");
						oci_execute($parsesql);						
						while($rows=oci_fetch_object($parsesql)){	
				?>
						<li class="dropdown" style="float:right; margin-right:-925px; margin-top:-10px;"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $rows->NAMA; } ?></a>
						<ul class="dropdown-menu">
							<li>
								<a href="edit.php"><i class="fa fa-fw fa-user"></i>Edit Profile</a>
							</li>
							<li>
								<a href="transaksiku.php"><i class="fa fa-book fa-fw"></i> Transaksiku</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="proseslogout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							</li>
						</ul>
					</li>
					
				<?php }else {
					?>
					<li class="login" style="float:right; margin-right:-925px; margin-top:-10px;"><a href="register.php">Sign Up</a></li>
				<li class="sign" style="float:right; margin-right:-803px; margin-top:-10px;"><a href="login.php">Login</a></li> <?php } ?>
				
				</ul>
            </div>
			<div class="right-left">
							<ul>

							</ul>
						</div>
						<div class="clear"> </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
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
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
	
    </nav>
	<?php 
			include("../konek.php");
			$id=$_GET['kode_pakaian'];
			$sql = oci_parse($conn,"select * from pakaian where kode_pakaian= '$id'");
			oci_execute($sql);
			while($rows=oci_fetch_object($sql)){	
		?>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <br><h3 class="page-header">	<?php echo $rows->ASAL_DAERAH_PAKAIAN; ?> 
      
                </h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-4">
               <?php echo "<img id='less' class='img-responsive' style='height:400px;'src='../pages/gambar/".$rows->GAMBAR."' />"; ?></img>	
            </div>

            <div class="col-md-4">
                <h4><?php echo $rows->NAMA_PAKAIAN; ?> </h4>
                <p><?php echo $rows->DESKRIPSI; ?> </p>
			</div>
				<div class="col-md-4">               
			   <h4>Harga</h4>
       
               
			<p>Rp. <?php echo $rows->HARGA; ?></p>
			<font size="1"><i>*Harga diatas per 3 hari peminjaman</i></font>
			<br>
			<h4>Stok Baju<h4>
			<p><?php echo $rows->STOK; ?></p>
			<?php
			}
			?>
			</div>
		<?php 
			if (isset($_SESSION['username'])){
				$id=$_SESSION['username'];
		?>
		<div id="pinjam">
			<div id='button' ><a href='#popup' >Pinjam</a></div>
		</div>
		</div>
	
			<?php
				include('konek.php');
				$identitas = oci_parse($conn,"select * from pengunjung where email='$id'");
				oci_execute($identitas);
				while($rows=oci_fetch_object($identitas)){
			?>
		<div id="popup">
			<div class="window">
				<a href="#" class="close-button" title="Close">X</a>
					<form action="#popup2" method="post">
						<div id="isidata">
							<center>Cek Kembali Identitas Anda</center>
							Nama  <input type="text" placeholder="Nama Anda..." name="nama"value="<?php echo $rows->NAMA; ?>" /><br><br>
							No.HP <input type="text" placeholder="No.HP anda..." name="hp" value="<?php echo $rows->NO_HP; ?>" /><br><br>
							Alamat<textarea name="alamat" placeholder="Alamat anda..." ><?php echo $rows->ALAMAT; ?></textarea><br><br>
							<input type="submit" value="Next" name="next">
						</div>
					</form>
			</div>
		</div>
			<?php } ?>
			<?php
				include('konek.php');
				if(isset($_POST['next'])){
					$namabaru = $_POST['nama'];
					$nobaru = $_POST['hp'];
					$alamatbaru = $_POST['alamat'];
					
					$update = oci_parse($conn,"update pengunjung set nama='$namabaru', no_hp='$nobaru', alamat='$alamatbaru' where email='$id'");
					oci_execute($update);
					if($update){
						oci_commit($conn);
					}
				}
			?>
		<div id="popup2">
			<div class="window2">
				<a href="#" class="close-button2" title="Close">X</a>
				<div id="imghold">	
					<?php 
						include('konek.php');
						$idg=$_GET['kode_pakaian'];
						$gmr = oci_parse($conn,"select gambar from pakaian where kode_pakaian= '$idg'");
						oci_execute($gmr);
						while($rows=oci_fetch_object($gmr)){
							echo "<img id='less' src='img/".$rows->GAMBAR."' />"; 
						}
					?>					
				</div>
					<form action="#popup3" method="post">
						<div id="capjml">
							Jumlah Pakaian
						</div>
						<div id="jml">
							<select name='jml'>
								<option disabled="disabled" selected="selected">Jumlah Pakaian</option>
								<?php
									$idg = $_GET['kode_pakaian'];
									$stok = oci_parse($conn,"select stok from pakaian where kode_pakaian='$idg'");
									oci_execute($stok);					
									$nstok = oci_fetch_assoc($stok);
									$i = 1;
									while($i <= $nstok['STOK']){
								?>
								<option value="<?php echo $i; ?>"><?php echo $i ;?></option>
								<?php 
										$i++;
									}
								?>
							</select>
						</div>
						<div id="capkrr">
							Pilih Kurir
						</div>
						<div id="krr">
							<select name = 'krr'>
								<option disabled="disabled" selected="selected">Kurir</option>
								<option value="jne">JNE</option>
								<option value="pos">Kantor Pos</option>
								<option value="tiki">Tiki</option>
							</select>
						</div>
						<div id="caplama">
							Tanggal Pinjam
						</div>
						<div id="lama">
							<select name='lama'>
								<option disabled="disabled" selected="selected">Lama Pinjam</option>
								<option value="3">3 Hari</option>
								<option value="6">6 Hari</option>
								<option value="9">9 Hari</option>
								<option value="12">12 Hari</option>
								<option value="15">15 Hari</option>
								<option value="18">18 Hari</option>
								<option value="21">21 Hari</option>
								<option value="24">24 Hari</option>
								<option value="27">27 Hari</option>
								<option value="30">30 Hari</option>
							</select>
						</div>
						<div id="capttl">
							Lama Pinjam
						</div>
						<div id="ttl">
							<input type="date" name="tglpinjam" />
						</div>
						<div id="acc">
							Paket Aksesoris ?
						</div>
						<div id="capacc">
							<input type="radio" name="acc"  value ="Ya">Ya
							<input type="radio" name="acc"  value ="Tidak">Tidak
						</div>
						<div id="capket">
							Keterangan
						</div>
						<div id="textket">
							<textarea name="keterangan" placeholder="Keterangan tambahan. Misalnya Ukuran baju,dll" style="width: 277px; height: 42px;"></textarea>
						</div>
						<div id="capdetpem">
							Detail Peminjam
						</div>
						<?php
							$identitas = oci_parse($conn,"select * from pengunjung where email='$id'");
							oci_execute($identitas);
							while($rows=oci_fetch_object($identitas)){
						?>
						<div id="detpem">
							<div align="left">
								Nama : <?php echo $rows->NAMA ;?><br>
								Nomor HP : <?php echo $rows->NO_HP ;?><br>
								Alamat : <?php echo $rows->ALAMAT ; }?>
							</div>
						</div>
						<div id="btnpinjam">
							<div id="btnpinjam">
								<input type="submit" value="Pinjam" name="pjm" />
							</div>
					</form>
				</div>
				<div id="btnback">
					<form action="#popup" method="post">
						<input type="submit" value="Back" name="back" />
					</form>
				</div>
			</div>
		</div>
		<?php
			include('konek.php');
			$kdp=$_GET['kode_pakaian'];
			if (isset($_SESSION['username'])){
				$id=$_SESSION['username'];
				if(isset($_POST['pjm'])){
					$ktp = oci_parse($conn,"select no_ktp from pengunjung where email='$id'");
					oci_execute($ktp);
					while($rows=oci_fetch_object($ktp)){
						$noktp = $rows->NO_KTP;
					}
					
					$kode = oci_parse($conn,"select max(id_peminjaman) as maxkode from peminjaman");
					oci_execute($kode);
					while($rows=oci_fetch_object($kode)){
						$kodebaru = $rows->MAXKODE;
					}
					$no = (int) substr($kodebaru,5,3);
					$no++;
					$char = "EVOY-";
					$newid = $char . sprintf("%03s", $no);
					$jml = $_POST['jml'];
					$kurir = $_POST['krr'];
					$tglpjm = $_POST['tglpinjam'];
					$lama = $_POST['lama'];
					
					$newtgl=strtotime($tglpjm);
					$NewjumlahHari=86400*$lama;
					$hasilJumlah = $newtgl + $NewjumlahHari;
					$tglkembali=date("Y-m-d",$hasilJumlah);
					
					$acs = $_POST['acc'];
					$ket = $_POST['keterangan'];
					
					$hrg = oci_parse($conn,"select harga from pakaian where kode_pakaian = '$kdp'");
					oci_execute($hrg);

					$hrg2 = oci_fetch_assoc($hrg);
					$hrghrg = $hrg2['HARGA'];
					
					$hrglama = ($hrghrg * ($lama / 3))* $jml;
					if($acs == "Ya"){
						$hrgacs = 20000;
					}else {
						$hrgacs = 0;
					}
					$ongkir = 20000;
					
					$hrgttl = $hrgacs + $hrglama + $ongkir;

					$insert = oci_parse($conn,"insert into peminjaman values('$newid','$noktp','$kdp','$jml','$kurir','$tglpjm','$tglkembali','$lama','$acs','$ket','$hrgttl','')");
					oci_execute($insert);
					$hrgtampil = (int) $hrgttl;
					
					$idpeng = oci_parse($conn,"select max(id_pengembalian) as maxidpeng from pengembalian");
					oci_execute($idpeng);
					while($rows=oci_fetch_object($idpeng)){
						$kodebaru = $rows->MAXIDPENG;
					}
					$idpengbaru = (int) $kodebaru;
					$idpengbaru++;
					$insertpengembalian = oci_parse($conn,"insert into pengembalian values('$idpengbaru','$newid','$noktp','$kdp','','')");
					oci_execute($insertpengembalian);
					
					$stokambil = oci_parse($conn,"select stok from pakaian where kode_pakaian='$kdp'");
					oci_execute($stokambil);
					$stok = oci_fetch_assoc($stokambil);
					$stok2 = $stok['STOK'];
					$stokbaru = (int) $stok2 - $jml;
					$updatestok = oci_parse($conn,"update pakaian set stok='$stokbaru' where kode_pakaian='$kdp'");
					oci_execute($updatestok);
					oci_commit($conn);
					
			?>
		<div id="popup3">
			<div class="window3">
				<a href="#" class="close-button3" title="Close">X</a>
				<br>
				<p> Silahkan Transfer Ke : xxxxxxxxxxx <br>
					Sebesar : <?php echo $hrgtampil; ?> <br>
					(Proses akan dibatalkan jika tidak melakukan pembayaran dalam waktu 1 x 24 jam)
				</p>
			</div>
		</div>
		<?php
				}
			}
		?>
			<?php } else{ ?>
		<div id="pinjam">
			<div id='button'><a href='login.php'>Login</a></div>
		</div>
			<?php } ?>

		
		

</div>
       </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
       

  
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
