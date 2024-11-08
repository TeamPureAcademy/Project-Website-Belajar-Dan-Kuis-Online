<?php

require 'koneksi.php';

$id_modul = $_POST['id_modul'];
$nama_modul = $_POST['nama_modul'];
$id_user = $_POST['id_user'];
$id_kelas = $_POST['id_kelas'];



$sqlmodul = "UPDATE modul SET judul_modul='$nama_modul' WHERE id_modul='$id_modul'";
$hasilmodul = mysqli_query($conn, $sqlmodul);

if ($hasilmodul) {
    echo "<form id='redirectForm' method='POST' action='masukkelas.php'>
            <input type='hidden' name='id' value='$id_user'>
            <input type='hidden' name='id_kelas' value='$id_kelas'>
          </form>
          <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
          </script>";
    exit();
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}




?>