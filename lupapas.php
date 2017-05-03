<?php 
if (isset($_POST['submit'])) {
	include('konek.php');
	$email = $_POST['email'];
	$checkemail = oci_parse($conn, "select * from pengunjung where email = '$email'");
	oci_execute($checkemail);
	$checkemailarray = oci_fetch_assoc($checkemail);
	$emailambil = $checkemailarray['EMAIL'];
	if (oci_num_rows($checkemail) != 0) {
		$checkuser = oci_parse($conn, "select * from pengunjung where email = '$emailambil'");
		oci_execute($checkuser);
		$checkuserarray = oci_fetch_assoc($checkuser);
		require 'PHPMailer-master/PHPMailerAutoload.php';
		if (class_exists(@PHPMailer)) {
			$smtp_mail=new PHPMailer();
			$smtp_mail->isSMTP();
			$smtp_mail->SMTPAuth   = true;                  // enable SMTP authentication
			$smtp_mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
			$smtp_mail->AddEmbeddedImage('img/logoevoy.png', 'logo_2u');
			$smtp_mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
			$smtp_mail->Port       = 465;                   // set the SMTP port
			$smtp_mail->Username   = "bluepc3108@gmail.com";  // GMAIL username
			$smtp_mail->Password   = "ami123nazmi";            // GMAIL password
			$smtp_mail->SmtpConnect();
			$smtp_mail->From       = "bluepc3108@gmail.com";
			$smtp_mail->FromName   = "Evoy Production";
			$smtp_mail->addAddress("$email"); 
			$smtp_mail->Body    = 
			"
			<div style='background:#f5f5f0;height:400px;width:750px;'>
				<div style='margin-top:10px;margin-left:100px;'>
					<br>
					<img src = 'cid:logo_2u' width='200px' height='100px'> </img>
				</div><br>
				<div style='background:white;margin-top:10px;margin-left:100px;margin-right:100px;'>
				Dear ".$checkuserarray['NAMA'].",<br><br>
				Kami Menerima Permintaan Anda Untuk Mengirimkankan Password Ke Email Anda,Silahkan
				Mengecek Password Anda di Bawah ini : <br><br>
				Username : ".$checkuserarray['EMAIL']."<br>
				Password : ".$checkuserarray['PASSWORD']."<br>
				<br>
				Terima Kasih.
				</div>
			</div>
			"; //Text Body
			$smtp_mail->WordWrap   = 50; // set word warap
			$smtp_mail->isHTML(true); // send as HTML
			if(!$smtp_mail->Send()){
				echo "Mailer Error: " . $smtp_mail->ErrorInfo;
			} else {
			echo "<script>alert('Password telah di kirim ke email, Silahkan cek email anda.');window.location.replace('login.php');</script>";
			
			}					
		} else {
			echo "<script>alert('Error')</script>";
		}
	} else {
		echo "<script>alert('Akun dengan email tersebut tidak ditemukan.')</script>";
	}
}
?>
