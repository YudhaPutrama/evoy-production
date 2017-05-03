<?php
session_start();
$servername = "localhost";
$usernamee="root";
$passwordd="";
$database="evoy";

$conn = mysqli_connect($servername, $usernamee, $passwordd, $database);

			$id=$_GET['id_pakaian'];
			$query=mysqli_query($conn,"Select * from pakaian where id_pakaian='$id'");
			while($data=mysqli_fetch_array($query)){
				$namapk=$data['nama'];
				$asal=$data['asal_daerah_pakaian'];
				$gambar=$data['gambar'];
				$desk=$data['deskripsi'];
				$harga=$data['harga'];
				$stok=$data['stok'];
			}
			$idp=$_SESSION['username'];
			$sql="select * from pengunjung where id_pengunjung='$idp'";
			$konek=mysqli_query($conn,$sql);
			while($data=mysqli_fetch_array($konek)){
				$idpn=$data['id_pengunjung'];
				$nama=$data['nama'];
				$jenis=$data['jenis_kelamin'];
				$nohp=$data['no_hp'];
				$alamat=$data['alamat'];
			}
			
?>
<HTML>
	<HEAD> 
		<link rel="stylesheet" type="text/css" href="css\detailbaju.css">
		<TITLE>Pakaian Adat Bali</TITLE>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>   
	   $(function(){
		  $("#Basic").load("basic.html"); 
		});
	</script> 

	</head>
<body>
		<div id="Basic"></div>
		
		<div id="imgholder">
			<img id="less" src="<?php echo $gambar?>">						
		</div>	
		<div id="ket">
			<?php echo $desk ?>
		</div>
		<div id="hrg">
			<p style="text-align:center;color:red;font-size:25px;line-height:30px"><?php echo $harga ?></p>
			<font size="1"><i>*Harga diatas per 3 hari peminjaman</i></font>
		</div>
		<div id="stk">
			<p style="text-align:center;color:black;font-size:25px;line-height:15px">Stok Baju</p><br>
			<p style="text-align:center;color:black;font-size:25px;line-height:0px"><?php echo $stok?></p>
		</div>
		<div id="pinjam">
		<div id="button"><a href="#popup2">Pinjam</a></div>
		<div id="popup">
			<div class="window">
				<a href="#" class="close-button" title="Close">X</a>
					
			</div>
		</div>
		</div>
		<div id="popup2">
			<div class="window2">
				<a href="#" class="close-button2" title="Close">X</a>
				<div id="imghold">
					<img id="les" src="<?php echo $gambar?>">	
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
					Rp. <?php echo $harga?>
				</div>
				<div id="capket">
					Keterangan
				</div>
				<div id="textket">
					<textarea name="keterangan" placeholder="Keterangan tambahan. Misalnya Ukuran baju,dll" style="width: 277px; height: 42px;"></textarea>
				</div>
				
				<div id="btnpinjam">
					<form>
						<div id="btnpinjam">
						<a href="#popup3">Pinjam</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		
		
		<div id="popup3">
			<div class="window3">
			<form method="post" action="transfer.php">
				<a href="#" class="close-button2" title="Close">X</a>
				<h3> Detail Peminjaman <h3>
					 <div class="col-md-6">
                                <div class="form-group">
                                    Nama : <input type="text" class="form-control" placeholder="Nama:<?php echo $nama ?>" readonly="readonly" >
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
							<input type="text"  class="form-control" placeholder="<?php echo $jenis ?>" id="name" />
                                    <p class="help-block text-danger"></p>
                                   
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="No HP *" id="phone"/>
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                    <input type="text"class="form-control" placeholder="Alamat *" id="phone" />
                                    <p class="help-block text-danger"></p>
                                </div>					 
								 <div class="form-group">
                                    <input type="email"  class="form-control" placeholder="Email *" id="phone" />
                                    <p class="help-block text-danger"></p>
                                </div>
								</div>
								 <div class="col-md-6">
							
								  <div class="form-group">
                                    <input type="text"  class="form-control" placeholder="Nama Pakaian *" name="namap" />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                     <input type="text"  class="form-control" placeholder="Asal Daerah Pakaian *" name="asal" />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                      <input type="text"  class="form-control" placeholder="Ukuran *" name="ukuran" />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                      <input type="text"  class="form-control" placeholder="Jumlah *" name="jumlah" />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                      <p>Tgl Pinjam</p><input type="text" class="form-control" placeholder="Tgl_pinjam *" name="tglpinjam" />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                      <input type="text"  class="form-control" placeholder="Tgl_kembali *" name="tglkembali" />
                                    <p class="help-block text-danger"></p>
                                </div>
								<div class="form-group">
                                      <input type="text"  class="form-control" placeholder="Harga *" name="harga" />
                                    <p class="help-block text-danger"></p>
                                </div>
								
								</div>
								<div id="btnpinjam">
					
						<div id="btnpinjam">
						<input type="submit" name="submit" value="Pinjam">
						</div>
					</form>
				</div>
                            </div>
							</div>
				
		
		
</body>
</html>
 
	