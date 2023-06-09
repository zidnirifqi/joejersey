<?php
	include "koneksi.php";
	$id_produk = $_GET['id_produk'];
	$data = mysql_fetch_array(mysql_query("select * from tabel_produk where id_produk='$id_produk'"));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - <?php echo $data['nama_produk'];?></title>
<meta name="keywords" content="shoes store, free template, ecommerce, online shop, website templates, CSS, HTML" />
<meta name="description" content="Shoes Store is a free ecommerce template provided by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js">
/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
</head>

<body>
	<div id="templatemo_body_wrapper">
		<div id="templatemo_wrapper">
			<div id="templatemo_header">
				<div id="site_title"><h1><a href="index.php">Online Jersey Store</a></h1></div>
				<div id="header_right">
					<?php
						include "koneksi.php";
						$sid = session_id();
						$sql = mysql_query("SELECT * FROM tabel_keranjang");
						$row = mysql_num_rows($sql);
						$jml = mysql_fetch_array($sql);
					?>
					<p>Keranjang Belanja: <b><?php echo $row;?> item</b> ( <a href="keranjang_belanja.php">Lihat Belanja</a> )</p>
				</div>
				<div class="cleaner"></div>
			</div> <!-- END of templatemo_header -->
			
			<div id="templatemo_menubar">
				<div id="top_nav" class="ddsmoothmenu">
					<ul>
						<li><a href="index.php">Beranda</a></li>
						<li><a href="produk.php">Produk</a></li>
						<li><a href="cara_pesan.php">Cara Pesan</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="kontak_kami.php">Kontak Kami</a></li>
					</ul>
					<br style="clear: left" />
				</div> <!-- end of ddsmoothmenu -->
				<div id="templatemo_search">
					<form action="#" method="get">
					  <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
					  <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
					</form>
				</div>
			</div> <!-- END of templatemo_menubar -->
    
			<div id="templatemo_main">
				<?php include "sidebar.php";?>
				<div id="content" class="float_r">
					<div id="slider-wrapper">
						<div id="slider" class="nivoSlider">
							<img src="images/slider/01.jpg" />
							<img src="images/slider/02.jpg" />
							<img src="images/slider/03.jpg" />
							<img src="images/slider/04.jpg" />
							<img src="images/slider/05.jpg" />
							<img src="images/slider/06.jpg" />
							<img src="images/slider/07.jpg" />
							<img src="images/slider/08.jpg" />
							<img src="images/slider/09.jpg" />
						</div>
					</div>
					
					<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
					<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
					<script type="text/javascript">
						$(window).load(function() {
							$('#slider').nivoSlider();
						});
					</script>
					
					<?php
						$data_satu = mysql_fetch_array(mysql_query("select * from tabel_produk where id_produk='$id_produk'"));
						$kategori = $data_satu['kategori'];
						$data_dua = mysql_fetch_array(mysql_query("select * from tabel_kategori where kategori='$kategori'"));
					?>
					<h1><?php echo $data_satu['nama_produk'];?></h1>
					<table width="100%" border="0">
						<tr>
							<td valign="top" width="65%">
								<img width="400" height="400" src="images/product/<?php echo $data_satu['foto_produk'];?>" />
							</td>
							<td valign="top" width="35%">
								Kategori : <a href="kategori.php?id_kategori=<?php echo $data_dua['id_kategori'];?>"><b><?php echo $data_satu['kategori'];?></b></a><br><br>
								Harga : <b>Rp <?php echo $data_satu['harga_produk'];?>,00</b><br><br><br>
								<a href="input_keranjang_belanja.php?input=add&id_produk=<?=$data_satu['id_produk'];?>"><img src="images/templatemo_addtocart.png"></a>
							</td>
						</tr>
					</table><br>
					<p><img src="images/dot.jpg" height="1" width="670"></p>
					<p><?php
						$query = mysql_query("SELECT * FROM tabel_komentar WHERE id_produk='$id_produk'");
						if (mysql_num_rows($query) == 0) {
							echo '<center><h3>Belum ada komentar</h3></center>';
						} else {
							while ($data = mysql_fetch_array($query)) {
								echo "<table width=490 border=0 cellpadding=0 cellspacing=5>
								<tr>
									<td width=80 align=center>
										<img width=\"60\" src=\"images/profile-photo.png\">
									</td>
									<td width=410>
										<b>$data[nama]</b><br>
										$data[email]<br>
										<font size=1>( $data[tanggal_komentar] - $data[jam_komentar] wib )</font><br>
										$data[isi_komentar]<br>
									</td>
								</tr>
							  </table>";
							}
						}
					?></p>
					<p><img src="images/dot.jpg" height="1" width="670"></p>
					<form method="post" action="proses_komentar.php">
						<table width="670" border="0" cellpadding="0">
							<tr>
								<td width="60">Nama</td>
								<td width="10">:</td>
								<td width="600"><input type="text" size="25" name="nama"></td>
							</tr>
							<tr>
								<td width="60">Email</td>
								<td width="10">:</td>
								<td width="600"><input type="text" size="25" name="email"></td>
							</tr>
							<tr>
								<td width="60">Komentar</td>
								<td width="10">:</td>
								<td width="600"><textarea name="isi_komentar" cols="60" rows="2"></textarea></td>
							</tr>
							<tr>
								<td width="60"><img src="captcha.php"></td>
								<td width="10">:</td>
								<td width="600" align="top" valign="top"><input type="text" name="vercode" size="15" /></td>
							</tr>
							<tr>
								<td colspan="3" align="center">&nbsp;<td>
							</tr>
							<tr>
								<td width="60">&nbsp;</td>
								<td width="10">&nbsp;</td>
								<td width="600">
									<input type="hidden" name="id_produk" value="<?php print $id_produk;?>">
									<input name="submit" type="submit" id="submit" value="  Kirim  " />
								</td>
							</tr>
						</table>
					</form>
					<br><br>
						
					<div class="cleaner"></div>
				</div> 
				<div class="cleaner"></div>
			</div> <!-- END of templatemo_main -->
    
			<div id="templatemo_footer">
				Copyright © 2013 | Created & Edited by <b>JOE</b>
			</div> <!-- END of templatemo_footer -->
    
		</div> <!-- END of templatemo_wrapper -->
	</div> <!-- END of templatemo_body_wrapper -->
	
	<script type='text/javascript' src='js/logging.js'></script>
</body>

</html>