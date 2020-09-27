<?php 

    include '../../koneksi.php';

    $iduser = $_POST['iduser'];
    $namauser = $_POST['namauser'];
    $pass = md5($_POST['pass']);

    $sql = mysqli_query($koneksi, "INSERT INTO tb_user VALUES ('$iduser','$namauser','$pass')");

    if($sql){
        header('location: ../../index.php?page=user&create=success');
    } else{
        header('location: ../../index.php?page=user&create=fail');
    }
