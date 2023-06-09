<?php
include "koneksi.php";
$id_produk = $_GET['id_produk'];
$query = mysql_query("delete from tabel_produk where id_produk='$id_produk'");
if($query){
	header('location:sunting_produk.php');
}
?>