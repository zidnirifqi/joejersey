<?php session_start();
	if(session_is_registered('username')){
		include "koneksi.php";
		$id_kategori = $_GET['id_kategori'];
		$query = mysql_query("select * from tabel_kategori where id_kategori='$id_kategori'") or die(mysql_error());
		$data = mysql_fetch_array($query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - Sunting Kategori</title>
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
					<h2>Sunting Kategori</h2>
					<form method="post" action="" >
						<table cellpadding="2" cellspacing="2" border="0" width="270">
							<tr>
								<td width="120">Nama Kategori</td>
								<td width="10">:</td>
								<td width="140"><input type="text" name="kategori" value="<?php echo $data['kategori']; ?>"></td>
							</tr>
							<tr>
								<td colspan="3">
									<?php
										$kategori = $_POST['kategori'];
										if(isset($kategori)){
											if($kategori == ""){
												echo "<center><font color=#ff0000 size=1>Anda belum memasukkan nama kategori !</font></center>";
											} else {
												mysql_query("UPDATE tabel_kategori SET kategori='$kategori' WHERE id_kategori='$id_kategori'");
													echo "<script>window.location='sunting_kategori.php'</script>";
											}
										}
									?>
								</td>
							</tr>
							<tr>
								<td width="110">&nbsp;</td>
								<td width="10">&nbsp;</td>
								<td width="140" align="left"><input name="submit" type="submit" value=" Ubah " /></td>
							</tr>
						</table>
					</form>
					<br>
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