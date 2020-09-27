<?php

include '../../koneksi.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$sql = mysqli_query($koneksi, "UPDATE user SET name = '$name', email= '$email' password = '$pass' WHERE id = '$id' ");

if ($sql) {
    header('location: ../../index.php?page=user&update=success');
} else {
    header('location: ../../index.php?page=user&update=fail');
}
