<?php
include "koneksi.php";
$id_pesan = $_GET['id_pesan'];
$query = mysql_query("delete from tabel_pesan where id_pesan='$id_pesan'");
if($query){
	header('location:daftar_pemesan.php');
}
?>