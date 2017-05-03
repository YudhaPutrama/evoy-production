<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>evoy production</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <!-- Page Content -->
    <div class="container">

        <div class="row">
				
            <div class="col-md-3">
			<?php 
include("../konek.php");
		$sql="select * from pakaian";
		$query=oci_parse($conn,$sql);
		oci_execute($query);
		while($data=oci_fetch_array($query)){
			$asal=$data[2];
		}
		?>
		<br><br><br>
		<input type="text" name="cari" class="form-control" placeholder="Cari Pakaian">
		<br>
                <p class="lead">Kategoori Pulau</p>
                <div class="list-group">
				<a href="kategori.php?asal=jawa" class="list-group-item">Pulau Jawa</a>
				<a href="kategori.php?asal=kalimantan" class="list-group-item">Pulau Kalimantan</a>
				<a href="kategori.php?asal=sulawesi" class="list-group-item">Pulau Sulawesi</a>
				<a href="kategori.php?asal=sumatera" class="list-group-item">Pulau Sumatera</a>
				<a href="kategori.php?asal=papua" class="list-group-item">Pulau Papua</a>	
                </div>
            </div>

            <div class="col-md-9">
          <div class="row">

<br><br><br><br>
                    


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
