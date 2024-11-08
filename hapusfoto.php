<?php

require 'koneksi.php';

if (!isset($_POST['userId'])) {
    header("Location: koridorpage.php");
    exit();
}
$iduser = $_POST['userId'];

$sql = "SELECT foto FROM user WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $iduser);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$foto = $row['foto'];

if ($foto && $foto != 'default.png') {
    $file_path = "picture/" . $foto;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

$sqlfotodefault = "UPDATE user SET foto = 'default.png' WHERE id_user = ?";
$stmt = $conn->prepare($sqlfotodefault);
$stmt->bind_param("i", $iduser);
$result = $stmt->execute();

echo "
<script>
    alert('Berhasil menghapus foto!');
    document.location.href = 'koridorpage.php';
</script>";




?>