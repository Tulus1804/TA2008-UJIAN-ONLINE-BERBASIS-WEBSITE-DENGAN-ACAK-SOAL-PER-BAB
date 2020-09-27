<?php

include '../../koneksi.php';

$id_guru = base64_decode($_GET['id_guru']);
$sql = mysqli_query($koneksi, "DELETE FROM tb_karyawan WHERE id_guru = '$id_guru' ");

if ($sql) {
	header('location: ../../index.php?page=guru&delete=success');
} else {
	header('location: ../../index.php?page=guru&delete=fail');
}
