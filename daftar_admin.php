<?php session_start();
	if(session_is_registered('username')){
		include "koneksi.php";
		$id_user = $_GET['id_user'];

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		
		if (empty($username) && empty($password)) {
			header('location:daftar_admin.php?error=1');
		} else if (empty($username)) {
			header('location:daftar_admin.php?error=2');
		} else if (empty($password)) {
			header('location:daftar_admin.php?error=3');
		} else {
			mysql_query("INSERT INTO tabel_loginadmin VALUES('','$username','$password','$nama')");
			header('location:sunting_admin.php?result=1');
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - Daftar Admin</title>
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
					<h2>Daftar Admin</h2>
					<?php
						$data = mysql_fetch_array(mysql_query("select * from tabel_loginadmin"));
					?>
					<form method="post" action="" >
						<table cellpadding="2" cellspacing="2" border="0" width="210">
							<tr>
								<td width="90">Username</td>
								<td width="10">:</td>
								<td width="110"><input type="text" name="username"></td>
							</tr>
							<tr>
								<td width="90">Password</td>
								<td width="10">:</td>
								<td width="110"><input type="password" name="password"></td>
							</tr>
							<tr>
								<td width="90">Nama</td>
								<td width="10">:</td>
								<td width="110"><input type="text" name="nama"></td>
							</tr>
							<tr>
								<td colspan="3">
									<?php
										if (!empty($_GET['error'])) {
											if ($_GET['error'] == 1) {
												echo "<font color=#ff0000 size=1>Isian tidak boleh kosong !</font>";
											} else if ($_GET['error'] == 2) {
												echo "<font color=#ff0000 size=1>Username belum diisi !</font>";
											} else if ($_GET['error'] == 3) {
												echo "<font color=#ff0000 size=1>Password belum diisi !</font>";
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
								</td>
							</tr>
							<tr>
								<td width="90">&nbsp;</td>
								<td width="10">&nbsp;</td>
								<td width="110"><input name="submit" type="submit" value="  Ubah  " /></td>
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