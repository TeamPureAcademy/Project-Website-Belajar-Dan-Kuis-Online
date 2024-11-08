<?php
require 'koneksi.php';

$id_modul = $_POST['id_modul'];
$id_kelas = $_POST['id_kelas'];
$id_user = $_POST['id_user'];

$ceknamamodul = "SELECT * FROM modul WHERE id_modul = '$id_modul'";
$hasilcek = $conn->query($ceknamamodul);
$datamodul = $hasilcek->fetch_assoc();
$namamodul = $datamodul['file_modul'];
$file_path = "modul/" . $namamodul ; // Adjust the path and file extension as needed
if (file_exists($file_path)) {
  unlink($file_path);
}


$sql = "DELETE FROM modul WHERE id_modul = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_modul);



if ($stmt->execute()) {
    echo "<form id='redirectForm' method='post' action='masukkelas.php'>
            <input type='hidden' name='id_kelas' value='$id_kelas'>
            <input type='hidden' name='id' value='$id_user'>
          </form>
          <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
          </script>";
    exit();
} else {
    echo "Error deleting record: " . $stmt->error; 
}

$stmt->close();
$conn->close();

?>