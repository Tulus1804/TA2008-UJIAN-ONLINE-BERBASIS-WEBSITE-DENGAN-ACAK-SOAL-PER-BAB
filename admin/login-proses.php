<?php

include 'koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
$execute = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);

//  cek user
if ($execute > 0) {
	//jika ada
	if ($data['role_id'] == 1) {
		session_start();

		$_SESSION['adminid'] = $data['id'];
		$_SESSION['namauser'] = $data['name'];
		header('location:index.php');
	} else {
		header('location:login.php?login=bukanadmin');
	}
} else {
	header('location:login.php?login=wrong');
}
