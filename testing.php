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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css\detailbaju.css">
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
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" >
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Evoy Production</a>
				<ul style="list-style-type : none;">
					<li class="login" style="float:right; margin-right:-925px; margin-top:-10px;"><a href="register.php">Sign Up</a></li>
					<li class="sign" style="float:right; margin-right:-803px; margin-top:-10px;"><a href="login.php">Login</a></li>
				</ul>
            </div>
			<div class="right-left">
							<ul>

							</ul>
						</div>
						<div class="clear"> </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav navbar-right" >
                   <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Katalog</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="index.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>

<div id="Basic"></div>
		
		<div id="imgholder">
			<img id="less" src="img/index.jpg">						
		</div>	
		<div id="ket">
			Deskripsi Baju 
		</div>
		<div id="hrg">
			<p style="text-align:center;color:red;font-size:25px;line-height:30px">Rp 100.000</p>
			<font size="1"><i>*Harga diatas per 3 hari peminjaman</i></font>
		</div>
		<div id="stk">
			<p style="text-align:center;color:black;font-size:25px;line-height:15px">Stok Baju</p><br>
			<p style="text-align:center;color:black;font-size:25px;line-height:0px">5</p>
		</div>
		<div id="pinjam">
		<div id="button"><a href="#popup">Pinjam</a></div>
		<div id="popup">
			<div class="window">
				<a href="#" class="close-button" title="Close">X</a>
					<form action="#popup2" method="post">
						<div id="isidata">
						Anda Harus Login dulu<br>
						Klik <a href="login.php">disini</a> untuk Login
				
						</div>
					</form>
			</div>
		</div>
		<div id="popup2">
			<div class="window2">
				<a href="#" class="close-button2" title="Close">X</a>
				<div id="imghold">
					<img id="les" src="img/index.jpg">	
				</div>
				<div id="capjml">
					Jumlah Barang
				</div>
				<div id="jml">
					<select>
						<option disabled="disabled" selected="selected">Jumlah Barang</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
				<div id="capkrr">
					Pilih Kurir
				</div>
				<div id="krr">
					<select>
						<option disabled="disabled" selected="selected">Kurir</option>
						<option value="jne">JNE</option>
						<option value="pos">Kantor Pos</option>
						<option value="tiki">Tiki</option>
					</select>
				</div>
				<div id="caplama">
					Lama Pinjam
				</div>
				<div id="lama">
					<select>
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
					Total Harga
				</div>
				<div id="ttl">
					Rp. 50.000,-
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
				<div id="detpem">
					
				</div>
				<div id="btnpinjam">
					<form action="#popup3">
						<div id="btnpinjam">
							<input type="submit" value="Pinjam" name="pinjam" />
						</div>
					</form>
				</div>
			</div>
		</div>
		<div id="popup3">
			<div class="window3">
				<a href="#" class="close-button3" title="Close">X</a>
				<p> Silahkan Transfer Ke : xxxxxxxxxxx <br>
					Sebesar : xxxxxx <br>
					(Proses akan dibatalkan jika tidak melakukan pembayaran dalam waktu 1 x 24 jam)
				</p>
			</div>
		</div>
		

	</nav>
	
 <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>
    
</body>
<html>