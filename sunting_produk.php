<?php session_start();
	if(session_is_registered('username')){
		include "koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - Sunting Produk</title>
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
					<h2>Sunting Produk</h2>
					<table width="100%" border="1" cellpadding="3" cellspacing="1">
						<tr>
							<th width="5%" align="center" bgcolor="#dadada"><font size="2">No.</font></th>
							<th width="40%" align="center" bgcolor="#dadada"><font size="2">Produk</font></th>
							<th width="20%" align="center" bgcolor="#dadada"><font size="2">Kategori</font></th>
							<th width="20%" align="center" bgcolor="#dadada"><font size="2">Harga</font></th>
							<th width="15%" align="center" bgcolor="#dadada"><font size="2">Aksi</font></th>
						</tr><br>
						<?php
							$sql = mysql_query("SELECT * FROM tabel_produk order by id_produk asc");
							while($row = mysql_fetch_array($sql)){
						?>
						<tr>
							<td align="center"><font size="2"><?php echo $c=$c+1;?>.</font></td>
							<td align="center"><font size="2"><?php echo $row['nama_produk'];?></font></td>
							<td align="center"><font size="2"><?php echo $row['kategori'];?></font></td>
							<td align="center"><font size="2">Rp <?php echo $row['harga_produk'];?>,00</font></td>
							<td align="center">
							<a href="produk_ubah.php?id_produk=<?php echo $row['id_produk']; ?>"><font size="2">Ubah</font></a>&nbsp;&nbsp;
							<a href="produk_hapus.php?id_produk=<?php echo $row['id_produk']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus produk ini ?')"><font size="2">Hapus</font></a></td>
						</tr>
						<?php
						}
						?>
					</table>
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