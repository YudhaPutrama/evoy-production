<HTML>
	<head>
		<title>Transaksiku</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>evoy production</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
		<div id="tabtengah">
			<table border = "1" class="table table-stripe table-hover">
				<thead>
					<tr>
						<th>Kode Peminjaman</th>
						<th>Kode Pakaian</th>
						<th>Lama Pinjam</th>
						<th>Jumlah</th>
						<th>Total Harga</th>
						<th>Nomor Resi Pengiriman</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						include('konek.php');
						if (isset($_SESSION['username'])){
							$id=$_SESSION['username'];
							$data = "select * from peminjaman where email='$id'";
							$query=oci_parse($conn,"select*from peminjaman where no_ktp = (select no_ktp from pengunjung where email='$id') order by id_peminjaman desc");
							oci_execute($query);
							while($rows=oci_fetch_object($query)){
								echo "<tr>
										<td>".$rows->ID_PEMINJAMAN."</td>
										<td>".$rows->KODE_PAKAIAN."</td>
										<td>".$rows->LAMA_PINJAM." Hari</td>
										<td>".$rows->JUMLAH."</td>
										<td>".$rows->TOTAL_HARGA."</td>
										<td>".$rows->NO_RESI."</td>"
										
								?>	<td>
										<form method="post" action="transaksiku2.php?id_peminjaman=<?=$rows->ID_PEMINJAMAN?>">
											<input type="submit" name="sb" class="btn btn-small btn-danger" value="Detail" />
											<input type="hidden" name="kode" value="<?php echo $rows->ID_PEMINJAMAN;?>" />
										</form>
									</td>
									<td>
										<form method="post" action="prosesbatal.php?id_peminjaman=<?=$rows->ID_PEMINJAMAN?>">
										<?php
											$aa = oci_parse($conn,"select count(no_resi) as resi from peminjaman where id_peminjaman='$rows->ID_PEMINJAMAN'");
											oci_execute($aa);
											$bb = oci_fetch_assoc($aa);
											$cc = $bb['RESI'];
											if($cc!=0){
										?>
											<input type="submit" name="btl" class="btn btn-small btn-danger" value="Batalkan" disabled/>
											<input type="hidden" name="id" value="<?php echo $rows->ID_PEMINJAMAN;?>" />
										<?php
											} else{
										?>
												<input type="submit" name="btl" class="btn btn-small btn-danger" value="Batalkan" onclick="return confirm('Apakah anda yakin membatalkan transaksi ini?')"/>
												<input type="hidden" name="id" value="<?php echo $rows->ID_PEMINJAMAN;?>" />
										<?php
											}
										?>
										</form>
									</td>
								</tr>
							<?php } 
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>