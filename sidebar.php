				<div id="sidebar" class="float_l">
					<div class="sidebar_box">
						<span class="bottom"></span>
						<h3>Kategori</h3>   
						<div class="content"> 
							<ul class="sidebar_list">
								<?php
									include "koneksi.php";
									$query = mysql_query("SELECT * FROM tabel_kategori");
									while($data = mysql_fetch_array($query)) {
								?>
										<li><a href="kategori.php?id_kategori=<?php echo $data['id_kategori'];?>"><?php echo $data['kategori'];?></a></li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<div class="sidebar_box">
						<span class="bottom"></span>
						<h3>Kontak Kami</h3>   
						<div class="content"> 
							<ul class="sidebar_list">
								<?php
									include "koneksi.php";
									$hasil = mysql_fetch_array(mysql_query("SELECT * FROM tabel_kontakkami"));
								?>
								<table width="220" cellspacing="0" border="0" align="center">
									<tr>
										<td width="45" valign="top">
											<a href="">
												<img src="images/sms.png" width="40" />
											</a>
										</td>
										<td width="175">
											<? echo $hasil['nomer_handphone']; ?>
										</td>
									</tr>
									<tr>
										<td width="45" valign="top">
											<a href="">
												<img src="images/email.png" width="40" />
											</a>
										</td>
										<td width="175">
											<? echo $hasil['email']; ?>
										</td>
									</tr>
								</table>
							</ul>
						</div>
					</div>
					<div class="sidebar_box">
						<span class="bottom"></span>
						<h3>Payment</h3>   
						<center>
							<img src="images/bri.jpg" width="200" />
							BRI NO. REK. 3028-01-021493-53-2<br>
							a.n. Muhammad Arif
						</center>
					</div>
				</div>