<?php
include "koneksi.php";
$id_kategori = $_GET['id_kategori'];
$query = mysql_query("delete from tabel_kategori where id_kategori='$id_kategori'");
if($query){
	header('location:sunting_kategori.php');
}
?>