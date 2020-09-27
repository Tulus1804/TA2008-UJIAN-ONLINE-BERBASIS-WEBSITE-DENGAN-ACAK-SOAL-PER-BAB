<?php

error_reporting(0);

if ($_GET['page'] == "user") {
    include 'tabel.php';
} else if ($_GET['page'] == "guru") {
    include 'tabel.php';
} else if ($_GET['page'] == "siswa") {
    include 'tabel.php';
} else if ($_GET['page'] == "tambahuser") {
    include 'form.php';
} else if ($_GET['page'] == "ubahuser") {
    include 'form.php';
} else if ($_GET['page'] == "tambahguru") {
    include 'form.php';
} else if ($_GET['page'] == "ubahguru") {
    include 'form.php';
} else if ($_GET['page'] == "tambahsiswa") {
    include 'form.php';
} else if ($_GET['page'] == "ubahsiswa") {
    include 'form.php';
} else if ($_GET[""] == "") {
    include 'box.php';
}
