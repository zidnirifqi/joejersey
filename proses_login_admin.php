<?php session_start(); 
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='') {
	if (empty($username)) {
		header('location:admin.php?error=5');
		break;
	}
} else {
	include "koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	if (empty($username) && empty($password)) {
		header('location:admin.php?error=1');
		break;
	} else if (empty($username)) {
		header('location:admin.php?error=2');
		break;
	} else if (empty($password)) {
		header('location:admin.php?error=3');
		break;
	}

	$q = mysql_query("select * from tabel_loginadmin where username='$username' and password='$password'");

	if (mysql_num_rows($q) == 1) {
		$sql = mysql_query("SELECT * FROM tabel_loginadmin where (username='$username')");
		while($row = mysql_fetch_array($sql)){
			$id_user = $row['id_user'];
			$nama = $row['nama'];

			$_SESSION['id_user'] = $id_user;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['nama'] = $nama;

			header('location:beranda_admin.php');
		}
	} else {
		header('location:admin.php?error=4');
	}
}
?>