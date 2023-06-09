<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - Cara Pesan</title>
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
						<li><a href="cara_pesan.php" class="selected">Cara Pesan</a></li>
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
					
					<h1>Cara Pesan</h1>
					<?php
						include "koneksi.php";
						$hasil = mysql_fetch_array(mysql_query("SELECT * FROM tabel_carapesan"));
						echo nl2br($hasil['isi_carapesan']);
					?><br><br>
						
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