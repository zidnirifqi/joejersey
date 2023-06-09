<?php session_start();
	if(session_is_registered('username')){
		include "koneksi.php";
		$id_produk = $_GET['id_produk'];
		$data = mysql_fetch_array(mysql_query("select * from tabel_produk where id_produk='$id_produk'"));

	if(isset($_POST['submit'])){
		$nama_produk = $_POST['nama_produk'];
		$kategori = $_POST['kategori'];
		$harga_produk = $_POST['harga_produk'];
		
		if (empty($nama_produk) && empty($harga_produk)) {
			?>
				<script language="JavaScript">
					alert('Isian tidak boleh kosong !');
					javascript:history.go(-1);
				</script>
			<?
		} else if (empty($nama_produk)) {
			?>
				<script language="JavaScript">
					alert('Nama belum diisi !');
					javascript:history.go(-1);
				</script>
			<?
		} else if (empty($harga_produk)) {
			?>
				<script language="JavaScript">
					alert('Harga belum diisi !');
					javascript:history.go(-1);
				</script>
			<?
		} else if (empty($_FILES['foto_produk']['name'])) {
			$foto_produk = $_FILES['foto_produk']['name'];
			mysql_query("UPDATE tabel_produk SET nama_produk='$nama_produk',kategori='$kategori',harga_produk='$harga_produk' where id_produk='$id_produk'");
			header('location:sunting_produk.php');
		} else {
			$foto_produk = $_FILES['foto_produk']['name'];
			$uploaddir = './images/product/';
			$alamatfile = $uploaddir.$foto_produk;
			$upload = move_uploaded_file($_FILES['foto_produk']['tmp_name'],$alamatfile);
			mysql_query("UPDATE tabel_produk SET nama_produk='$nama_produk',kategori='$kategori',harga_produk='$harga_produk',foto_produk='$foto_produk' where id_produk='$id_produk'");
			header('location:sunting_produk.php');
		}
	}
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
					<form method="post" action="" enctype="multipart/form-data" >
						<table cellpadding="2" cellspacing="2" border="0" width="600">
							<tr>
								<td width="45">Nama</td>
								<td width="15">:</td>
								<td width="540"><input type="text" size="30" name="nama_produk" value="<?php echo $data['nama_produk']; ?>"></td>
							</tr>
							<tr>
								<td width="45">Kategori</td>
								<td width="15">:</td>
								<td width="540">
									<select name="kategori">
										<?php
											$query_satu = mysql_query("select * from tabel_kategori");
											while($hasil_satu = mysql_fetch_array($query_satu)){
										?>
										<option value="<?=$hasil_satu['kategori'];?>"<?php if($hasil_satu['kategori']==$data['kategori']){echo "selected='selected'";}?>><?=$hasil_satu['kategori']?></option>
										<?php
											}
										?>
									</select>&nbsp;&nbsp;<a href="tambah_kategori.php">Tambah Kategori</a>
								</td>
							</tr>
							<tr>
								<td width="45">Harga</td>
								<td width="15">:</td>
								<td width="540">Rp <input type="text" size="15" name="harga_produk" value="<?php echo $data['harga_produk']; ?>"> ,00</td>
							</tr>
							<tr>
								<td width="45">Foto</td>
								<td width="15">:</td>
								<td width="540">
									<?php echo "<img width=\"350\" src=\"images/product/$data[foto_produk]\">" ?><br>
									<input type="file" name="foto_produk" size="30" accept="image/jpeg" />
								</td>
							</tr>
							<tr>
								<td width="45">&nbsp;</td>
								<td width="15">&nbsp;</td>
								<td width="540">&nbsp;</td>
							</tr>
							<tr>
								<td width="45">&nbsp;</td>
								<td width="15">&nbsp;</td>
								<td width="540">
									<input name="submit" type="submit" value="  Ubah  " />
								</td>
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