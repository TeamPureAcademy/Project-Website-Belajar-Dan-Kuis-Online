<?php
require 'koneksi.php';

$passwordLama = $_POST['passlama'];
$passwordBaru = $_POST['passbaru'];
$id_user = $_POST['id_user'];

$sqlcek = "SELECT * FROM user WHERE id_user = $id_user";
$querycek = mysqli_query($conn, $sqlcek);
$cek = mysqli_fetch_array($querycek);
$passwordmatch = $cek['password'];

if (password_verify($passwordLama, $passwordmatch)) {
    $passwordBaru = password_hash($passwordBaru, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET password = '$passwordBaru' WHERE id_user = $id_user";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "
        <script>
            alert('Password Berhasil Di Ubah!');
            document.location.href = 'koridorpage.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Password Gagal Di Ubah!');
            document.location.href = 'koridorpage.php';
        </script>";
    }
} else {
    echo "
        <script>
            alert('Password Lama Salah!');
            document.location.href = 'koridorpage.php';
        </script>";
}











?>