<?php 
	session_start();
	if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Evoy Production</title>

<!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Evoy Production</a>
            </div>
             <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li class="divider"></li>
						<?php
							include("connect.php");
							$psn = oci_parse($conn,"select * from pesan order by id_pesan desc");
							oci_execute($psn);
							$jml = oci_parse($conn,"select count(id_pesan) as jmlpsn from pesan");
							oci_execute($jml);
							$jmlambil = oci_fetch_assoc($jml);
							$p = $jmlambil['JMLPSN'];
							if ($p!=0){
								while($rows=oci_fetch_object($psn)){
									$ttlpesan = strlen($rows->PESAN);
									if ($ttlpesan >70){
										$isipsn = substr($rows->PESAN,0,25);
										$isipsntampil = $isipsn."...";
									}else{
										$isipsntampil = $rows->PESAN;
									}
						?>
                        <li>
                            <a href="pesan.php?idpesan=<?php echo $rows->ID_PESAN;?>">
                                <div>
                                    <strong><?php echo $rows->NAMA_PENGIRIM;?></strong>
                                    <span class="pull-right text-muted">
                                        <em><?php echo $rows->TANGGAL;?></em>
                                    </span>
                                </div>
                                <div><?php echo $isipsntampil; ?></div>
                            </a>
                        </li>
						<?php 
								}
							}else{
						?>
						<li>
                            <a href="#">
                                <div>
                                    <strong>Belum Ada Pesan Masuk.</strong>
                                    <span class="pull-right text-muted">
                                        <em></em>
                                    </span>
                                </div>
                                <div></div>
                            </a>
                        </li>
						<?php
							}
						?>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="semuapesan.php">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="proseslogout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Pemesanan</a>
                        </li>
                        <li>
                            <a href="#"></i><img src="baju.png" height="15" width="15" />&nbsp; Data Pakaian<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="inputpakaian.php">Input Pakaian</a>
                                </li>
                                <li>
                                    <a href="viewpakaian.php">Lihat Pakaian</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						
						<li>
                            <a href="viewpengunjung.php"><i class="fa fa-user fa-fw"></i> Lihat Data Pengunjung</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
						
                        <li>
                            <a href="pinjam.php"><i class="fa fa-shopping-cart fa-fw"></i> Transaksi Peminjaman</a>
                        </li>
                        <li>
                            <a href="kembali.php"><i class="fa fa-folder-open   fa-fw"></i> Transaksi Pengembalian</a>
                        </li>
						<li>
                            <a href="buktitf.php"><i class="fa fa-folder-open   fa-fw"></i> Lihat Bukti Transfer</a>
                        </li>
   
                        
                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lihat Pakaian</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Pakaian
                        </div>
            <!-- /.row -->
            <?php
	$username="evoy";
	$password="evoy";
	$dbname="localhost/XE";
	$conn=oci_connect($username, $password, $dbname);
		if (!$conn) {
			echo "Koneksi ke server database gagal dilakukan";
			exit();
		}else{

	}
?>
<?php

if(isset($_POST['submit'])){
	$kode=$_POST['KODE_PAKAIAN'];
	$namapk=$_POST['namapk'];
	$asal=$_POST['asal'];
	$prov=$_POST['prov'];
	$desk=$_POST['desk'];
	$stok=$_POST['stok'];
	$harga=$_POST['harga'];
	$gambar = $_FILES['gambar']['name'];
	$tmp_name = $_FILES['gambar']['tmp_name'];
	$path = "gambar/".$gambar;
	move_uploaded_file($tmp_name,$path);
	$insert=oci_parse($conn, "insert into pakaian values ('$kode','$namapk','$asal','$desk','$stok','$harga','$gambar','$prov')");
	if(oci_execute($insert)){
	}	
}
	$parsesql = oci_parse($conn, "SELECT * from pakaian");
		oci_execute($parsesql);
		$no=1;?><div class="panel-body">
                             <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                               <thead>
			<tr>
				<th>No</th>
				<th>Kode<br> Pakaian</th>
				<th>Nama<br> Pakaian</th>
				<th>Asal <br>Pulau</th>
				<th>Asal <br>Provinsi</th>
				<th>Deskripsi</th>
				<th>Stok</th>
				<th>Harga</th>
				<th>Gambar</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
		while($rows=oci_fetch_object($parsesql)){
			
			echo '<tr> ';
						echo '<td>'.$no++.'</td>';
						echo '<td>'.$rows->KODE_PAKAIAN.'</td>';
						echo '<td>'.$rows->NAMA_PAKAIAN.'</td>';
						echo '<td>'.$rows->ASAL_DAERAH_PAKAIAN.'</td>';
						echo '<td>'.$rows->ASAL_PROV.'</td>';
						echo '<td>'.$rows->DESKRIPSI.'</td>';
						echo '<td>'.$rows->STOK.'</td>';
						echo '<td>'.$rows->HARGA.'</td>';
						echo '<td><img src="gambar/'.$rows->GAMBAR.'" width="100px"></td>';
						echo '<td>
							<a href="editpakaian.php?KODE_PAKAIAN='.$rows->KODE_PAKAIAN.'" class="btn btn-primary">Edit</a>'?>
							<form action="hapuspakaian.php?KODE_PAKAIAN=<?php echo $rows->KODE_PAKAIAN;?>" method="post">
								<input type="submit" name="btl" class="btn btn-small btn-danger" value="Hapus" onclick="return confirm('Apakah anda yakin membatalkan transaksi ini?')"/>
							</form>
						<?php '
								
							
						</td>';
					echo '</tr>';
	}
?>
</tbody>
</table>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

     <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
<?php 
	}else {
		die("Anda Tidak Berhak Mengakses Halaman Ini, Silahkan <a href='../login.php'>Login</a> Terlebih Dahulu!");
	}
?>
