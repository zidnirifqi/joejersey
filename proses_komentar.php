<?php session_start();
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='') {
	?>
		<script language="JavaScript">
		alert('Kode yang anda masukkan salah !');
		javascript:history.go(-1);
		</script>
	<?
} else {
	if(isset($_POST['submit'])){
		include "koneksi.php";
		$id_produk = $_POST['id_produk'];
		$nama  = $_POST['nama'];
		$email = $_POST['email'];
		$isi_komentar = $_POST['isi_komentar'];
		$hari = date("d");
		$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$bulan = $array_bulan[date("n")];
		$tahun = date("Y");
		$array = array("$hari","$bulan","$tahun");
		$tanggal_komentar = implode(" ",$array);
		$jam_komentar = date('H:i', strtotime('-1 hour'));
		
		if ($nama=="") {
			?>
				<script language="JavaScript">
				alert('Anda belum memasukkan nama !');
				javascript:history.go(-1);</script>
			<?
		}
		else if ($isi_komentar=="") {
			?>
				<script language="JavaScript">
				alert('Anda belum mengisi komentar !');
				javascript:history.go(-1);</script>
			<?
		}
		else {
			$query = mysql_query("INSERT INTO tabel_komentar VALUES('','$id_produk','$nama','$email','$isi_komentar','$tanggal_komentar','$jam_komentar')");
			if ($query) {
			?>
				<script language="JavaScript">
				alert('Terima kasih telah mengisi komentar.');
				<?php
					$query = mysql_query("SELECT * FROM tabel_produk WHERE id_produk='$id_produk'");
					while($data = mysql_fetch_array($query)) {
				?>
				document.location='produk_detail.php?id_produk=<?=$data['id_produk'];?>';<?}?>
				</script>
			<?
			}
		}
	}
}
?>