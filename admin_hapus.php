<?php
include "koneksi.php";
$id_user = $_GET['id_user'];
$query = mysql_query("delete from tabel_loginadmin where id_user='$id_user'");
if($query){
	header('location:sunting_admin.php');
}
?>