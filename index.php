<!DOCTYPE html>
<html lang="en">
<?php
	include("konek.php");
	if(isset($_POST['psn'])){						
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$nohp = $_POST['phone'];
		$pesan = $_POST['message'];
		
		$idpe = oci_parse($conn,"select max(id_pesan) as maxidp from PESAN");
		oci_execute($idpe);
		$idpesan = oci_fetch_assoc($idpe);
		$idbaru = (int) $idpesan['MAXIDP'];
		$idbaru++;
		$tgl = date('d-M-y');
		
		$input = oci_parse($conn,"insert into PESAN values('$idbaru','$nama','$email','$nohp','$pesan','$tgl')");
		oci_execute($input);
		oci_commit($conn);
		echo "<script>alert('Pesan Berhasil di Kirim')</script>";
	}
?>
<head>

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

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll" style="color:#fed136;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Evoy Production</a>
				<ul style="list-style-type : none;">
					
				
	</div>

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
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Selamat Datang di Evoy production</div>
                <div class="intro-lead-in">Website yang menyediakan Peminjaman Pakaian Adat</div>
                <a href="#services" class="page-scroll btn btn-xl">Lebih banyak tentang kami</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Apa itu evoy production?</h2>
                    <h3 class="section-subheading text-muted">Evoy Production, sebuah rumah usaha di Jalan Pangarang Dalam IV No.15, Lengkong Besar, Bandung menjual segala jenis kostum tradisional dan modern.<br>

Kostum tradisional yang diperjual belikan di sini pun bermacam-macam mulai dari Sabang sampai Merauke seperti kostum adat dari Padang, Bali, Aceh, Kalimantan, Jawa Barat, Jawa Tengah, Jawa Timur, dan lain-lain.<br>

Selain kostum ala daerah, Evoy Production pun menjual kostum modern dengan variasi-variasi motif yang sesuai dengan selera pembeli seperti kostum Ratu Inggris, kostum khas bangsawan Eropa dan lain-lain.<br>
Evoy, pengelola tempat ini memulai usahanya sejak tahun 1997.
Memiliki latar belakang seni serta mengenyam pendidikan di Sekolah Tinggi Ilmu Seni (STSI) Bandung, dia mulai membuka kostum tradisional yang bermarkas di kediamannya.
Untuk kualitas kostum yang dijual Evoy pun tak perlu diragukan lagi. Bahkan, kostum-kostum garapannya ini sudah dijual di berbagai negara antara lain Amerika, Belanda, Prancis, Spanyol, Singapura, dan Lebanon.</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.71685323952!2d107.60816011432748!3d-6.924411069698994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e628983fc315%3A0x13387bafc301c61a!2sEvoy+Production!5e0!3m2!1sen!2sid!4v1488758365431" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
            </div>
            
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Katalog</h2>
                     <h3 class="section-subheading text-muted">Berikut sebagian pakaian yang kami tawarkan, jika ingin melihat lebih lengkap klik 
					 <a href="katalog.php"> disini</a></h3>
                </div>
            </div>
            <div class="row">
			<?php
			include("konek.php");
			
			$query=oci_parse($conn, "select*from pakaian order by dbms_random.value");
			oci_execute($query);
			$d = 0;
			while(($data=oci_fetch_object($query))AND $d != 6){
				?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="baju.php?kode_pakaian=<?=$data->KODE_PAKAIAN?>" >
						<?php echo "<img src='pages/gambar/".$data->GAMBAR."' style='height:250px; width:400px'  class='img-responsive' />"; ?></img>
                    </a>
                    <div class="portfolio-caption">
                        <h4><?=$data->NAMA_PAKAIAN;?></h4>
						<p class="text-muted"><?=$data->HARGA;?></p>
                    </div>
                </div>
				<?php
				$d++;
			}
			?>
                
				
           
        </div>
		
    </section>
	<!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Tentang kami</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Januari 2017</h4>
                                    <h4 class="subheading">Story Website kami</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Kami membuat website ini untuk memenuhi tugas Proyek Tingkat I yang membuat aplikasi web. kami meranang web ini mulai dari bulan Januari sampai Mei 2017</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>Mei 2017</h4>
                                    <h4 class="subheading">Story Website kami</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Website ini untuk membantu mempromosikan produk peminjaman pakaian adat pada Evoy Production. Zaman sekarang, banyak sekali orang-orang yang kesulitan mencari pakaian adat secara online. kami hadir sebagai solusi untuk mempermudahkan orang-orang yang ingin meminjam pakauan adat.</p>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Kontak</h2>
                    <h3 class="section-subheading text-muted">Silahkan kirim pesan anda</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form method="post" id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Nama *" id="name" name="nama" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email *" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="No. HP *" id="phone" name="phone" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Pesan *" id="message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <input type="submit" name="psn" class="btn btn-xl" value="KIRIM PESAN" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Elfaizm</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/agency.min.js"></script>

</body>

</html>
