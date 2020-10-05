-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 05 Okt 2020 pada 14.55
-- Versi server: 10.3.24-MariaDB-log-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oujianon_ujianonline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_menu`
--

CREATE TABLE `access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_menu`
--

INSERT INTO `access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 2, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banksoal`
--

CREATE TABLE `banksoal` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `banksoal` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banksoal`
--

INSERT INTO `banksoal` (`id`, `id_kelas`, `banksoal`) VALUES
(3, 9, 'BAB II'),
(5, 9, 'BAB III'),
(6, 9, 'BAB IV'),
(7, 15, 'BAB I : Menulis Sesuai EYD'),
(8, 5, 'BAB II'),
(13, 17, 'BAB I : Aljabar'),
(14, 16, 'BAB II : Perkalian dan Pembagian'),
(15, 17, 'BAB II : Momentum'),
(16, 16, 'BAB III : Aljabar'),
(17, 20, 'BAB 1 : GAYA'),
(18, 20, 'BAB II : Gelombang'),
(19, 21, 'BAB I : GEOGRAFI DASAR'),
(20, 22, 'BAB I'),
(21, 23, 'Bab 1 Perkalian'),
(22, 16, 'BAB I : Penjumlahan dan Pengurangan'),
(23, 46, 'BAB I : PENJUMLAHAN'),
(24, 46, 'BAB II : PENGURANGAN'),
(25, 46, 'BAB III : PERKALIAN'),
(26, 46, 'BAB IV : PEMBAGIAN'),
(27, 47, 'BAB I : EYD'),
(28, 48, 'Bab 1'),
(29, 49, 'Persamaan dan Pertidaksamaan Nilai Mutlak'),
(30, 51, 'BAB I'),
(31, 51, 'BAB II'),
(32, 53, 'sosiologi'),
(33, 51, 'BAB III'),
(34, 54, 'Bab 1'),
(35, 55, 'bab 1'),
(36, 51, 'bab 1'),
(37, 51, 'bab 2'),
(38, 58, 'Bab 1'),
(39, 60, 'BAB 1'),
(40, 60, 'BAB 2'),
(41, 60, 'BAB 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `h_ujian`
--

CREATE TABLE `h_ujian` (
  `id_h` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `jml_benar` int(11) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_bobot` decimal(10,2) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `h_ujian`
--

INSERT INTO `h_ujian` (`id_h`, `id_ujian`, `id_user`, `id_siswa`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `nilai_bobot`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(5, 10, 26, 36, '18,14,15', '18:a:N,14:a:N,15:b:N', 3, 100.00, 200.00, '2020-08-01 14:00:33', '2020-08-01 15:00:33', 'N'),
(6, 11, 26, 36, '14,15,18,19,20', '14:a:N,15:b:N,18:a:N,19:b:N,20:a:N', 5, 100.00, 200.00, '2020-08-03 08:05:33', '2020-08-03 08:35:33', 'N'),
(7, 12, 26, 36, '23,21,15,25,18,14,19,20,24,22', '23:d:N,21:d:N,15:b:N,25:d:N,18:b:N,14:a:N,19:b:N,20:b:N,24:b:N,22:a:N', 5, 50.00, 200.00, '2020-08-03 14:11:56', '2020-08-03 15:11:56', 'N'),
(8, 14, 30, 39, '36', '36:a:N', 1, 100.00, 200.00, '2020-08-05 13:37:36', '2020-08-05 14:37:36', 'N'),
(9, 13, 26, 36, '22,15,25,21,24,23,37,14,19,20', '22:c:N,15:b:N,25:a:N,21:d:N,24:b:N,23:d:N,37:d:N,14:a:N,19:b:N,20:b:N', 8, 80.00, 200.00, '2020-08-05 14:07:51', '2020-08-05 15:07:51', 'N'),
(10, 15, 26, 36, '18,25,20,14,22,23,37,24,15,21', '18:a:N,25:a:N,20:a:N,14:a:N,22:c:N,23:d:N,37:d:N,24:b:N,15:b:N,21:d:N', 9, 90.00, 200.00, '2020-08-09 10:45:12', '2020-08-09 11:15:12', 'N'),
(11, 18, 26, 36, '14,15,18,19,20,21,22,23,24,25', '14:a:N,15:b:N,18:a:N,19:b:N,20:a:N,21:d:N,22:c:N,23:d:N,24:b:N,25:a:N', 9, 90.00, 200.00, '2020-08-13 00:15:41', '2020-08-13 00:45:41', 'N'),
(23, 19, 26, 36, '14,23,25,24,22,37,18,21', '14::N,23::N,25::N,24::N,22::N,37::N,18::N,21::N', 0, 0.00, 0.00, '2020-08-13 23:12:19', '2020-08-14 00:12:19', 'Y'),
(24, 20, 35, 42, '41,40', '41:a:N,40:a:N', 1, 50.00, 450.00, '2020-08-14 14:59:36', '2020-08-14 15:59:36', 'N'),
(25, 30, 26, 36, '25,14,23,15,24,20,18,37,19,22,46,45,43,44,42', '25:a:N,14:a:N,23:d:N,15:b:N,24:b:N,20:a:N,18:b:N,37:d:N,19:a:N,22:a:N,46:d:N,45:c:N,43:d:N,44:a:N,42:a:N', 8, 53.00, 200.00, '2020-08-15 15:43:21', '2020-08-15 16:43:21', 'N'),
(26, 25, 26, 36, '15,37,22,21,24,43,45,14,44,18,23,46,20,25,19', '15:a:N,37:c:N,22:d:N,21:d:N,24:d:N,43:d:N,45:d:N,14:a:N,44:d:N,18:a:N,23:c:N,46:d:N,20:a:N,25:d:N,19:d:N', 6, 40.00, 200.00, '2020-08-15 15:45:31', '2020-08-15 16:45:31', 'N'),
(27, 31, 26, 36, '24,14,19,37,20,44,45,43,42,46', '24:b:N,14:a:N,19:b:N,37:d:N,20:a:N,44:c:N,45:a:N,43:c:N,42:d:N,46:c:N', 5, 50.00, 200.00, '2020-08-17 18:31:37', '2020-08-17 19:01:37', 'N'),
(28, 31, 28, 38, '25,14,20,19,21,44,43,45,46,42', '25:a:N,14:a:N,20:a:N,19:b:N,21:d:N,44:b:N,43:c:N,45:d:N,46:c:N,42:c:N', 6, 60.00, 200.00, '2020-08-17 18:33:07', '2020-08-17 19:03:07', 'N'),
(29, 32, 38, 43, '49,47,48,52,53,51,56,54,57,58', '49:c:N,47:c:N,48:d:N,52:d:N,53:d:N,51:d:N,56:d:N,54:d:N,57:d:N,58:d:N', 0, 0.00, 200.00, '2020-08-19 15:28:55', '2020-08-19 16:28:55', 'N'),
(30, 33, 26, 36, '45,44,46,42,43', '45:c:N,44:c:N,46:b:N,42:c:N,43:a:N', 4, 80.00, 200.00, '2020-09-08 15:03:46', '2020-09-08 15:33:46', 'N'),
(32, 34, 26, 36, '25,15,37,18,44,42', '25:c:N,15:b:N,37:d:N,18:a:N,44:b:N,42:b:N', 4, 66.00, 200.00, '2020-09-12 16:04:10', '2020-09-12 16:34:10', 'N'),
(33, 35, 26, 36, '66,65,68,62,70,78,74,75,84,86', '66:b:N,65:b:N,68:c:N,62:b:N,70:b:N,78:c:N,74:d:N,75:e:N,84:b:N,86:b:N', 4, 40.00, 210.00, '2020-09-15 13:56:25', '2020-09-15 15:56:25', 'N'),
(34, 35, 58, 47, '64,65,63,68,66,73,76,74,83,87', '64:a:N,65:b:N,63:d:N,68:c:N,66:d:N,73:e:N,76:e:N,74:d:N,83:c:N,87:e:N', 2, 20.00, 210.00, '2020-09-15 14:43:29', '2020-09-15 16:43:29', 'N'),
(35, 38, 70, 69, '62,63,66,64,71,78,76,72,81,79,86,85,84,83,87', '62:a:N,63:e:N,66:b:N,64:d:N,71:e:N,78:c:N,76:e:N,72:d:N,81:d:N,79:d:N,86:a:N,85:a:N,84:b:N,83:d:N,87:e:N', 2, 13.00, 200.00, '2020-09-23 15:43:37', '2020-09-23 16:43:37', 'N'),
(36, 39, 26, 36, '70,68,69,63,71,81,82,77,72,73,86,84,87,83,85,90,92', '70:b:N,68:e:N,69:d:N,63:a:N,71:c:N,81:c:N,82:d:N,77:a:N,72:d:N,73:d:N,86:b:N,84:c:N,87:e:N,83:d:N,85:b:N,90:a:N,92:b:N', 6, 35.00, 205.00, '2020-10-01 15:33:09', '2020-10-01 16:33:09', 'N'),
(37, 40, 26, 36, '15,25,23,14,24,19,21,20,22,37,44,46,45,42,43', '15:b:N,25:c:N,23:d:N,14:a:N,24:b:N,19:b:N,21:d:N,20:a:N,22:c:N,37:d:N,44:c:N,46:b:N,45:c:N,42:d:N,43:a:N', 12, 80.00, 200.00, '2020-10-01 20:12:51', '2020-10-01 21:12:51', 'N'),
(38, 42, 73, 72, '95,103,100,94,102,101,99,96,98,97,108,104,107,109,105,110,112,113', '95:a:N,103:b:N,100:d:N,94:b:N,102:c:N,101:a:N,99:e:N,96:d:N,98:c:N,97:b:N,108:b:N,104:a:N,107:b:N,109:c:N,105:c:N,110:a:N,112:b:N,113:a:N', 9, 50.00, 216.00, '2020-10-02 00:11:40', '2020-10-02 02:11:40', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kelas` varchar(150) NOT NULL,
  `mapel` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `kode_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_user`, `nama_kelas`, `mapel`, `deskripsi`, `kode_kelas`) VALUES
(16, 19, 'XII MIPA 1', 'MTK', 'INI KELAS SAYA,\r\nDENGAN MAPEL MTK', 'hqnlx'),
(21, 29, 'XII IPS 1', 'Geografi', 'Ini adalah kelas XII IPS 1 dengan Mapel Geografi', '6HrRZ'),
(23, 34, 'XII MIPA 4', 'MATEMATIKA', 'ini Kelas Matematika', '9vjST'),
(44, 19, 'XII MIPA 2', 'KIMIA', 'kelas XII MIPA 2 dengan mata pelajaran KIMIA', 'gmNeG'),
(46, 37, 'XII MIPA 1', 'MTK', 'ini kelas XII MIPA 1 dengan mapel MTK', 'XslPK'),
(48, 60, 'XII IPA 1', 'Fisika', 'Ini kelas dengna mapel Fusika', 'mEWTy'),
(51, 61, 'XI.IPS', 'B. Indonesia', 'Kelas XI IPS dengan mata pelajaran B. Indonesia', 'vjqUA'),
(54, 66, 'XI MIPA 4', 'Bahasa Indonesia', 'Disini kelas bahasa indonesia', 'eWAVv'),
(57, 61, 'XII MIPA 3', 'BHS.Indosesia', 'iki kelas saya', 'bctoA'),
(58, 61, 'X IPA 1', 'B. Indonesia', 'ini adalah kelas bahasa indonesia kelas X IPA', 'QHaTv'),
(60, 72, 'XII IPS 1', 'B. Indonesia', 'Ini kelas XII IPS 1 dengan Mata Pelajaran B. Indonesia', 'DKpFd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas-siswa`
--

CREATE TABLE `kelas-siswa` (
  `id` int(11) NOT NULL,
  `id_user_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas-siswa`
--

INSERT INTO `kelas-siswa` (`id`, `id_user_siswa`, `id_kelas`) VALUES
(4, 26, 17),
(8, 26, 15),
(10, 28, 17),
(11, 28, 16),
(14, 26, 18),
(15, 30, 21),
(16, 26, 22),
(17, 32, 20),
(18, 35, 23),
(19, 38, 46),
(20, 26, 16),
(21, 58, 16),
(22, 26, 51),
(23, 58, 51),
(24, 70, 51),
(25, 73, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_id`, `menu`) VALUES
(1, 'guru'),
(2, 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Guru'),
(3, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `soal` longtext NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `bobot` int(11) NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_bank`, `id_kelas`, `file`, `soal`, `jawaban`, `bobot`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `date_created`, `date_updated`) VALUES
(14, 14, 16, '1595946225.png', 'Gambar diatas merupakan code untuk .......................direktori', 'a', 2, 'membuat', 'melihat', 'menghapus', 'mengubah', 'asas', 1595946225, 1599896285),
(15, 14, 16, '', '2 X 3 = ...............', 'b', 2, '12', '6', '15', '20', '', 1595946336, 0),
(18, 16, 16, '1596128898.PNG', 'berapa jawaban soal diatas ?', 'a', 2, '16/63', '36/63', '28/63', '11/63', '', 1596128898, 1596610937),
(19, 16, 16, '', '2*2/2 =..............', 'b', 2, '1', '2', '3', '4', '', 1596415697, 0),
(20, 16, 16, '1596415804.png', 'gambar diatas menunjukan proses ?', 'a', 2, 'login', 'registrasi', 'lupa password', 'crud', '', 1596415804, 0),
(21, 16, 16, '', '12^2 = ...............', 'd', 2, '254', '64', '94', '144', '', 1596415896, 0),
(22, 16, 16, '', '(1+2+3+4+5) x 2^2 =.................', 'c', 2, '40', '50', '60', '70', '', 1596416021, 0),
(23, 14, 16, '', 'rumus luas persegi panjang ?', 'd', 2, 's x s', '1/2 x  a x t', '1/2 x d1 x d2', 'p x l', '', 1596416177, 0),
(24, 14, 16, '', '1 /2 x 44 =................', 'd', 2, '11', '22', '33', '44', '', 1596416274, 0),
(25, 14, 16, '', '1 x 10 =..........', 'c', 2, '0', '1', '10', '100', '', 1596416376, 1599551531),
(26, 17, 20, '', 'Cara menambah gaya gesekan adalah dengan.......', 'a', 2, 'Menambah Traksi', 'Mengurangi Traksi', 'Meratakan permukaan menjadi  satu', 'Mengaduk permukaan reaming', '', 1596602414, 0),
(27, 17, 20, '', 'Contoh dari gaya gesek yang menguntungkan yaitu......', 'd', 2, 'Gesekan bantalan rem dengan piringnya', 'Gesekan kapal selam dengan air', 'Gesekan pesawat dengan udara', 'Gesekan mesin kendaraan pada tarok dengan silinder', '', 1596602509, 0),
(28, 17, 20, '', 'contoh dari gaya sentuhan adalah......', 'c', 2, 'Gravitasi', 'Kekuatan listrik', 'Gesekan', 'Gaya magnet', '', 1596602557, 0),
(29, 17, 20, '', 'akselerasi dari sebuah objek akan sebanding dengan gaya yang diciptakannya. deklarasi tsb merupakan isi dari hukum....', 'b', 2, 'Newton I', 'Newton II', 'Newton III', 'Newton IV', '', 1596602652, 0),
(30, 17, 20, '', 'saat seseorang mnaiki sebuah bus, lalu bus tersebut tiba-tiba direm secara mendadak, orang tersebut terdorong ke depan.\r\nhal ini menunjukan fenomena dari hukum.....', 'a', 2, 'Newton I', 'Newton II', 'Newton III', 'Newton IV', '', 1596602748, 0),
(31, 18, 20, '', 'Jarak yang ditempuh dalam satu periode disebut juga dengan.....', 'd', 2, 'Frekuensi Gelombang', 'Periode Gelombang', 'Cepat Rambat Gelombang', 'Panjang Gelombang', '', 1596602878, 0),
(32, 18, 20, '', 'Permukaan air yang dijatuhi dengan batu, maka akan membentuk riak gelombang. Jenis gelombang yang tercipta adalah jenis gelombang.....', 'c', 2, 'Elekrtromagnetik', 'Gelombang berdiri', 'Transversal', 'Longitudinal', '', 1596602997, 0),
(33, 18, 20, '', 'salah satu fenomena yang dapat digunakan untuk menunjukan bahwa gelombang bisa dipantulkan yaitu.....', 'c', 2, 'Cahaya matahari yang diserap atmosfer', 'Siaran diterima dimana-mana', 'gaung dan gema', 'bencana gempa bumi', '', 1596603112, 0),
(34, 18, 20, '', 'Frekuensi yang dimiliki oleh sebuah gelombang adalah 400 Hz dengan gelombang yang panjangnya 50 cm. berapa cepat rambat dari gelombang tersebut......', 'd', 2, '300 m/s', '500 m/s', '900 m/s', '200 m/s', '', 1596603215, 0),
(35, 18, 20, '', 'Resonansi bisa terjadi hanya saat......', 'a', 2, 'Frekuensi sama', 'Frekuensi Berbeda', 'Amplitudonya sama', 'Amplitudonya berbeda', '', 1596603294, 0),
(36, 19, 21, '', 'Ilmu yang mempelajari tentang gejala-gejalaalam di bumi  yaitu.....', 'a', 2, 'geologi', 'biologi', 'sosiologi', 'terminologi', '', 1596608917, 0),
(37, 16, 16, '', '12 x 12', 'd', 2, '240', '360', '420', '144', '', 1596611007, 0),
(38, 20, 22, '1596992433.PNG', 'qaw', 'a', 2, 'qw', 'qwe', 'qweq', 'qwqe', '', 1596992434, 0),
(39, 20, 22, '1596992463.PNG', 'das', 'a', 2, 'sad', 'asdcd', 'das', 'scc', '', 1596992463, 0),
(40, 21, 23, '', '5 x 6 =....', 'a', 5, '30', '25', '15', '10', '', 1597390826, 0),
(41, 21, 23, '', '10 x 10 =...', 'd', 4, '10', '1000', '10000', '100', '', 1597390896, 0),
(42, 22, 16, '', '10 + 10 +15 +2 + 3 =..............', 'c', 2, '20', '30', '40', '60', '', 1597469768, 1597942909),
(43, 22, 16, '', '( 2 + 6 ) -3 =...................', 'a', 2, '5', '6', '7', '8', '', 1597469840, 0),
(44, 22, 16, '', '( 20 - 6 ) + ( 10 - 12 ) =........................', 'c', 2, '10', '11', '12', '13', '', 1597469921, 0),
(45, 22, 16, '', '-10 - 10 + 5 =..........................', 'c', 2, '-5', '10', '-15', '25', '', 1597470025, 0),
(46, 22, 16, '', '1 - 1 - 2 =..................', 'd', 2, '-1', '-2', '-3', '-4', '', 1597470187, 0),
(47, 23, 46, '', '1 + 2 + 3 + 4 + 5 = ..........', 'a', 2, '15', '16', '17', '18', '', 1597821473, 1597821878),
(48, 23, 46, '', '10 + 20 + ( 30 + 40 ) = .................', 'c', 2, '30', '70', '100', '80', '', 1597821771, 0),
(49, 23, 46, '', '(13 + 12 ) + (25 + 30 ) =..............', 'b', 2, '70', '80', '60', '50', '', 1597821843, 0),
(51, 24, 46, '', '10 - 2', 'c', 2, '10', '2', '8', '12', '', 1597821999, 0),
(52, 24, 46, '', '50 - 12 =.................', 'a', 2, '38', '62', '50', '12', '', 1597822065, 0),
(53, 24, 46, '', '1200 - 400 = .................', 'c', 2, '1600', '1200', '800', '400', '', 1597822112, 0),
(54, 25, 46, '', '1 x 1 =.....', 'a', 2, '1', '2', '3', '4', '', 1597822342, 0),
(55, 25, 46, '', '12  x 2 =...................', 'd', 2, '12', '16', '20', '24', '', 1597822389, 0),
(56, 25, 46, '', '3  x 4 x 5 =...............', 'a', 2, '60', '50', '40', '30', '', 1597822429, 0),
(57, 26, 46, '', '12 : 4 =............', 'c', 2, '12', '4', '3', '2', '', 1597822505, 0),
(58, 26, 46, '', '24 : ( 4 : 2 ) =...........', 'b', 2, '24', '12', '6', '4', '', 1597822567, 0),
(61, 27, 47, '1599731710.PNG', 'qw', 'a', 2, 'qw', 'qw', 'qw', 'qw', '', 1599731710, 0),
(62, 30, 51, '', 'Teman-teman sekelas akan melaksanakan kegiatan bakti sosial berupa pasar murah di desa untuk mengisi libur semester. Proposal kegiatan tersebut disusun untuk dibahas bersama sebelum diajukan kepada kepala sekolah dan pihak-pihak lain guna mendapatkan persetujuan dan bantuan. Dalam proposal tersebut memuat latar belakang dan dasar pemikiran, jenis kegiatan, anggaran pembiayaan, waktu, dan tempat pelaksanaan, serta susunan panitia.  \r\n\r\nBagian yang belum tercantum dalam proposal tersebut adalah.......', 'b', 2, 'nama pabrik yang memproduksi barang yang akan dijual', 'maksud dan tujuan kegiatan', 'nama siswa yang mempunyai ide untuk menyelenggarakan pasar murah', 'pembagian tugas setiap siswa dalam penyelenggaraan pasar murah', '', 1599806502, 0),
(63, 30, 51, '', 'Perhatikan penggalan proposal berikut !\r\n\r\n Memiliki keterampilan berbicara tidaklah semudah yang dibayangkan orang. Banyak ahli terampil menuangkan gagasannya dalam bentuk tulisan, tetapi sering mereka kurang terampil menyajikannya secara lisan (langsung). Oleh sebab itu, perlu kiranya diadakan lomba diskusi panel untuk tingkat SMA se Kabupaten Pekalongan sebagai wadah bagi siswa berlatih berbicara dan mengeluarkan pendapat.\r\n\r\nPenggalan proposal kegiatan tersebut merupakan unsur proposal bagian ...', 'c', 2, 'tema', 'sasaran', 'pendahuluan', 'dasar pemikiran', '', 1599806625, 0),
(64, 30, 51, '', 'Tujuan kami mengadakan kegiatan ini adalah sebagai berikut.\r\n1) Mempererat hubungan antarsiswa di SMA ini.\r\n2) Memacu kreativitas dalam bidang fotografi.\r\n3) Membentuk kegiatan remaja yang positif.\r\n\r\nBagian proposal di atas merupakan ... .', 'c', 2, 'latar belakang', 'dasar pemikiran', 'tujuan', 'kepanitiaan', '', 1599806698, 0),
(65, 30, 51, '', 'Sistematika penulisan proposal yang benar adalah ... ,', 'b', 2, 'prakata, pendahuluan, pembahasan, kesimpulan, dan sasaran.', 'latar belakang masalah, permasalahan, perumusan masalah, tujuan penulisan, dan metode penulisan.', 'parakata, daftar isi, pendahuluan, pembahasan, dan penutup.', 'permasalahan, latar belakang masalah, perumusan masalah, dan metode penulisan.', '', 1599806952, 0),
(66, 30, 51, '', 'Perhatikan ilustrasi berikut!\r\n\r\nOSIS SMA PGRI 2 Kajen akan mengadakan kegiatan wisata bahari ke Pantai Senggigi, Lombok. Untuk itu, mereka menyusun proposal yang akan diajukan kepada kepala sekolah.\r\n\r\nKalimat berisi tujuan pelaksanaan sesuai dengan ilustrasi di atas adalah ... .', 'c', 2, 'Untuk mengisi waktu luang di hari libur semester genap, OSIS SMA PGRI 2 Kajen akan berwisata ke Pantai Senggigi, Lombok.', 'Dalam rangka menambah wawasan kelautan, para pengurus OSIS akan mengadakan wisata bahari selama satu minggu ke Pantai Senggigi, Lombok.', 'Kegiatan wisata ini dilakukan untuk menambah wawasan kelautan, mempelajari biota laut, dan menanamkan rasa cinta terhadap laut sambil berekreasi.', 'Kegiatan ini untuk mengambil potensi laut Pantai Senggigi, Lombok dan mempelajari kemungkinan lebih jauh pengembangannya menjadi objek wisata internasional.', '', 1599807197, 0),
(67, 32, 53, '', 'vhvhj', 'a', 2, 'dd', 'dc', 'c', 'c', 'd', 1600135910, 0),
(68, 30, 51, '', 'Berikut adalah kata-kata yang menyatakan pendefinisian, kecuali ... .', 'e', 3, 'merupakan', 'adalah', 'yaitu', 'yakni', 'sehingga', 1600141800, 0),
(69, 30, 51, '', 'Rancangan biaya yang dibutuhkan dalam sebuah kegiatan terdapat pada bagian ... .', 'd', 2, 'tujuan', 'manfaat', 'landasan teori', 'rencana anggaran', 'metode penelitian', 1600143278, 0),
(70, 30, 51, '', 'Tujuan kegiatan\r\n1) Mengetahui kadar keilmiahan isi tulisan para siswa SMA PGRI 2 Kajen dalam mading sekolah.\r\n2) Mengetahui keilmiahan organisasi tulisan para siswa SMA PGRI 2 Kajen dalam mading sekolah.\r\n\r\njenis kegiatan yang akan dilaksanakan berdasarkan proposal tersebut adalah ... .', 'b', 2, 'lomba karya tulis ', 'lomba mading sekolah', 'debat bahasa Inggris', 'olimpiade Fisika', 'membaca puisi', 1600143576, 0),
(71, 30, 51, '', 'Berikut kalimat yang merupakan bagian manfaat dalam proposal adalah ... .', 'c', 2, 'Dalam penelitian ini kami ingin mengetahui dan mendalami mengapa bullying bisa terjadi.', 'Penulis mengangkat topik tindakan bullying ini bertujuan mengembalikan tujuan pendidikan nasional.', 'Melalui penelitian ini diharapkan tidak terjadi lagi bullying di antara kalangan pelajar atau siswa di sekolah.', 'Beberapa definisi yang dikemukakan oleh para ahli tentang perilaku bullying  adalah sebagai berikut.', 'Apakah yang dimaksud dengan bullying?', 1600144063, 0),
(72, 31, 51, '', 'Perhatikan paragraf berikut!\r\n\r\nHFC dan HCFC sebagai pengganti gas freon untuk mencegah kerusakan ozon di lapisan atmosfer. Ozon sangat bermanfaat bagi kehidupan di bumi. Ozon diibaratkan benteng bagi kehidupan di bumi. Penutupan ozon di lapisan stratosfer mengakibatkan intensitas sinar ultraviolet matahari yang sampai dipermukaan bumi meningkat. Hal ini mengancam kehidupan di bumi beserta ekosistemnya. Berdasarkan penelitian dan pengamatan, saat ini lapisan ozon di atas Antartika telah berlubang, bahkan setiap tahun lubang itu semakin lebar. Oleh karena itu, diperlukan penelitian lebih lanjut.\r\n\r\nKutipan di atas merupakan isi subjudul ....... dalam proposal penelitian.', 'c', 2, 'tujuan', 'manfaat', 'latar belakang', 'landasan teori', 'rumusan masalah', 1600144400, 0),
(73, 31, 51, '', 'Perhatikan paragraf berikut!\r\n\r\nDi era globalisasi, informasi merupakan komoditas yang sangat penting. Tanpa kepemilikan informasi secara memadai, kita ibarat orang buta yang tidak tahu arah. Tanpa informasi, kita tidak akan pernah bisa mengambil langkah yang tepat dalam menghadapi berbagai persoalan. Oleh karena itu, informasi menjadi hal yang mutlak dikuasai oleh siapa pun dan pihak mana pun yang ingin sukses menghadapi kehidupan modern. Untuk bisa menguasai informasi, kita harus menguasai teknologinya.\r\nPenggalan pendahuluan karya tulis ilmiah tersebut berisi ... .', 'a', 2, 'latar belakang', 'rumusan masalah', 'tujuan', 'metode perolehan data', 'sistematika penulisan', 1600144678, 0),
(74, 31, 51, '', 'Penulisan daftar pustaka dari buku berjudul Aneka Surat Sekretaris dan Bisnis Indonesia yang ditulis oleh Lamuddin Finoza dan diterbitkan oleh insan Mulia di Jakarta pada tahun 1991 yang tepat adalah ... .', 'd', 2, 'Lamuddin Finoza. 1991. Aneka Surat Sekretaris dan Bisnis Indonesia. Jakarta: Insan Mulia.', 'Finoza. Lamuddin, 1991, Aneka Surat Sekretaris dan Bisnis Indonesia, Jakarta, Insan Mulia.', 'Lamuddin Finoza, 1991, Aneka Surat Sekretaris dan Bisnis Indonesia, Jakarta: Insan Mulia.', 'Finoza, Lamuddin. 1991. Aneka Surat Sekretaris dan Bisnis Indonesia. Jakarta: Insan Mulia.', 'Finoza, Lamuddin, 1991, Aneka Surat Sekretaris dan Bisnis Indonesia, Jakarta, Insan Mulia.', 1600144829, 0),
(75, 31, 51, '', 'Kalimat untuk kata pengantar yang tepat dalam sebuah karya ilmiah adalah ... .', 'b', 2, 'Dengan memanjatkan puji syukur kepada Tuhan Yang Maha Esa, maka selesailah karya tulis ilmiah ini.', 'Dengan bersyukur atas Kehadirat Tuhan Yang Maha Esa, selesailah penulisan karya tulis ilmiah ini.', 'Dengan memanjatkan puji syukur kepada Tuhan Yang Maha Esa, tugas menulis karya ilmiah ini selesai. ', 'Penulis bersyukur kepada Tuhan Yang Maha Esa karena tugas penulisan karya ilmiah ini telah selesai.', 'Penulis memanjatkan puji syukur kepada Tuhan Yang Maha Esa sehingga penulisan karya ilmiah ini selesai.', 1600144970, 0),
(76, 31, 51, '', 'Perhatikan data berikut!\r\n1) Kerangka teoretis\r\n2) Metode penelitian\r\n3) Pendahuluan\r\n4) Kesimpulan\r\n5) Analisis data\r\n\r\nLaporan penelitian dapat disusun dengan urutan yang benar yaitu, ... .\r\n', 'c', 2, '5, 4, 3, 2, dan 1', '4, 3, 2, 1, dan 5', '3, 1, 2, 5, dan 4', '2, 1, 5, 4, dan 3', '1, 2, 3, 4, dan 5', 1600145226, 0),
(77, 31, 51, '', 'Penulis menyadari bahwa karya tulis ini masih jauh dari sempurna. Oleh karena itu, penulismengharapkan kritik dan saran yang membangun dari semua pihak.\r\nBagian karya tulis di atas terdapat pada ... .\r\n', 'e', 2, 'saran', 'simpulan', 'isi', 'pendahuluan', 'kata pengantar', 1600145378, 0),
(78, 31, 51, '', 'Penulisan judul karangan ilmiah yang tepat adalah ... .', 'b', 2, 'Hasil Percobaan Masyarakat desa Dalam Membudidayakan Lele Dumbo', 'Percobaan Pembiakan Pohon Anggur dengan Sistem Cangkok', 'Kegiatan Remaja Kecamatan Banjarsari Dalam Mengisi Liburan Sekolah', 'Laporan Hasil Sensus Di Desa Sukajaya, Kecamatan Rajadesa, Ciamis', 'Keadaan Penduduk Kota Dalam Perbandingannya dengan keadaan Penduduk Desa', 1600145527, 0),
(79, 31, 51, '', 'Ada dua tantangan yang akan dihadapi dalam pelayanan kesehatan di Indonesia, yaitu jumlah penduduk yang besar dan mutu pelayanan.\r\n\r\nBerdasarkan masalah di atas, judul karya tulis yang sesuai adalah ... .\r\n', 'c', 2, 'Pembangunan Bidang Kesehatan Masyarakat', 'Peningkatan Mutu dan Pelayanan Kesehatan', 'Tantangan bagi Dunia Kesehatan di Indonesia', 'Pembangunan Pelayanan Kesehatan Masyarakat', 'Perlunya Peningkatan Pelayanan Kesehatan Masyarakat', 1600145769, 0),
(80, 31, 51, '', 'Ragam tulisan ilmiah memiliki ciri-ciri sebagai berikut, kecuali .... .', 'd', 2, 'menggunakan kata denotatif', 'menghindari ungkapan perasaan yang berlebihan', 'bersifat objektif', 'mengandung imajinasi', 'menggunakan kalimat lugas', 1600145894, 0),
(81, 31, 51, '', 'Kalimat di bawah ini yang merupakan kalimat pembatasan masalah ilmiah adalah..', 'b', 2, 'Alasan penulis membahas karton minuman karena kemasan karton lebih rapuh daripada kemasan kaleng atau kemasan botol.', 'Mengingat terbatasnya pengetahuan penulis, penulis membatasi penelitian ini pada uji total asam karena banyak produk minuman kemasan karton kelompok sari buah berasa asam.', 'Kemasan karton cukup tipis, murah, tetapi tidak tahan terhadap tekanan, memungkinkan udara masuk dan bakteri aerob dapat hidup.', 'Alasan penulis membahas kemasan karton minuman karena produk minuman kemasan karton banyak beredar di pasaran.', 'Dalam minuman kemasan karton terdapat zat-zat potong yakni bakteri penyebab penyakit perut (coliform).', 1600146009, 0),
(82, 31, 51, '', 'Perhatikan data buku berikut!\r\n1) Judul buku\r\n2) Penyusun\r\n3) Penerbit\r\n4) Kota terbit\r\n5) Tahun terbit\r\n\r\nJika data buku tersebut ditulis dalam daftar pustaka, urutan yang benar adalah ...\r\n', 'c', 2, '5, 4, 3, 2, dan 1', '4, 1, 2, 3, dan 5', '2, 5, 1, 4, dan 3 ', '1, 3, 4, 2, dan 5', '1, 3, 2, 5, dan 4', 1600146117, 0),
(83, 33, 51, '', 'Cerpen Hamsad Rangkuti, Ketupat Bat Paku dan Nyak Bedah, yang terdapat dalam buku kumpulan cerpen Bibir dalam Pispot banyak menggunakan bahasa daerah yang tidak mengerti oleh pembaca. Alur campuran banyak digunakan dalam cerpen-cerpen Hamsad Rangkuti.\r\n\r\nKalimat resensi yang mengungkapkan kelemahan cerpen sesuai dengan ilustrasi tersebut adalah ... .\r\n', 'd', 2, 'Alur campuran dalam cerpen tersebut membuat para pembaca sulit untuk mengikuti cara berpikir Hamsad Rangkuti.', 'Alur campuran dalam cerpen Ketupat Bat Paku dan Nyak Bedah membosankan bagi pembaca karya sastra.', 'Buku kumpulan cerpen Binir dalam Pispot banyak menggunakan bahasa daerah dan alur campuran yang sulit.', 'Penggunaan bahasa daerah dalam cerpen Ketupat Bat Paku dan Nyak Bedah membuat pembaca sulit memahami isinya.', 'Para pembaca mengalami kesulitan membaca cerpen-cerpen dalam buku kumpulan cerpen Bibir dalam Pispot.', 1600146673, 0),
(84, 33, 51, '', 'Uniknya cerpen-cerpen dalam antologi ini diolah dengan bahasa sehari-hari yang komunikatif sehingga terlihat sekali lebih mementingkan unsur hiburan ketimbang seni sastranya. Meski ringan dan menghibur, cerpen-cerpen dalam antologi ini paling tidak dapat menjadi refleksi kehidupan keseharian kita tanpa terkesan menggurui. Justru jika refleksi kejadian tersebut diolah dengan bahasa ringan dan sederhana dapat menjadi menarik tanpa harus bermuluk-muluk atau sengaja mengindahkan bahasa.\r\n\r\nPenggalan resensi tersebut mengungkapkan ... .\r\n', 'a', 2, 'kelemahan isi buku', 'kelebihan isi buku', 'sisi baik pengarang', 'unsur intrinsik cerita', 'unsur ekstrinsik cerita', 1600146801, 0),
(85, 33, 51, '', 'Sebelum mengupas pemikiran-pemikiran mandasar yang muncul dalam filsafat seni, penulis mengangkat pemikiran tentang ilmu seni yang selama ini lebih banyak dilupakan orang. Ilmu seni harus dibedakan dengan seni. Seni itu tentang penghayatan, sedangkan ilmu seni adalah tentang pemahaman. Seni untuk dinikmati, sedangkan ilmu seni untuk dipahami.\r\n\r\nMasalah yang disorot dalam resensi di atas adalah ... .\r\n', 'a', 2, 'pemikiran penulis tentang ilmu seni', 'seni ditujukan untuk dinikmati orang', 'masalah yang dipahami para seniman', 'nilai filsafat yang terkandung dalam karya-karya seni', 'filsafat, seni, dan ilmu memiliki perbedaan yang sangat jauh', 1600146906, 0),
(86, 33, 51, '', 'Buku ini juga menarik, sebab penulisannya merupakan orang-orang yang memang memiliki kompetensi yang tinggi dalam dunia kependudukan. Tery dan Valery Hull adalah ahli kependudukan yang sangat kritis dari ANU Australia yang telah berkecimpung sangat lama di dunia kependudukan.\r\n  \r\nSelain mengemukakan daya tarik buku, cuplikan resensi tersebut menjelaskan ... .\r\n', 'e', 2, 'isi buku ', 'materi bahasan', 'kelemahan buku', 'bobot kepenulisan', 'kompetensi penulisanya', 1600147450, 0),
(87, 33, 51, '', 'Pengalaman kalimat resensi buku nonfiksi terdapat dalam pernyataan ... .', 'a', 2, 'Buku ini secara keseluruhan memberikan perlindungan terhadap anak-anak Indonesia pada masa depan dalam lingkungan yang baik.', 'Gaya Mochtar Lubis sangat khas, majas perbandingan banyak digunakan di dalamnya.', 'Semua unsur yang harus dimiliki dalam sebuah buku fiksi terpenuhi dalam buku ini.', 'Buku ini mengisahkan seorang guru yang bernama Isa yang hidup masa Revolusi.', 'Dalam novel Burung-Burung Manyar, pengarang menghubungkan kejadian yang dialami tokoh utamanya, Sutadewa alias Teto yang ber-aku. ', 1600147554, 0),
(88, 34, 54, '', 'Perhatikan ilustrasi proposal berikut !\r\n\r\nTeman-teman sekelas akan melaksanakan kegiatan bakti sosial berupa pasar murah di desa untuk mengisi libur semester. Proposal kegiatan tersebut disusun untuk dibahas bersama sebelum diajukan kepada kepala sekolah dan pihak-pihak lain guna mendapatkan persetujuan dan bantuan. Dalam proposal tersebut memuat latar belakang dan dasar pemikiran, jenis kegiatan, anggaran pembiayaan, waktu, dan tempat pelaksanaan, serta susunan panitia.  \r\n\r\nBagian yang belum tercantum dalam proposal tersebut adalah ... .', 'b', 2, 'nama pabrik yang memproduksi barang yang akan dijual', 'maksud dan tujuan kegiatan', 'nama siswa yang mempunyai ide untuk menyelenggarakan pasar murah', 'pembagian tugas setiap siswa dalam penyelenggaraan pasar murah', 'bentuk kegiatan persiapan yang telah dilakukan dalam rangka penyelenggaraan pasar murah', 1600152443, 0),
(89, 35, 55, '', 'f', 'b', 2, 'a', 'd', 'd', 'd', 'd', 1600420799, 0),
(90, 36, 51, '', 'ff', 'd', 2, 'gvj', 'd', 'f', 'e', 'et', 1600421149, 0),
(92, 37, 51, '1600658388.jpg', 'Teman-teman sekelas akan melaksanakan kegiatan bakti sosial berupa pasar murah di desa untuk mengisi libur semester. Proposal kegiatan tersebut disusun untuk dibahas bersama sebelum diajukan kepada kepala sekolah dan pihak-pihak lain guna mendapatkan persetujuan dan bantuan. Dalam proposal tersebut memuat latar belakang dan dasar pemikiran, jenis kegiatan, anggaran pembiayaan, waktu, dan tempat pelaksanaan, serta susunan panitia.  \r\n\r\nBagian yang belum tercantum dalam proposal tersebut adalah ... .\r\n', 'b', 2, 'nama pabrik yang memproduksi barang yang akan dijual', 'maksud dan tujuan kegiatan', 'nama siswa yang mempunyai ide untuk menyelenggarakan pasar murah', 'pembagian tugas setiap siswa dalam penyelenggaraan pasar murah', 'bentuk kegiatan persiapan yang telah dilakukan dalam rangka penyelenggaraan pasar murah\r\n\r\n', 1600658388, 0),
(93, 38, 58, '', 'Perhatikan ilustrasi proposal berikut !\r\n\r\nTeman-teman sekelas akan melaksanakan kegiatan bakti sosial berupa pasar murah di desa untuk mengisi libur semester. Proposal kegiatan tersebut disusun untuk dibahas bersama sebelum diajukan kepada kepala sekolah dan pihak-pihak lain guna mendapatkan persetujuan dan bantuan. Dalam proposal tersebut memuat latar belakang dan dasar pemikiran, jenis kegiatan, anggaran pembiayaan, waktu, dan tempat pelaksanaan, serta susunan panitia. \r\nBagian yang belum tercantum dalam proposal tersebut adalah ... .', 'b', 2, 'nama pabrik yang memproduksi barang yang akan dijual', 'maksud dan tujuan kegiatan', 'nama siswa yang mempunyai ide untuk menyelenggarakan pasar murah', 'pembagian tugas setiap siswa dalam penyelenggaraan pasar murah', 'bentuk kegiatan persiapan yang telah dilakukan dalam rangka penyelenggaraan pasar murah', 1600849830, 0),
(94, 39, 60, '', 'Perhatikan ilustrasi proposal berikut !\r\n\r\nTeman-teman sekelas akan melaksanakan kegiatan bakti sosial berupa pasar murah di desa untuk mengisi libur semester. Proposal kegiatan tersebut disusun untuk dibahas bersama sebelum diajukan kepada kepala sekolah dan pihak-pihak lain guna mendapatkan persetujuan dan bantuan. Dalam proposal tersebut memuat latar belakang dan dasar pemikiran, jenis kegiatan, anggaran pembiayaan, waktu, dan tempat pelaksanaan, serta susunan panitia.  \r\n\r\nBagian yang belum tercantum dalam proposal tersebut adalah ... .', 'd', 2, 'nama pabrik yang memproduksi barang yang akan dijual', 'maksud dan tujuan kegiatan', 'nama siswa yang mempunyai ide untuk menyelenggarakan pasar murah', 'pembagian tugas setiap siswa dalam penyelenggaraan pasar murah', 'bentuk kegiatan persiapan yang telah dilakukan dalam rangka penyelenggaraan pasar murah', 1601566198, 1601566217),
(95, 39, 60, '', 'Perhatikan penggalan proposal berikut !\r\n\r\nMemiliki keterampilan berbicara tidaklah semudah yang dibayangkan orang. Banyak ahli terampil menuangkan gagasannya dalam bentuk tulisan, tetapi sering mereka kurang terampil menyajikannya secara lisan (langsung). Oleh sebab itu, perlu kiranya diadakan lomba diskusi panel untuk tingkat SMA se Kabupaten Pekalongan sebagai wadah bagi siswa berlatih berbicara dan mengeluarkan pendapat.\r\n   \r\nPenggalan proposal kegiatan tersebut merupakan unsur proposal bagian \r\n', 'c', 2, 'tema', 'sasaran', 'pendahuluan', 'dasar pemikiran', 'perkiraan anggaran pendahuluan\r\n', 1601566351, 0),
(96, 39, 60, '', 'Tujuan kami mengadakan kegiatan ini adalah sebagai berikut.\r\n1) Mempererat hubungan antarsiswa di SMA ini.\r\n2) Memacu kreativitas dalam bidang fotografi.\r\n3) Membentuk kegiatan remaja yang positif.\r\n\r\nBagian proposal di atas merupakan ... .\r\n', 'd', 2, 'anggaran', 'latar belakang', 'dasar pemikiran', 'tujuan', 'kepanitiaan', 1601566463, 0),
(97, 39, 60, '', 'Sistematika penulisan proposal yang benar adalah ... ', 'b', 2, 'prakata, pendahuluan, pembahasan, kesimpulan, dan sasaran.', 'latar belakang masalah, permasalahan, perumusan masalah, tujuan penulisan, dan metode penulisan.', 'prakata, daftar isi, pendahuluan, pembahasan, dan penutup.', 'permasalahan, latar belakang masalah, perumusan masalah, dan metode penulisan', 'permasalahan, perumusan masalah, metode penulisan, dan latar belakang penulisan.', 1601566569, 0),
(98, 39, 60, '', 'Perhatikan ilustrasi berikut!\r\n\r\nOSIS SMA PGRI 2 Kajen akan mengadakan kegiatan wisata bahari ke Pantai Senggigi, Lombok. Untuk itu, mereka menyusun proposal yang akan diajukan kepada kepala sekolah.\r\n       \r\nKalimat berisi tujuan pelaksanaan sesuai dengan ilustrasi di atas adalah ... .\r\n', 'c', 2, 'Untuk mengisi waktu luang di hari libur semester genap, OSIS SMA PGRI 2 Kajen akan berwisata ke Pantai Senggigi, Lombok', 'Dalam rangka menambah wawasan kelautan, para pengurus OSIS akan mengadakan wisata bahari selama satu minggu ke Pantai Senggigi, Lombok.', 'Kegiatan wisata ini dilakukan untuk menambah wawasan kelautan, mempelajari biota laut, dan menanamkan rasa cinta terhadap laut sambil berekreasi.', 'Kegiatan ini untuk mengambil potensi laut Pantai Senggigi, Lombok dan mempelajari kemungkinan lebih jauh pengembangannya menjadi objek wisata internasional.', 'Kegiatan ini sebagai tindak lanjut kelompok sastra dalam berapresiasi terhadap laut, serta mencari kemungkinan penciptaan karya sastra tentang laut.', 1601566678, 0),
(99, 39, 60, '', 'Berikut adalah kata-kata yang menyatakan pendefinisian, kecuali ... .', 'e', 2, 'merupakan', 'adalah', 'yaitu', 'yakni', 'sehingga', 1601567028, 0),
(100, 39, 60, '', 'Rancangan biaya yang dibutuhkan dalam sebuah kegiatan terdapat pada bagian ... .\r\n', 'd', 2, 'tujuan', 'manfaat', 'landasan teori', 'rencana anggaran', 'metode penelitian', 1601567108, 0),
(101, 39, 60, '', 'Tujuan kegiatan\r\n1) Mengetahui kadar keilmiahan isi tulisan para siswa SMA PGRI 2 Kajen dalam mading sekolah.\r\n2) Mengetahui keilmiahan organisasi tulisan para siswa SMA PGRI 2 Kajen dalam mading sekolah.\r\n\r\nJenis kegiatan yang akan dilaksanakan berdasarkan proposal tersebut adalah ... .\r\n', 'a', 2, 'lomba karya tulis', 'lomba mading sekolah', 'debat bahasa Inggris', 'olimpiade Fisika', 'membaca ', 1601567222, 0),
(102, 39, 60, '', 'Berikut kalimat yang merupakan bagian manfaat dalam proposal adalah ... .', 'c', 2, 'Dalam penelitian ini kami ingin mengetahui dan mendalami mengapa bullying bisa terjadi.', 'Penulis mengangkat topik tindakan bullying ini bertujuan mengembalikan tujuan pendidikan nasional.', 'Melalui penelitian ini diharapkan tidak terjadi lagi bullying di antara kalangan pelajar atau siswa di sekolah.', 'Beberapa definisi yang dikemukakan oleh para ahli tentang perilaku bullying  adalah sebagai berikut.', 'Apakah yang dimaksud dengan bullying?', 1601567313, 0),
(103, 39, 60, '', 'Perhatikan paragraf berikut!\r\n\r\nHFC dan HCFC sebagai pengganti gas freon untuk mencegah kerusakan ozon di lapisan atmosfer. Ozon sangat bermanfaat bagi kehidupan di bumi. Ozon diibaratkan benteng bagi kehidupan di bumi. Penutupan ozon di lapisan stratosfer mengakibatkan intensitas sinar ultraviolet matahari yang sampai dipermukaan bumi meningkat. Hal ini mengancam kehidupan di bumi beserta ekosistemnya. Berdasarkan penelitian dan pengamatan, saat ini lapisan ozon di atas Antartika telah berlubang, bahkan setiap tahun lubang itu semakin lebar. Oleh karena itu, diperlukan penelitian lebih lanjut.\r\n   \r\nKutipan di atas merupakan isi subjudul ....... dalam proposal penelitian.\r\n', 'c', 2, 'tujuan', 'manfaat', 'latar  belakang', 'landasan teori', 'rumusan masalah', 1601567420, 0),
(104, 40, 60, '', 'Perhatikan paragraf berikut!\r\n\r\nDi era globalisasi, informasi merupakan komoditas yang sangat penting. Tanpa kepemilikan informasi secara memadai, kita ibarat orang buta yang tidak tahu arah. Tanpa informasi, kita tidak akan pernah bisa mengambil langkah yang tepat dalam menghadapi berbagai persoalan. Oleh karena itu, informasi menjadi hal yang mutlak dikuasai oleh siapa pun dan pihak mana pun yang ingin sukses menghadapi kehidupan modern. Untuk bisa menguasai informasi, kita harus menguasai teknologinya.\r\n    \r\nPenggalan pendahuluan karya tulis ilmiah tersebut berisi ... .\r\n', 'a', 2, 'latar belakang', 'rumusan masalah', 'tujuan', 'metode perolehan data', 'sistematika penulisan', 1601567661, 0),
(105, 40, 60, '', 'Penulisan daftar pustaka dari buku berjudul Aneka Surat Sekretaris dan Bisnis Indonesia yang ditulis oleh Lamuddin Finoza dan diterbitkan oleh insan Mulia di Jakarta pada tahun 1991 yang tepat adalah ... .', 'd', 2, 'Lamuddin Finoza. 1991. Aneka Surat Sekretaris dan Bisnis Indonesia. Jakarta: Insan Mulia.', 'Finoza. Lamuddin, 1991, Aneka Surat Sekretaris dan Bisnis Indonesia, Jakarta, Insan Mulia.', 'Lamuddin Finoza, 1991, Aneka Surat Sekretaris dan Bisnis Indonesia, Jakarta: Insan Mulia.', 'Finoza, Lamuddin. 1991. Aneka Surat Sekretaris dan Bisnis Indonesia. Jakarta: Insan Mulia.', 'Finoza, Lamuddin, 1991, Aneka Surat Sekretaris dan Bisnis Indonesia, Jakarta, Insan Mulia.', 1601567811, 0),
(106, 40, 60, '', 'Kalimat untuk kata pengantar yang tepat dalam sebuah karya ilmiah adalah ... ', 'b', 2, 'Dengan memanjatkan puji syukur kepada Tuhan Yang Maha Esa, maka selesailah karya tulis ilmiah ini.', 'Dengan bersyukur atas Kehadirat Tuhan Yang Maha Esa, selesailah penulisan karya tulis ilmiah ini.', 'Dengan memanjatkan puji syukur kepada Tuhan Yang Maha Esa, tugas menulis karya ilmiah ini selesai. ', 'Penulis bersyukur kepada Tuhan Yang Maha Esa karena tugas penulisan karya ilmiah ini telah selesai.', 'Penulis memanjatkan puji syukur kepada Tuhan Yang Maha Esa sehingga penulisan karya ilmiah ini selesai.', 1601567897, 0),
(107, 40, 60, '', 'Perhatikan data berikut!\r\n1) Kerangka teoretis\r\n2) Metode penelitian\r\n3) Pendahuluan\r\n4) Kesimpulan\r\n5) Analisis data\r\n\r\nLaporan penelitian dapat disusun dengan urutan yang benar yaitu, ... .\r\n', 'c', 2, '5, 4, 3, 2, dan 1', '4, 3, 2, 1, dan 5', '3, 1, 2, 5, dan 4', '2, 1, 5, 4, dan 3', '1, 2, 3, 4, dan 5', 1601567984, 0),
(108, 40, 60, '', 'Penulis menyadari bahwa karya tulis ini masih jauh dari sempurna. Oleh karena itu, penulismengharapkan kritik dan saran yang membangun dari semua pihak.\r\nBagian karya tulis di atas terdapat pada ... .\r\n', 'e', 2, 'saran', 'simpulan', 'isi', 'pendahuluan', 'kata pengantar', 1601568061, 0),
(109, 40, 60, '', 'Penulisan judul karangan ilmiah yang tepat adalah ... .', 'b', 2, 'Hasil Percobaan Masyarakat desa Dalam Membudidayakan Lele Dumbo', 'Percobaan Pembiakan Pohon Anggur dengan Sistem Cangkok', 'Kegiatan Remaja Kecamatan Banjarsari Dalam Mengisi Liburan Sekolah', 'Laporan Hasil Sensus Di Desa Sukajaya, Kecamatan Rajadesa, Ciamis', 'Keadaan Penduduk Kota Dalam Perbandingannya dengan keadaan Penduduk Desa', 1601568170, 0),
(110, 41, 60, '', 'Perhatikan data buku berikut!\r\n1) Judul buku\r\n2) Penyusun\r\n3) Penerbit\r\n4) Kota terbit\r\n5) Tahun terbit\r\n\r\nJika data buku tersebut ditulis dalam daftar pustaka, urutan yang benar adalah ...\r\n', 'c', 3, '5, 4, 3, 2, dan 1\r\n\r\n\r\n', '4, 1, 2, 3, dan 5', '2, 5, 1, 4, dan 3', '1, 3, 2, 5, dan 4', '1, 3, 4, 2, dan 5', 1601568329, 0),
(111, 41, 60, '', 'Cerpen Hamsad Rangkuti, Ketupat Bat Paku dan Nyak Bedah, yang terdapat dalam buku kumpulan cerpen Bibir dalam Pispot banyak menggunakan bahasa daerah yang tidak mengerti oleh pembaca. Alur campuran banyak digunakan dalam cerpen-cerpen Hamsad Rangkuti.\r\n\r\nKalimat resensi yang mengungkapkan kelemahan cerpen sesuai dengan ilustrasi tersebut adalah ... .\r\n', 'd', 3, 'Alur campuran dalam cerpen tersebut membuat para pembaca sulit untuk mengikuti cara berpikir Hamsad Rangkuti.', 'Alur campuran dalam cerpen Ketupat Bat Paku dan Nyak Bedah membosankan bagi pembaca karya sastra.', 'Buku kumpulan cerpen Binir dalam Pispot banyak menggunakan bahasa daerah dan alur campuran yang sulit.', 'Penggunaan bahasa daerah dalam cerpen Ketupat Bat Paku dan Nyak Bedah membuat pembaca sulit memahami isinya.', 'Para pembaca mengalami kesulitan membaca cerpen-cerpen dalam buku kumpulan cerpen Bibir dalam Pispot.', 1601568405, 0),
(112, 41, 60, '', 'Uniknya cerpen-cerpen dalam antologi ini diolah dengan bahasa sehari-hari yang komunikatif sehingga terlihat sekali lebih mementingkan unsur hiburan ketimbang seni sastranya. Meski ringan dan menghibur, cerpen-cerpen dalam antologi ini paling tidak dapat menjadi refleksi kehidupan keseharian kita tanpa terkesan menggurui. Justru jika refleksi kejadian tersebut diolah dengan bahasa ringan dan sederhana dapat menjadi menarik tanpa harus bermuluk-muluk atau sengaja mengindahkan bahasa.\r\n\r\nPenggalan resensi tersebut mengungkapkan ... .\r\n', 'a', 3, 'kelemahan isi buku', 'kelebihan isi buku', 'sisi baik pengarang', 'unsur intrinsik cerita', 'unsur ekstrinsik cerita', 1601568474, 0),
(113, 41, 60, '', 'Sebelum mengupas pemikiran-pemikiran mandasar yang muncul dalam filsafat seni, penulis mengangkat pemikiran tentang ilmu seni yang selama ini lebih banyak dilupakan orang. Ilmu seni harus dibedakan dengan seni. Seni itu tentang penghayatan, sedangkan ilmu seni adalah tentang pemahaman. Seni untuk dinikmati, sedangkan ilmu seni untuk dipahami.\r\n\r\nMasalah yang disorot dalam resensi di atas adalah ... .\r\n', 'a', 3, 'pemikiran penulis tentang ilmu seni', 'seni ditujukan untuk dinikmati orang', 'masalah yang dipahami para seniman', 'nilai filsafat yang terkandung dalam karya-karya seni', 'filsafat, seni, dan ilmu memiliki perbedaan yang sangat jauh', 1601568544, 0),
(114, 41, 60, '', 'Buku ini juga menarik, sebab penulisannya merupakan orang-orang yang memang memiliki kompetensi yang tinggi dalam dunia kependudukan. Tery dan Valery Hull adalah ahli kependudukan yang sangat kritis dari ANU Australia yang telah berkecimpung sangat lama di dunia kependudukan.\r\n   \r\nSelain mengemukakan daya tarik buku, cuplikan resensi tersebut menjelaskan ... .\r\n', 'e', 3, 'isi buku', 'materi bahasan', 'kelemahan buku', 'bobot kepenulisan', 'kompetensi penulisanya', 1601568658, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_guru` int(11) NOT NULL,
  `nomor_induk` int(15) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(150) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_guru`, `nomor_induk`, `foto`, `nama`, `email`, `jk`, `tmp_lahir`, `tgl_lahir`, `alamat`) VALUES
(6, 202002000, 'client1.png', 'Bambang Waluyo', 'bambang@yahoo.com', 'L', 'Bandung', '1985-10-02', 'Bojong, Pekalongan'),
(24, 201903, 'default.png', 'Mustofa', 'Musangguru@gmail.com', '', '', '0000-00-00', ''),
(29, 181530029, 'default.png', 'Tulus Subekti', 'tulus0776@gmail.com', '', '', '0000-00-00', ''),
(30, 85, 'default.png', 'BISMUNWADI', 'bismun.wd@gmail.com', '', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `no_induk` int(15) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(150) NOT NULL,
  `jk` enum('','L','P') NOT NULL,
  `tmp_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `no_induk`, `foto`, `nama`, `email`, `jk`, `tmp_lahir`, `tgl_lahir`, `alamat`) VALUES
(36, 2020, 'user2.jpg', 'Bambang Wijayanto', 'bambang@gmail.com', 'L', 'Pekalongan', '2001-12-08', 'Bojong, Pekalongan'),
(48, 6102, 'default.jpg', 'Adam Bahtiar', '', 'L', '', '1970-01-01', ''),
(49, 6061, 'default.jpg', 'AGUS JUNAEDI', '', 'L', '', '1970-01-01', ''),
(50, 6112, 'default.jpg', 'AGUS JUNAEDI', '', 'L', '', '1970-01-01', ''),
(51, 6053, 'default.jpg', 'ARTHA MAGDALENA SIREGAR', '', 'L', '', '1970-01-01', ''),
(52, 6080, 'default.jpg', 'BAGAS ADI PERMANA', '', 'L', '', '1970-01-01', ''),
(54, 6077, 'default.jpg', 'DINA ASTRIANI', '', 'P', '', '1970-01-01', ''),
(55, 6089, 'default.jpg', '6089', '', 'P', '', '1970-01-01', ''),
(58, 6104, 'default.jpg', 'GANIS ANJARWATI', 'ganisanjarwati@gmail.com', 'P', '', '1970-01-01', ''),
(59, 6100, 'default.jpg', 'IRGI RAMADHAN', '', 'L', '', '1970-01-01', ''),
(60, 6083, 'default.jpg', 'ISAM NABHAN ABRORI', '', 'L', '', '1970-01-01', ''),
(61, 6082, 'default.jpg', 'LFIANA RINDA PASSUSANTY', '', 'P', '', '1970-01-01', ''),
(62, 6109, 'default.jpg', 'LILY SUSYANTI', '', 'P', '', '1970-01-01', ''),
(63, 6074, 'default.jpg', 'M. AGUS SAPUTRA', '', 'L', '', '1970-01-01', ''),
(64, 6118, 'default.jpg', 'ABEL ADI PRASETYO', '', 'L', '', '1970-01-01', ''),
(65, 6117, 'default.jpg', 'AHMAD AINUN NAJIB', '', 'L', '', '1970-01-01', ''),
(66, 6067, 'default.jpg', 'AHMAD RAMADHANI', '', 'L', '', '1970-01-01', ''),
(67, 6069, 'default.jpg', 'ANGIE AULIA ISVANI', '', 'L', '', '1970-01-01', ''),
(68, 6068, 'default.jpg', 'ANNANG TRI ANGGORO', '', 'L', '', '1970-01-01', ''),
(69, 181530018, 'crop_image.jpg', 'Faza Makarimi', 'fazaparadise@gmail.com', 'L', 'Pekalongan', '2001-02-06', 'Kesesi, Pekalongan'),
(72, 5832, 'man3.jpg', 'Bambang Sutoyo', 'bheckzy05@gmail.com', 'L', 'Pekalongan', '1995-12-04', 'Bojong, Pekalongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `petunjuk` longtext NOT NULL,
  `jml_soal` int(11) NOT NULL,
  `jenis` enum('urut','acak','acak per bab') NOT NULL,
  `list_bank` longtext NOT NULL,
  `list_jml_soal` longtext NOT NULL,
  `waktu` int(11) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `kd_ujian` varchar(5) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `id_kelas`, `id_guru`, `nama_ujian`, `petunjuk`, `jml_soal`, `jenis`, `list_bank`, `list_jml_soal`, `waktu`, `tgl_mulai`, `tgl_akhir`, `kd_ujian`, `date_created`) VALUES
(11, 16, 6, 'UH 1', '&lt;p&gt;1. dilarang menyontek&lt;/p&gt;&lt;p&gt;2. kerjakan secara jujur&lt;/p&gt;&lt;p&gt;3. selamat mengerjakan&lt;/p&gt;', 5, 'urut', '', '', 30, '2020-08-03 08:00:00', '2020-08-03 10:00:00', 'THFEM', 0),
(14, 21, 9, 'UAS ', '&lt;p&gt;1. dilarang membuka buku&lt;/p&gt;&lt;p&gt;2. dilarang meniru jawaban teman &lt;/p&gt;', 1, 'urut', '', '', 60, '2020-08-05 13:29:00', '2020-08-06 13:30:00', 'BFMHV', 0),
(17, 22, 6, 'UAS ', '&lt;p&gt;as&lt;/p&gt;', 2, 'urut', '', '', 20, '2020-08-10 00:15:00', '2020-08-11 00:15:00', 'AIOHG', 1596992533),
(20, 23, 11, 'Uas', '&lt;p&gt;1. dilarang menyontek&lt;/p&gt;&lt;p&gt;2. dilarang membuka buku&lt;/p&gt;', 2, 'acak', '', '', 60, '2020-08-14 14:53:00', '2020-08-14 16:53:00', 'BERYW', 1597391018),
(32, 46, 13, 'UTS', '&lt;p&gt;1. dilaranag menyontek&lt;/p&gt;&lt;p&gt;2. dlarang membuka buku&lt;/p&gt;', 10, 'acak per bab', '23,24,25,26', '3,3,2,2', 60, '2020-08-19 14:49:00', '2020-08-20 14:50:00', 'JTWRQ', 1597823942),
(35, 51, 24, 'PENILAIAN AKHIR TAHUN', '1. Tulislah lebih dahulu nomer peserta dan identitas Anda pada lembarjawaban yang disediakan sesuai petunjuk yang diberikan oleh pengawas dengan menggunakan pena/ballpoint warna hitam.\r\n2. Untuk menjawab soal pilihan ganda, gunakan pena/ballpoint untuk menyilang pada huruf A, B, C, D, dan E pada lembarjawab yang telah disediakan.\r\n3. Untuk menjawab soal uraian gunakan pena/ballpoint dalam meuliskan jawaban pada lembar jawaban yang telah di sediakan.\r\n4. Selama pelaksanaan PAT tidak diperkenankan bertanya atau meminta penjelasan mengenai jawaban soal yang diujikan kepada siapapun termasuk kepada pengawas.\r\n5. Dilarang menggunakan kalkulator, HP, kamus dan alat bantu lain dalam menjawabsoal PAT.\r\n6. Periksa dan bacalah soal-soal dengan teliti sebelum Anda menjawabnya.\r\n7. Laporkan kepada pengawas bilater dapat tulisan yang kurang jelas, rusak atau jumlah soal kurang.\r\n8. Jumlah soal sebanyak 40 butir Soal Pilihan Ganda\r\n9. Dahulukan mengrejakan soal-soal yang dianggap mudah.\r\n10. Periksa pekerjaan Anda sebelum diserahkan kepada pengawas dan kelaur dari ruangan.\r\n', 10, 'acak per bab', '30,31,33', '5,3,2', 120, '2020-09-15 13:50:00', '2020-09-18 13:50:00', 'XJSRY', 1600152751),
(36, 51, 24, 'Ujian harian', 'Dilarang menyontek', 18, 'acak per bab', '30,31,33', '10,1,7', 16, '2020-09-15 14:46:00', '2020-09-15 14:50:00', 'RHEUJ', 1600156128),
(37, 51, 24, 'uas', 'yery', 11, 'acak per bab', '30,31,33,36', '2,3,2,4', 30, '2020-09-18 16:32:00', '2020-09-19 16:32:00', 'UPGQC', 1600421600),
(38, 51, 24, 'Ulangan Harian', '1. Tulislah lebih dahulu nomer peserta dan identitas Anda pada lembarjawaban yang disediakan sesuai petunjuk yang diberikan oleh pengawas dengan menggunakan pena/ballpoint warna hitam.\r\n2. Untuk menjawab soal pilihan ganda, gunakan pena/ballpoint untuk menyilang pada huruf A, B, C, D, dan E pada lembarjawab yang telah disediakan.\r\n3. Untuk menjawab soal uraian gunakan pena/ballpoint dalam meuliskan jawaban pada lembar jawaban yang telah di sediakan.\r\n4. Selama pelaksanaan PAT tidak diperkenankan bertanya atau meminta penjelasan mengenai jawaban soal yang diujikan kepada siapapun termasuk kepada pengawas.\r\n5. Dilarang menggunakan kalkulator, HP, kamus dan alat bantu lain dalam menjawabsoal PAT.\r\n6. Periksa dan bacalah soal-soal dengan teliti sebelum Anda menjawabnya.\r\n7. Laporkan kepada pengawas bilater dapat tulisan yang kurang jelas, rusak atau jumlah soal kurang.\r\n8. Jumlah soal sebanyak 40 butir Soal Pilihan Ganda\r\n9. Dahulukan mengrejakan soal-soal yang dianggap mudah.\r\n10. Periksa pekerjaan Anda sebelum diserahkan kepada pengawas dan kelaur dari ruangan.\r\n\r\nSelamat Mengerjakan\r\n', 15, 'acak per bab', '30,31,33,36,37', '5,5,5,,', 60, '2020-09-23 15:31:00', '2020-09-24 08:00:00', 'AKTRC', 1600850028),
(39, 51, 24, 'LATIHAN UJIAN 2', '1. Tulislah lebih dahulu nomer peserta dan identitas Anda pada lembarjawaban yang disediakan sesuai petunjuk yang diberikan oleh pengawas dengan menggunakan pena/ballpoint warna hitam.\r\n2. Untuk menjawab soal pilihan ganda, gunakan pena/ballpoint untuk menyilang pada huruf A, B, C, D, dan E pada lembarjawab yang telah disediakan.\r\n3. Untuk menjawab soal uraian gunakan pena/ballpoint dalam meuliskan jawaban pada lembar jawaban yang telah di sediakan.\r\n4. Selama pelaksanaan PAT tidak diperkenankan bertanya atau meminta penjelasan mengenai jawaban soal yang diujikan kepada siapapun termasuk kepada pengawas.\r\n5. Dilarang menggunakan kalkulator, HP, kamus dan alat bantu lain dalam menjawabsoal PAT.\r\n6. Periksa dan bacalah soal-soal dengan teliti sebelum Anda menjawabnya.\r\n7. Laporkan kepada pengawas bilater dapat tulisan yang kurang jelas, rusak atau jumlah soal kurang.', 17, 'acak per bab', '30,31,33,36,37', '5,5,5,1,1', 60, '2020-10-01 15:29:00', '2020-10-02 15:29:00', 'LEFHO', 1601541022),
(40, 16, 6, 'UTS 2', '1. Dilarang nyontek\r\n2. Dilarang membuka buku\r\n3. Dilarang dll\r\n', 15, 'acak per bab', '14,16,22', '5,5,5', 60, '2020-10-01 20:09:00', '2020-10-03 20:09:00', 'HQFLB', 1601557844),
(42, 60, 29, 'PENILAIAN AKHIR TAHUN (PAT)', 'Petunjuk Umum:\r\n1. Tulislah lebih dahulu nomer peserta dan identitas Anda pada lembarjawaban yang disediakan sesuai petunjuk yang diberikan oleh pengawas dengan menggunakan pena/ballpoint warna hitam.\r\n2. Untuk menjawab soal pilihan ganda, gunakan pena/ballpoint untuk menyilang pada huruf A, B, C, D, dan E pada lembarjawab yang telah disediakan.\r\n3. Untuk menjawab soal uraian gunakan pena/ballpoint dalam meuliskan jawaban pada lembar jawaban yang telah di sediakan.\r\n4. Selama pelaksanaan PAT tidak diperkenankan bertanya atau meminta penjelasan mengenai jawaban soal yang diujikan kepada siapapun termasuk kepada pengawas.\r\n5. Dilarang menggunakan kalkulator, HP, kamus dan alat bantu lain dalam menjawabsoal PAT.\r\n6. Periksa dan bacalah soal-soal dengan teliti sebelum Anda menjawabnya.\r\n7. Laporkan kepada pengawas bilater dapat tulisan yang kurang jelas, rusak atau jumlah soal kurang.\r\n8. Jumlah soal sebanyak 40 butir Soal Pilihan Ganda\r\n9. Dahulukan mengrejakan soal-soal yang dianggap mudah.\r\n10. Periksa pekerjaan Anda sebelum diserahkan kepada pengawas dan kelaur dari ruangan.\r\n\r\nPetunjuk Khusus:\r\nSoal Pilihan Ganda\r\n1. Pilihlah salah satu jawaban yang paling tepat dengan memberitanda silang (X) pada salah satu pilihan jawaban A, B, C, D, dan E pada lembar jawaban yang disediakan.\r\n2. Apabila ada jawaban yang Anda anggap salah, dan Anda ingin memperbaiki- nya, tidak diperbolehkan menggunakan correction pen (tipe-x) atau penghapus, melainkan dengan carase perti di bawah ini.\r\n', 18, 'acak per bab', '39,40,41', '10,5,3', 120, '2020-10-02 00:09:00', '2020-10-09 00:09:00', 'ELKEY', 1601572222);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `no_induk` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `no_induk`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(14, 'admin', '180101', 'admin@admin.com', '', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1, 0),
(19, 'Bambang Waluyo', '202002000', 'bambang@yahoo.com', 'client1.png', '$2y$10$Wwdkf4wBrH8sd6.lDZ1fm.zZQ3tiWUGr8lGxXJO7aWh4P9aoIy3Ui', 2, 1, 1594711413),
(26, 'Bambang Wijayanto', '2020', 'bambang@gmail.com', 'user2.jpg', '$2y$10$/sCO8s8mb8KEMGKkc0I8CeoS2ZO3ff/FPCDq2UOC52FLUjrhg/nQi', 3, 1, 1595175522),
(61, 'Mustofa', '201903', 'Musangguru@gmail.com', 'default.png', '$2y$10$RwDKTOEU4dj8SCZs2B/TxeEf5EzphV8YsUyhcTMiT/EOe.UM2PEwW', 2, 1, 1599793590),
(62, 'admin2', '11111111', 'admin2@admin.com', '', '6cb75f652a9b52798eb6cf2201057c73', 1, 1, 0),
(70, 'Muhammad faza makarimi', '181530018', 'fazaparadise@gmail.com', 'WhatsApp Image 2020-09-23 at 14.10.26.jpeg', '$2y$10$FZ3hc3bxu0djXO6n.QmJq.aViQW2Rhg/2iVq3Bke/cXaqnGMRmeC2', 3, 1, 1600849371),
(72, 'Tulus Subekti', '181530029', 'tulus0776@gmail.com', 'default.png', '$2y$10$ON7SAFB3cmJ1AQF4N4kORu7YXIJuA17YFGlo3ZkCJ8yZmAATkNeAS', 2, 1, 1601565710),
(73, 'Bambang Sutoyo', '5832', 'bheckzy05@gmail.com', 'man3.jpg', '$2y$10$npwMbgvlfzns4vDCIv53TOhHJSR7oqOhKqS1irRmkmspPFVH4Ybfq', 3, 1, 1601571972),
(74, 'BISMUNWADI', '0085', 'bismun.wd@gmail.com', 'default.png', '$2y$10$2hRXcZkgGfn/rHkMtSjfnutI/GeKeuTSiLiXhQaRuQ2AfjjA1sXZq', 2, 0, 1601684561);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(3, 'musangguru@gmail.com', 'MGd1X1o9mnuYVXq9yCi4pS+svZZDZKiLcd3MkZSM5wM=', 1599793674),
(5, 'pitaayu@gmail.com', 'JaQwfuVdgwxWvJZni++RpdO+HTqeOGB6tsOAoqHcOf4=', 1599805593),
(6, 'fameladiah@gmail.com', 'EaoEwEO4L9DXDJR8HEnDGJEGjIj0OG37urONxrdWsrg=', 1599805621),
(7, 'ganisanjarwati@gmail.com', 'R8FI6ELwqJfHTXQootOL6jtmOHNgBcRwzyXadQOpwqk=', 1599805628),
(9, 'niyanur23@gmail.com', 'eJZbBO/NkrsvIsipnxemZgM3Gzv6WVo64sgxheexMAY=', 1600151615),
(16, 'bismun.wd@gmail.com', 'etGU1XntyCr5HFlgUwwPA4au7bhuYSpyrMhahMRmogU=', 1601684561);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banksoal`
--
ALTER TABLE `banksoal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `h_ujian`
--
ALTER TABLE `h_ujian`
  ADD PRIMARY KEY (`id_h`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kelas-siswa`
--
ALTER TABLE `kelas-siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE,
  ADD UNIQUE KEY `no_induk` (`no_induk`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `banksoal`
--
ALTER TABLE `banksoal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `h_ujian`
--
ALTER TABLE `h_ujian`
  MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `kelas-siswa`
--
ALTER TABLE `kelas-siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
