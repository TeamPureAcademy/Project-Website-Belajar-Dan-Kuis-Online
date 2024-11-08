<?php
require 'koneksi.php';

$namakelas = $_POST['tambahkelas'];
$kode = $_POST['kode'];
$kategorip = $_POST['kategori_p'];
$id_user = $_POST['userId'];

$user_check_query = "SELECT id_user FROM user WHERE id_user = '$id_user'";
$user_check_result = mysqli_query($conn, $user_check_query);

if (mysqli_num_rows($user_check_result) > 0) {
    $sql = "INSERT INTO kelas (nama_kelas, kode, kategori, id_user) VALUES ('$namakelas', '$kode','$kategorip', '$id_user')";
    if(mysqli_query($conn, $sql)){
        header("location:koridorpage.php");
    } else{
        echo "Pendaftaran Gagal :". mysqli_error($conn);
    }
} else {
    echo "Pendaftaran Gagal: User ID tidak ditemukan.";
}
?>