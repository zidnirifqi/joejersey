<?php session_start();
	if(session_is_registered('username')){
		include "koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - Admin Joe Jersey's</title>
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
					<b>Halaman Awal</b>
					<table cellpadding="3" cellspacing="1" border="1" width="450">
						<tr>
							<td width="150" align="center"><a href="sunting_cara_pesan.php">Cara Pesan</a></td>
							<td width="150" align="center"><a href="sunting_faq.php">FAQ</a></td>
							<td width="150" align="center"><a href="sunting_kontak_kami.php">Kontak Kami</a></td>
						</tr>
					</table><br>
					
					<b>Admin</b>
					<table cellpadding="3" cellspacing="1" border="1" width="450">
						<tr>
							<td width="225" align="center"><a href="sunting_admin.php">Sunting</a></td>
							<td width="225" align="center"><a href="daftar_admin.php">Tambah</a></td>
						</tr>
					</table><br>
					
					<b>Produk</b>
					<table cellpadding="3" cellspacing="1" border="1" width="450">
						<tr>
							<td width="225" align="center"><a href="sunting_produk.php">Sunting</a></td>
							<td width="225" align="center"><a href="tambah_produk.php">Tambah</a></td>
						</tr>
					</table><br>
					
					<b>Kategori Produk</b>
					<table cellpadding="3" cellspacing="1" border="1" width="450">
						<tr>
							<td width="225" align="center"><a href="sunting_kategori.php">Sunting</a></td>
							<td width="225" align="center"><a href="tambah_kategori.php">Tambah</a></td>
						</tr>
					</table><br>
					
					<b>Pesan Barang</b>
					<table cellpadding="3" cellspacing="1" border="1" width="450">
						<tr>
							<td colspan="2" align="center"><a href="daftar_pemesan.php">Daftar Pemesan</a></td>
						</tr>
					</table><br>
					
					<b>Komentar</b>
					<table cellpadding="3" cellspacing="1" border="1" width="450">
						<tr>
							<td colspan="2" align="center"><a href="sunting_komentar.php">Daftar Komentar</a></td>
						</tr>
					</table><br>
						
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