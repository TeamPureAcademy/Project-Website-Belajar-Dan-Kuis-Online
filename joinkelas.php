<?php
require 'koneksi.php';

$kode = $_POST['kode'];
$id_user = $_POST['userId'];

$user_check_query = "SELECT id_user FROM user WHERE id_user = '$id_user'";
$user_check_result = mysqli_query($conn, $user_check_query);

if (mysqli_num_rows($user_check_result) > 0) {
    $cekkelas = "SELECT id_kelas FROM kelas WHERE kode = '$kode'";
    $kelas_result = mysqli_query($conn, $cekkelas);

    if (mysqli_num_rows($kelas_result) > 0) {
        $kelas_row = mysqli_fetch_assoc($kelas_result);
        $id_kelas = $kelas_row['id_kelas'];

        $sql = "INSERT INTO kelas_user (id_user, id_kelas) VALUES ('$id_user', '$id_kelas')";
        if (mysqli_query($conn, $sql)) {
            header("location:koridorpage.php");
        } else {
            echo "Pendaftaran Gagal: " . mysqli_error($conn);
        }
    } else {
        echo "Pendaftaran Gagal: Kode kelas tidak ditemukan.";
    }
} else {
    echo "Pendaftaran Gagal: User ID tidak ditemukan.";
}
?>