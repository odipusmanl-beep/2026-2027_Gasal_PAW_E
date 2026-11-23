<?php
session_start();

// Jika user belum login, paksa kembali ke halaman login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php");
    exit;
}
?>