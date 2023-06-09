<?php session_start();
	if(session_is_registered('username')){
		include "koneksi.php";

	if(isset($_POST['submit'])){
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$nomer_handphone = $_POST['nomer_handphone'];
		
		if (empty($alamat) && empty($nomer_handphone)) {
			header('location:sunting_kontak_kami.php?error=1');
		} else if (empty($alamat)) {
			header('location:sunting_kontak_kami.php?error=2');
		} else if (empty($nomer_handphone)) {
			header('location:sunting_kontak_kami.php?error=3');
		} else {
			mysql_query("UPDATE tabel_kontakkami SET alamat='$alamat',email='$email',nomer_handphone='$nomer_handphone'");
			header('location:sunting_kontak_kami.php?result=1');
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - Sunting Kontak</title>
<meta name="keywords" content="shoes store, free template, ecommerce, online shop, website templates, CSS, HTML" />
<meta name="description" content="Shoes Store is a free ecommerce template provided by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body>
	<div id="templatemo_body_wrapper">
		<div id="templatemo_wrapper">
			<div id="templatemo_header">
				<div id="site_title"><h1><a href="beranda_admin.php">Online Jersey Store</a></h1></div>
				<div class="cleaner"></div>
			</div> <!-- END of templatemo_header -->
    
			<div id="templatemo_main">
				<?php include "sidebar_admin.php";?>
				<div id="content" class="float_r">
					<h2>Sunting Kontak</h2>
					<?php
						$data = mysql_fetch_array(mysql_query("select * from tabel_kontakkami"));
					?>
					<form method="post" action="">
						Alamat<br>
						<textarea name="alamat" cols="80" rows="2"><?php echo $data['alamat']; ?></textarea><br><br>
						Email<br>
						<input type="text" name="email" size="30" value="<?php echo $data['email']; ?>"><br><br>
						Nomer Handphone<br>
						<input type="text" name="nomer_handphone" size="30" value="<?php echo $data['nomer_handphone']; ?>"><br>
						<?php
							if (!empty($_GET['error'])) {
								if ($_GET['error'] == 1) {
									echo "<font color=#ff0000 size=1>Isian tidak boleh kosong !</font>";
								} else if ($_GET['error'] == 2) {
									echo "<font color=#ff0000 size=1>Alamat belum diisi !</font>";
								} else if ($_GET['error'] == 3) {
									echo "<font color=#ff0000 size=1>Telepon belum diisi !</font>";
								}
							}
						?>
						<?php
							if (!empty($_GET['result'])) {
								if ($_GET['result'] == 1) {
									echo "<font color=#ff0000 size=1>Data berhasil diubah</font>";
								}
							}
						?>
						<br><input name="submit" type="submit" value="   Ubah   " />
					</form><br>
					<div class="cleaner"></div>
				</div> 
				<div class="cleaner"></div>
			</div> <!-- END of templatemo_main -->
    
			<div id="templatemo_footer">
				Copyright © 2013 | Created & Edited by <b>Joe</b>
			</div> <!-- END of templatemo_footer -->
    
		</div> <!-- END of templatemo_wrapper -->
	</div> <!-- END of templatemo_body_wrapper -->
	
	<script type='text/javascript' src='js/logging.js'></script>
</body>

</html>

<?php
	}else{
		echo "<script>window.location='index.php'</script>";
	}
?>