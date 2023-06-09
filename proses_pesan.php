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
		$nama  = $_POST['nama'];
		$alamat  = $_POST['alamat'];
		$email = $_POST['email'];
		$nomer_handphone = $_POST['nomer_handphone'];
		$hari = date("d");
		$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
		$bulan = $array_bulan[date("n")];
		$tahun = date("Y");
		$array = array("$hari","$bulan","$tahun");
		$tanggal = implode(" ",$array);
		if ($nama=="") {
			?>
				<script language="JavaScript">
				alert('Anda belum memasukkan nama !');
				javascript:history.go(-1);</script>
			<?
		} else if ($alamat=="") {
			?>
				<script language="JavaScript">
				alert('Anda belum mengisi alamat !');
				javascript:history.go(-1);</script>
			<?
		} else if ($email=="") {
			?>
				<script language="JavaScript">
				alert('Anda belum mengisi email !');
				javascript:history.go(-1);</script>
			<?
		} else if ($nomer_handphone=="") {
			?>
				<script language="JavaScript">
				alert('Anda belum mengisi telepon !');
				javascript:history.go(-1);</script>
			<?
		} else {
			include "koneksi.php";
			mysql_query("INSERT INTO tabel_pesan VALUES('','','','','$nama','$alamat','$email','$nomer_handphone','$tanggal')");
						
			date_default_timezone_set('UTC');
			$sites = "http://www.joejersey.zz.mu/";
			$title  = "Joe Jersey's";
			$jne  = "http://www.jne.co.id/";
			$pesan  = "Halo ".$nama." ,
				
Terima kasih telah memesan kaos Jersey dari kami.

Setelah anda menerima email ini, segera transfer jumlah dana ke nomer rekening BRI 3028-01-021493-53-2 atas nama Muhammad Arif berdasarkan jenis kaos yang anda pesan ditambah ongkos kirim berdasarkan tarif JNE dari kota Tegal ke daerah anda di ".$jne."

Setelah anda mentransfer jumlah dana, segera anda mengirim email baru dengan format :
Kepada : joejersey.service@gmail.com
Subyek : Konfirmasi Transfer
Isi : Nama, Alamat, Jenis Kaos, Jumlah.

Contoh : Rustanto, Jl.Kemuning No.5 Semarang, Inter Milan Home 2013-2014, 2 kaos.

Kami akan melakukan verifikasi ke pihak bank mengenai jumlah dana yang masuk, jika informasi dari bank telah valid maka kami akan segera memproses pesanan anda. Dan kami akan mengirimkan email konfirmasi pengiriman pesanan anda. Lama pengiriman pesanan anda sekitar 2-3 hari.

Terima kasih

Joe Jersey's";

			$header = "From: joejersey.service@gmail.com";
			$kirimEmail = mail($email, $title, $pesan, $header);

			if ($kirimEmail){
				?>
					<script language="JavaScript">
						alert('Email konfirmasi pemesanan telah dikirim ke email <?php echo $email;?>');
						document.location='index.php';
					</script>
				<?
			}else{
				?>
					<script language="JavaScript">
						alert('Gagal mengirim email konfirmasi pemesanan konfirmasi ke email <?php echo $email;?>');
						document.location='index.php';
					</script>
				<?
			}
		}
	}
}
?>