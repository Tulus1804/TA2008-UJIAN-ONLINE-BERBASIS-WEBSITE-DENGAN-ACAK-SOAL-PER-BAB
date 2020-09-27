<?php

include '../../koneksi.php';

$id_siswa = $_POST['id'];
$nis = $_POST['nis'];
$foto = $_FILES['foto']['name'];
$tmp_foto = $_FILES['foto']['tmp_name'];
$nama = addslashes($_POST['nama']);
$email = $_POST['email'];
$jk = $_POST['jk'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir']));
$alamat = addslashes($_POST['alamat']);
$path = "../../../uploads/img/3/" . $foto;

$foto_lama = $_POST['foto_lama'];

if (!empty($foto)) {
	unlink("../../../uploads/img/3/" . $foto_lama);
	if (move_uploaded_file($tmp_foto, $path)) {
		$sql_guru = mysqli_query($koneksi, "UPDATE tb_siswa SET nama ='$nama', email = '$email', foto='$foto' " .
			",  jk='$jk', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat' WHERE id_siswa = '$id_siswa' ");

		$sql_user = mysqli_query($koneksi, "UPDATE user SET name ='$nama', email = '$email', image='$foto' WHERE no_induk = '$nis' ");
		if ($sql_guru && $sql_user) {
			header('location: ../../index.php?page=siswa&update=success');
		} else {
			header('location: ../../index.php?page=siswa&update=fail');
		}
	}
} else {
	$sql_siswa = mysqli_query($koneksi, "UPDATE tb_siswa SET nama ='$nama', email = '$email'" .
		",  jk='$jk', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', alamat='$alamat' WHERE id_siswa = '$id_siswa' ");

	$sql_siswa = mysqli_query($koneksi, "UPDATE user SET name ='$nama', email = '$email' WHERE no_induk = '$nis' ");
	if ($sql_guru && $sql_user) {
		header('location: ../../index.php?page=siswa&update=success');
	} else {
		header('location: ../../index.php?page=siswa&update=fail');
	}
}
