<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Joe Jersey's - Admin</title>
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
				<div id="site_title"><h1><a href="index.php">Online Jersey Store</a></h1></div>
				<div class="cleaner"></div>
			</div> <!-- END of templatemo_header -->
    
			<div id="templatemo_main">
				<div id="content">
					<h1>Login Admin</h1>
					<form action="proses_login_admin.php" method="post">
						<table width="210" border="0" cellpadding="4">
							<tr>
								<td width="90">Username</td>
								<td width="15">:</td>
								<td width="110"><input type="text" size="15" name="username"></td>
							</tr>
							<tr>
								<td width="90">Password</td>
								<td width="15">:</td>
								<td width="110"><input type="password" size="15" name="password"></td>
							</tr>
							<tr>
								<td width="90"><img src="captcha.php"></td>
								<td width="15">:</td>
								<td width="110" align="top" valign="top"><input type="text" name="vercode" size="15" /></td>
							</tr>
							<tr>
								<td colspan="3">
									<?php
										if (!empty($_GET['error'])) {
											if ($_GET['error'] == 1) {
												echo "<font size=1 color=#ff0000>Username & Password belum diisi !</font>";
											} else if ($_GET['error'] == 2) {
												echo "<font size=1 color=#ff0000>Username belum diisi !</font>";
											} else if ($_GET['error'] == 3) {
												echo "<font size=1 color=#ff0000>Password belum diisi !</font>";
											} else if ($_GET['error'] == 4) {
												echo "<font size=1 color=#ff0000>Username tidak terdaftar !</font>";
											} else if ($_GET['error'] == 5) {
												echo "<font size=1 color=#ff0000>Kode yang anda masukkan salah !</font>";
											}
										}
									?>
								</td>
							</tr>
							<tr>
								<td width="90">&nbsp;</td>
								<td width="15">&nbsp;</td>
								<td width="110" align="right" valign="top"><input type="submit" name="submit" value="Masuk"></td>
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