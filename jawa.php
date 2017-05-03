<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>evoy production</title>

    <!-- Bootstrap Core CSS -->
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
				<?php
				
$servername = "localhost";
$usernamee="root";
$passwordd="";
$database="evoy";

$conn = mysqli_connect($servername, $usernamee, $passwordd, $database);



				session_start();
				if (isset($_SESSION['username'])){
					$id=$_SESSION['username'];
					$sql="select * from pengunjung where id_pengunjung='$id'";
					$konek=mysqli_query($conn,$sql);
					while($data=mysqli_fetch_array($konek)){
						$nama=$data['nama'];
					}
					?> 
					<li class="dropdown" style="float:right; margin-right:-925px; margin-top:-10px;"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $nama ?></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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
                        <a class="page-scroll" href="#services">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Katalog</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
	
    </nav>
				
		
<div id="Basic"></div>

		
		<!------Search Box---------->
		<form>
			<input class="search" type="text" placeholder="Cari..." required>	
			<input class="button" type="button" value="Cari">		
		</form>
		<!------End Search Box------>
		
		<!------Content ------------>
	<?php
$servername = "localhost";
$usernamee="root";
$passwordd="";
$database="evoy";

$conn = mysqli_connect($servername, $usernamee, $passwordd, $database);
			
			$id=$_GET['asal_daerah_pakaian'];
			$query=mysqli_query($conn,"Select * from pakaian where asal_daerah_pakaian='jawa'");
			while($data=mysqli_fetch_object($query)){
			}
			?>
		<div id="kiri">
			<hr class="onepixel">
			KATEGORI PULAU
			<hr class="onepixel">
			<ul id="simple">
				<li><a href="jawa.php">Pulau Jawa</a></li>
				<li><a href="kalimantan.php">Pulau Kalimantan</a></li>
				<li><a href="sulawesi.php">Pulau Sulawesi</a></li>
				<li><a href="sumatera.php">Pulau Sumatera</a></li>
				<li><a href="papua.php">Pulau Papua</a></li>				
			</ul>
		
		</div>
		<div id="tengah">
			<div id="ContentMenu">
				<a href="bali.php">
				<div id="Artic">
				<center>
					<div id="Caption"> Pakaian Adat Bali</div>
					<div id="imgholder">
						<img id="less" src="img/index.jpg" alt="article">						
					</div>					
				</center>
				</div>
				</a>
				
			</div>
			
			
				
		</div>
</body>
</html>