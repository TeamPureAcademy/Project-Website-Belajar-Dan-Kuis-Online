<?php
require 'koneksi.php';

if (!isset($_POST['id_quiz'], $_POST['id_kelas'], $_POST['id_user'])) {
    header('Location: koridorpage.php');
    exit();
}

$id_quiz = $_POST['id_quiz'];
$id_kelas = $_POST['id_kelas'];
$userId = $_POST['id_user'];


$cekganda = "SELECT id_pertanyaan FROM pertanyaan_ganda WHERE id_quiz = '$id_quiz'";
$resultcekganda = mysqli_query($conn, $cekganda);
while ($rowcekganda = mysqli_fetch_assoc($resultcekganda)) {

    $id_pertanyaan = $rowcekganda['id_pertanyaan'];

    $sqldeletepertanyaan = "DELETE FROM jawaban_user WHERE id_pertanyaan = '$id_pertanyaan'";

    mysqli_query($conn, $sqldeletepertanyaan);

}

$sqldeleteuserquiz = "DELETE FROM pertanyaan_ganda WHERE id_quiz = '$id_quiz'";
mysqli_query($conn, $sqldeleteuserquiz);

$sqldeleteotherrelated = "DELETE FROM nilai_user WHERE id_quiz = '$id_quiz'";
mysqli_query($conn, $sqldeleteotherrelated);

$sqldeletequiz = "DELETE FROM quiz WHERE id_quiz = '$id_quiz'";

if (mysqli_query($conn, $sqldeletequiz)) {

    

   

    echo "
    <script>
        alert('Berhasil Menghapus Quiz dan semua yang berhubungan!');
    </script>";
    echo "<form id='redirectForm' method='POST' action='masukkelas.php'>
        <input type='hidden' name='id_kelas' value='$id_kelas'>
        <input type='hidden' name='id' value='$userId'>
      </form>
      <script type='text/javascript'>
        document.getElementById('redirectForm').submit();
      </script>";
}

mysqli_close($conn);


?>