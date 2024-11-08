<?php
session_start(); // Memulai sesi
session_destroy(); // Menghapus semua data sesi
header("Location: index.php"); // Mengarahkan pengguna kembali ke halaman utama atau halaman login
exit();
?>