<?php session_start();
	error_reporting(0);
	include "koneksi.php";
	include "tanggal.php";

	$input=$_GET[input];
	$sid = session_id();
	$inputform=$_GET[inputform];

	if($input=='add'){
		$sql = mysql_query("SELECT id_produk FROM tabel_keranjang WHERE id_produk='$_GET[id_produk]' AND id_session='$sid'");
		$num = mysql_num_rows($sql);
		if ($num==0){
			mysql_query("INSERT INTO tabel_keranjang(id_produk,id_session,tanggal,jumlah) VALUES('$_GET[id_produk]','$sid','$tgl_sekarang','1')");
		}
		else {
			mysql_query("UPDATE tabel_keranjang SET jumlah = jumlah + 1 WHERE id_session = '$sid' AND id_produk='$_GET[id_produk]'");
		}
		deletecart();
		header('location:keranjang_belanja.php');
	}elseif ($input=='delete'){
		mysql_query("DELETE FROM tabel_keranjang WHERE id_keranjang='$_GET[id_keranjang]'");
		header('location:keranjang_belanja.php');
	}elseif ($input=='inputform'){
		if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='') {
			?>
				<script language="JavaScript">
				alert('Kode yang anda masukkan salah!');
				javascript:history.go(-1);
				</script>
			<?
		}else{
			function cart_content(){
				$ct_content = array();
				$sid = session_id();
				$sql = mysql_query("SELECT * FROM tabel_keranjang WHERE id_session='$sid'");
				
				while ($r=mysql_fetch_array($sql)) {
					$ct_content[] = $r;
				}
				return $ct_content;
			}
			$nama = $_POST[nama];
			$email = $_POST[email];
			$nomer_handphone = $_POST[nomer_handphone];
			$alamat = $_POST[alamat];
			$hari = date("d");
			$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
			$bulan = $array_bulan[date("n")];
			$tahun = date("Y");
			$array = array("$hari","$bulan","$tahun");
			$tanggal = implode(" ",$array);
			if ($nama=="") {
				?>
					<script language="JavaScript">
					alert('Anda belum memasukkan nama!');
					javascript:history.go(-1);</script>
				<?
			} else if ($alamat=="") {
				?>
					<script language="JavaScript">
					alert('Anda belum mengisi alamat!');
					javascript:history.go(-1);</script>
				<?
			} else if ($email=="") {
				?>
					<script language="JavaScript">
					alert('Anda belum mengisi email!');
					javascript:history.go(-1);</script>
				<?
			} else if ($nomer_handphone=="") {
				?>
					<script language="JavaScript">
					alert('Anda belum mengisi telepon!');
					javascript:history.go(-1);</script>
				<?
			} else {
				$ct_content = cart_content();
				$jml = count($ct_content);
				for($i=0; $i<$jml; $i++){
					mysql_query("INSERT INTO tabel_pesan(nama,email,nomer_handphone,alamat,id_produk,jumlah,tanggal_pesan,id_pemesan) 
								VALUES('$_POST[nama]','$_POST[email]','$_POST[nomer_handphone]','$_POST[alamat]',{$ct_content[$i]['id_produk']},{$ct_content[$i]['jumlah']},'$tanggal','$sid')");
				}
				for($i=0; $i<$jml; $i++){
					mysql_query("DELETE FROM tabel_keranjang WHERE id_keranjang = {$ct_content[$i]['id_keranjang']}");
				}
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


	function deletecart(){
		$del = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
		mysql_query("DELETE FROM tabel_keranjang WHERE tanggal < '$del'");
	}
	

