<?php

include '../../koneksi.php';

$id = $_GET['id_guru'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_guru = '$id'");
$data = mysqli_fetch_array($sql);


// Verifikasi Email

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../../vendor/autoload.php";

$id = '';
$name = addslashes($data['nama']);
$email = $data['email'];
$no_induk = $data['nomor_induk'];
$image = $data['foto'];
$password = password_hash($data['nomor_induk'], PASSWORD_DEFAULT);
$role_id = 2;
$is_active = 0;
$date_created = time();


// token
$token = base64_encode(random_bytes(32));

$c_email = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' ");
$cek_email = mysqli_num_rows($c_email);

if ($cek_email > 0) {
	echo "<script>history.go(-1);window.alert('email sudah digunakan!');</script>";
} else {
	$insert = "INSERT INTO user VALUES ('$id', '$name','$no_induk', '$email', '$image', '$password', '$role_id', '$is_active', '$date_created') ";
	$insert2 = "INSERT INTO user_token VALUES ('', '$email','$token','$date_created')";
	$sql = mysqli_query($koneksi, $insert);
	$sql2 = mysqli_query($koneksi, $insert2);
	if ($sql && $sql2) {

		$mail = new PHPMailer(true);
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		//email dan password yang akan di gunakan sebagai email pengirim
		$mail->Username = 'exam.ta2008@gmail.com';
		$mail->Password = 'aknkajen18';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		//email yg akan di gunakan sebagai email pengirim
		$mail->setFrom('exam.ta2008@gmail.com', 'TA.2008');
		$mail->addAddress($email, $name);
		$mail->isHTML(true);
		$mail->Subject = "Aktivasi Akun";
		$mail->Body .= 'Klik Link berikut untuk memverifikasi akun anda: <a href="http://o-ujian.online/auth/verify?email=' . $email . '&token=' . urlencode($token) . '" >Aktifkan!</a>
      <br>
      hanya berlaku selama 24 jam!';
		$mail->send();

		header('location: ../../index.php?page=guru&createuser=success');
	} else {
		header('location: ../../index.php?page=guru&createuser=fail');
	}
}
