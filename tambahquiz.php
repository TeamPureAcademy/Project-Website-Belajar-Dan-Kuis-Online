<?php
require 'koneksi.php';

$id = $_POST['id_user'];
$kelas = $_POST['id_kelas'];
$quiz = $_POST['quiz'];
$nilai = $_POST['jumlahnilai'];

$sql = "INSERT INTO quiz (id_user, id_kelas, nama_quiz, nilai) VALUES ('$id', '$kelas', '$quiz', '$nilai')";

if (mysqli_query($conn, $sql)) {
    echo '
    <form id="redirectForm" action="masukkelas.php" method="POST">
        <input type="hidden" name="id_kelas" value="' . $kelas . '">
        <input type="hidden" name="id" value="' . $id . '">
    </form>
    <script type="text/javascript">
        document.getElementById("redirectForm").submit();
    </script>
    ';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>