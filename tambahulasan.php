<?php
require 'koneksi.php';

$id_user = $_POST['id_user'];


$pesan = mysqli_real_escape_string($conn, filter_var($_POST['pesan'], FILTER_SANITIZE_STRING));
$rating = (int)$_POST['rating'];

if ($rating < 1 || $rating > 5) {
    die("Rating harus antara 1 dan 5.");
}

$select_pesan = mysqli_query($conn, "SELECT * FROM ulasan WHERE id_user = '$id_user' AND pesan = '$pesan'") or die('Query failed');

if (mysqli_num_rows($select_pesan) > 0) {
    echo "";
} else {
    $insert_query = "INSERT INTO ulasan (id_user, pesan, rating) VALUES ('$id_user', '$pesan', '$rating')";
    if (mysqli_query($conn, $insert_query)) {
        echo "
        <script>
            alert('Terimakasih Telah Menambah Ulasan!');
            document.location.href = 'koridorpage.php';
        </script>";
    } else {
        die("Gagal mengirim ulasan.");
    }
}










?>