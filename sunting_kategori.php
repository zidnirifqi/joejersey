<?php session_start();
	if(session_is_registered('username')){
		include "koneksi.php";

	if(isset($_POST['submit'])){
		$isi_carapesan = $_POST['isi_carapesan'];
		if (empty($isi_carapesan)) {
			header('location:sunting_cara_pesan.php?error=1');
		} else {
			mysql_query("UPDATE tabel_carapesan SET isi_carapesan='$isi_carapesan'") or die (mysql_error());
			header('location:sunting_cara_pesan.php?result=1');
		}
	}
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
					<h2>Sunting Kategori<h2>
					<table width="310" border="1" cellpadding="3" cellspacing="1">
						<tr>
							<th width="35" align="center" bgcolor="#dadada"><font size="2">No.</font></th>
							<th width="165" align="center" bgcolor="#dadada"><font size="2">Kategori</font></th>
							<th width="110" align="center" bgcolor="#dadada"><font size="2">Aksi</font></th>
						</tr><br>
						<?php
							$sql = mysql_query("SELECT * FROM tabel_kategori order by id_kategori asc");
							while($row = mysql_fetch_array($sql)){
						?>
						<tr>
							<td align="center"><font size="2"><?php echo $c=$c+1;?>.</font></td>
							<td align="center"><font size="2"><?php echo $row['kategori'];?></font></td>
							<td align="center">
							<a href="kategori_ubah.php?id_kategori=<?php echo $row['id_kategori']; ?>"><font size="2">Ubah</font></a>&nbsp;&nbsp;
							<a href="kategori_hapus.php?id_kategori=<?php echo $row['id_kategori']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus kategori ini ?')"><font size="2">Hapus</font></a></td>
						</tr>
						<?php
						}
						?>
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