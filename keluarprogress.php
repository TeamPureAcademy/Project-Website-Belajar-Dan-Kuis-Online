<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_POST['id_user'];
    $id_quiz = $_POST['id_quiz'];
    $id_kelas = $_POST['id_kelas'];

    // Update the nilai_user table
    $sql = "UPDATE nilai_user SET keterangan = 'sudah' WHERE id_user = ? AND id_quiz = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id_user, $id_quiz);

    $stmt->execute();

    $stmt->close();
    $conn->close();
}

echo "<form action='masukkelas.php' method='post'>
    <input type='hidden' name='id_kelas' value='$id_kelas'>
    <input type='hidden' name='id' value='$id_user'>
    <button type='submit' class='auto-button'></button>
<script>
    document.addEventListener(\"DOMContentLoaded\", function() {
        document.querySelector(\".auto-button\").click();
    });
</script>
    </form>";
?>

