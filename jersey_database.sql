-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Waktu pembuatan: 27. Agustus 2013 jam 11:32
-- Versi Server: 5.0.33
-- Versi PHP: 5.2.1
-- 
-- Database: `jersey_database`
-- 
CREATE DATABASE `jersey_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `jersey_database`;

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_carapesan`
-- 

CREATE TABLE `tabel_carapesan` (
  `id_carapesan` int(10) NOT NULL auto_increment,
  `isi_carapesan` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_carapesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data untuk tabel `tabel_carapesan`
-- 

INSERT INTO `tabel_carapesan` VALUES (1, 'Ada beberapa cara untuk melakukan pembelian di Joe Jersey''s.\r\n\r\nInilah cara-cara yang dapat Anda pilih untuk berbelanja di Joe Jersey''s :\r\n1. Buy via website\r\n2. Buy via e-mail\r\n3. Buy via SMS\r\n\r\nSetelah Anda selesai melakukan salah satu dari langkah di atas, silahkan tunggu pemberitahuan Order Confirmation berupa info tentang ketersediaan stock dan total biaya kirim ke tempat Anda yang akan kami kirimkan via e-mail atau SMS.\r\n\r\nPENTING :\r\nJangan melakukan transfer pembayaran sebelum Anda memperoleh Order Confirmation dari kami.\r\n\r\nAnda dapat melakukan pembayaran setelah Anda menerima Order Confirmation dari kami. Setelah melakukan pembayaran, tolong kirimkan Payment Confirmation yang telah Anda lakukan kepada kami via e-mail atau SMS.\r\n\r\nKami akan segera melakukan pengiriman barang Anda setelah kami menerima Payment Confirmation Anda.');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_faq`
-- 

CREATE TABLE `tabel_faq` (
  `id_faq` int(10) NOT NULL auto_increment,
  `tanya_faq` text collate latin1_general_ci NOT NULL,
  `jawab_faq` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_faq`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

-- 
-- Dumping data untuk tabel `tabel_faq`
-- 

INSERT INTO `tabel_faq` VALUES (1, 'Bagaimana cara pemesanan Jersey?', 'Lihat <a href="cara_pesan.php">disini</a>');
INSERT INTO `tabel_faq` VALUES (2, 'Dimana alamat toko atau joejersey.hol.es agar saya dapat memilih barang yang hendak dibeli?', 'Lihat <a href="kontak_kami.php">disini</a>');
INSERT INTO `tabel_faq` VALUES (3, 'Berapa lama pengiriman sampai alamat saya?', 'Barang dikirim langsung ke alamat anda. Biasanya paket diterima pelanggan dalam 2-4 hari.');
INSERT INTO `tabel_faq` VALUES (4, 'Harga barang apakah sudah termasuk ongkos kirim?', 'Belum. Harga barang yang tertera di dalam web kami semuanya belum termasuk ongkos kirim.');
INSERT INTO `tabel_faq` VALUES (5, 'Bagaimana cara pembayarannya?', 'Transfer via rekening BCA atau Mandiri, untuk nomor rekening kami mohon menghubungi sales kami melalui via SMS.');
INSERT INTO `tabel_faq` VALUES (6, 'Dapatkah pesan dengan metode Cash On Delivery (COD)? Jadi barang diantar dulu baru dibayar di tempat?', 'Tidak. Kami tidak melayani COD.');
INSERT INTO `tabel_faq` VALUES (7, 'Mana yang lebih dahulu, barang dikirim atau transfer pembayaran?', 'Melunasi pembayaran dahulu, setelah itu kami akan melakukan verifikasi ke pihak bank mengenai jumlah dana yang masuk, jika informasi bank telah valid maka kami akan segera memproses pesanan anda.');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_kategori`
-- 

CREATE TABLE `tabel_kategori` (
  `id_kategori` int(10) NOT NULL auto_increment,
  `kategori` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data untuk tabel `tabel_kategori`
-- 

INSERT INTO `tabel_kategori` VALUES (1, 'Grade Original');
INSERT INTO `tabel_kategori` VALUES (2, 'Player Issue');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_keranjang`
-- 

CREATE TABLE `tabel_keranjang` (
  `id_keranjang` int(10) NOT NULL auto_increment,
  `id_produk` int(10) NOT NULL,
  `id_session` varchar(100) collate latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(4) NOT NULL,
  PRIMARY KEY  (`id_keranjang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=22 ;

-- 
-- Dumping data untuk tabel `tabel_keranjang`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_komentar`
-- 

CREATE TABLE `tabel_komentar` (
  `id_komentar` int(10) NOT NULL auto_increment,
  `id_produk` int(10) NOT NULL,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `email` varchar(50) collate latin1_general_ci NOT NULL,
  `isi_komentar` text collate latin1_general_ci NOT NULL,
  `tanggal_komentar` varchar(20) collate latin1_general_ci NOT NULL,
  `jam_komentar` varchar(10) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data untuk tabel `tabel_komentar`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_kontakkami`
-- 

CREATE TABLE `tabel_kontakkami` (
  `id_kontak` int(10) NOT NULL auto_increment,
  `alamat` text collate latin1_general_ci NOT NULL,
  `email` varchar(50) collate latin1_general_ci NOT NULL,
  `nomer_handphone` varchar(15) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_kontak`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

-- 
-- Dumping data untuk tabel `tabel_kontakkami`
-- 

INSERT INTO `tabel_kontakkami` VALUES (1, 'Gg. Buntu No.69\r\nPetabetan Selatan', 'joe_jersey@gmail.com', '08765432106');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_loginadmin`
-- 

CREATE TABLE `tabel_loginadmin` (
  `id_user` int(10) NOT NULL auto_increment,
  `username` varchar(25) collate latin1_general_ci NOT NULL,
  `password` varchar(25) collate latin1_general_ci NOT NULL,
  `nama` varchar(30) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data untuk tabel `tabel_loginadmin`
-- 

INSERT INTO `tabel_loginadmin` VALUES (1, 'admin', 'admin', 'Administrator Web');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_pesan`
-- 

CREATE TABLE `tabel_pesan` (
  `id_pesan` int(10) NOT NULL auto_increment,
  `id_produk` int(10) NOT NULL,
  `id_pemesan` varchar(100) collate latin1_general_ci NOT NULL,
  `nama` varchar(50) collate latin1_general_ci NOT NULL,
  `email` varchar(50) collate latin1_general_ci NOT NULL,
  `alamat` text collate latin1_general_ci NOT NULL,
  `nomer_handphone` varchar(15) collate latin1_general_ci NOT NULL,
  `status` varchar(30) collate latin1_general_ci NOT NULL default 'New',
  `jumlah` int(4) NOT NULL,
  `tanggal_pesan` varchar(20) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

-- 
-- Dumping data untuk tabel `tabel_pesan`
-- 


-- --------------------------------------------------------

-- 
-- Struktur dari tabel `tabel_produk`
-- 

CREATE TABLE `tabel_produk` (
  `id_produk` int(10) NOT NULL auto_increment,
  `nama_produk` varchar(50) collate latin1_general_ci NOT NULL,
  `kategori` varchar(50) collate latin1_general_ci NOT NULL,
  `harga_produk` varchar(10) collate latin1_general_ci NOT NULL,
  `foto_produk` varchar(50) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=21 ;

-- 
-- Dumping data untuk tabel `tabel_produk`
-- 

INSERT INTO `tabel_produk` VALUES (1, 'AC Milan Home 2012-2013', 'Grade Original', '145.000', 'ac_milan.jpg');
INSERT INTO `tabel_produk` VALUES (2, 'Inter Milan Home 2013-2014', 'Player Issue', '120.000', 'inter_milan.jpg');
