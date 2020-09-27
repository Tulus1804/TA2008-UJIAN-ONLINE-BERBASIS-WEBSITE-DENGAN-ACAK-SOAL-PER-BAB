<?php

include '../../koneksi.php';

$id = '';
$nip = $_POST['nip'];
$foto = $_FILES['foto']['name'];
$tmp_foto = $_FILES['foto']['tmp_name'];
$nama = addslashes($_POST['nama']);
$email = $_POST['email'];
$jk = $_POST['jk'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = date('Y-m-d', strtotime($_POST['tgl_lahir']));
$alamat = addslashes($_POST['alamat']);
$path = "../../../uploads/img/2/" . $foto;

if (move_uploaded_file($tmp_foto, $path)) {
	$sql = mysqli_query($koneksi, "INSERT INTO tb_karyawan VALUES ('$id', '$nip','$foto', '$nama', '$email', '$jk', '$tmp_lahir', '$tgl_lahir', '$alamat') ");
	if ($sql) {
		header('location: ../../index.php?page=guru&create=success');
	} else {
		header('location: ../../index.php?page=guru&create=fail');
	}
}
