<?php

$notif = "";

if (@$_GET['login'] == "wrong") {
    $notif = '<p class="alert alert-danger">Username/Password salah!</p>';
} else if (@$_GET['login'] == "no") {
    $notif = '<p class="alert alert-danger">Anda harus login dahulu!</p>';
} else if (@$_GET['login'] == "bukanadmin") {
    $notif = '<p class="alert alert-danger">Anda bukan Admin!</p>';
}
