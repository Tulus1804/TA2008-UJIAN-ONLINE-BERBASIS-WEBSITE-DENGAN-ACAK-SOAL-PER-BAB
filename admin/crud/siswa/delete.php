<?php

include '../../koneksi.php';

$id = $_GET['id_siswa'];
$sql = mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE id_siswa = '$id'");

if ($sql) {
    header('location: ../../index.php?page=siswa&delete=success');
} else {
    header('location: ../../index.php?page=siswa&delete=fail');
}
