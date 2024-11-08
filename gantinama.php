<?php
session_start();
require 'koneksi.php';
if (isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
} else {
    header("Location: koridorpage.php");
    exit();
}
$nama = $_POST['nama'];

$update = "UPDATE user SET namauser = '$nama' WHERE id_user = '$id_user'";
$hasil = mysqli_query($conn, $update);

if ($hasil) {
    
    $_SESSION['namauser'] = $nama; 
    header("Location: koridorpage.php"); 
    exit();
} else {
    echo "Update failed: " . mysqli_error($conn);
}











?>