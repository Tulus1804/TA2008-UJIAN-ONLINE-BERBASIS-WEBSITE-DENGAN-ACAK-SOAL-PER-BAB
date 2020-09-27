<?php

include '../../koneksi.php';

$id_siswa = '';
$nis = htmlspecialchars($_POST['nis']);
$foto = $_FILES['foto']['name'];
$tmp_foto = $_FILES['foto']['tmp_name'];
$nama = addslashes(htmlspecialchars($_POST['nama']));
$email = htmlspecialchars($_POST['email']);
$jk = htmlspecialchars($_POST['jk']);
$tmp_lahir = htmlspecialchars($_POST['tmp_lahir']);
$tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir']));
$alamat = addslashes(htmlspecialchars($_POST['alamat']));
$path = "../../../uploads/img/3/" . $foto;

$cek = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE email= $email or nama = $nama ");
$querycek = mysqli_num_rows($cek);
if ($querycek > 0) {
	header("location: location: ../../index.php?page=siswa&hasil=gagal");
} else {
	if (move_uploaded_file($tmp_foto, $path)) {
		$sql = mysqli_query($koneksi, "INSERT INTO tb_siswa VALUES ('$id_siswa', '$nis','$foto', '$nama', '$email', '$jk', '$tmp_lahir', '$tgl_lahir', '$alamat') ");
		if ($sql) {
			header('location: ../../index.php?page=siswa&create=success');
		} else {
			header('location: ../../index.php?page=siswa&create=fail');
		}
	}
}
