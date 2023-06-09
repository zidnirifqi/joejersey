<?php session_start();
	if(session_is_registered('username')){
		include "koneksi.php";
		$id_faq = $_GET['id_faq'];
		$data = mysql_fetch_array(mysql_query("select * from tabel_faq where id_faq='$id_faq'"));

	if(isset($_POST['submit'])){
		$tanya_faq = $_POST['tanya_faq'];
		$jawab_faq = $_POST['jawab_faq'];
		mysql_query("UPDATE tabel_faq SET tanya_faq='$tanya_faq',jawab_faq='$jawab_faq' where id_faq='$id_faq'");
			header('location:sunting_faq.php');
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - Sunting FAQ</title>
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
					<h2>Sunting FAQ</h2>
					<form method="post" action="" >
						Tanya<br>
						<textarea name="tanya_faq" cols="80" rows="2"><?php echo $data['tanya_faq']; ?></textarea><br><br>
						Jawab
						<textarea name="jawab_faq" cols="80" rows="2"><?php echo $data['jawab_faq']; ?></textarea><br><br>
						<input name="submit" type="submit" value="   Ubah   " />
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