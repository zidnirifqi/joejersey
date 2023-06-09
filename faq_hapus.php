<?php
	include "koneksi.php";
	$id_faq = $_GET['id_faq'];
	$query = mysql_query("delete from tabel_faq where id_faq='$id_faq'");
	if($query){
		header('location:sunting_faq.php');
	}
?>