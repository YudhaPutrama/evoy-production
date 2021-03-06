<!DOCTYPE html>
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

    <title>Katalog Pakaian</title>
	
	<!-- COBA -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	 <link href="css/basic.css" rel="stylesheet">
	 <link href="css/shop-homepage.css" rel="stylesheet">
    

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
    <!-- Page Content -->
    <div class="container">
        <div class="row">	
            <div class="col-md-3">
			<?php 
			$sql="select * from pakaian";
			$query=oci_parse($conn,$sql);
			oci_execute($query);
			while($data=oci_fetch_array($query)){
				$asal=$data[2];
			}
			?>
			<br><br><br>
			<form method="get">
				<input type="search" name="key" class="form-control" placeholder="Cari Pakaian">
			</form>
			<br>
                <p class="lead">Kategoori Pulau</p>
                <div class="list-group">
					<?php 
						$pulau = oci_parse($conn,'select * from pulau');
						oci_execute($pulau);
						while($rows = oci_fetch_object($pulau)){
							echo "<a href = 'kategori.php?asal=$rows->ID_PULAU' class='list-group-item'>$rows->NAMA_PULAU</a>";
						}
					?>
                </div>
            </div>
			 <div class="col-md-9">
			 <div class="row">
			<br>
			<br>
			<br>
			<br>
			<?php
				if(!isset($_GET['key'])){
					$pakaian = oci_parse($conn,"select * from pakaian order by dbms_random.value");
				}else{
					$key = $_GET['key'];
					$pakaian = oci_parse($conn,"select * from pakaian where upper(nama_pakaian) like upper('%$key%')");
				}
				oci_execute($pakaian);
				while($rows=oci_fetch_object($pakaian)){
			?>
			 <div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<a href="baju.php?kode_pakaian=<?php echo $rows->KODE_PAKAIAN; ?>">
						<img src="pages/gambar/<?php echo $rows->GAMBAR; ?>" style="height:170px;width:150" alt="">
						<div class="caption">
						<h5><a href="baju.php?kode_pakaian=<?php echo $rows->KODE_PAKAIAN; ?>"><?php echo $rows->NAMA_PAKAIAN; ?></a></h5>
							<h4>Rp. <?php echo $rows->HARGA; ?></h4>
						</div>
					</a>
				</div>
				</div>
			<?php
				}			
			?>
        </div>
    </div>
	    </div>
	</div>
    <!-- /.container -->

    <!-- /.container -->

    <!-- jQuery -->
  <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
