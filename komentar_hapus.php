<?php
include "koneksi.php";
$id_komentar = $_GET['id_komentar'];
$query = mysql_query("delete from tabel_komentar where id_komentar='$id_komentar'");
if($query){
	header('location:sunting_komentar.php');
}
?>