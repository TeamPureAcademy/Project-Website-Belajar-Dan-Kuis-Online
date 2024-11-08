<?php
require 'koneksi.php';

if (!isset($_POST['userId'])) {
    header("Location: koridorpage.php");
    exit();
}

$id_user = $_POST['userId'];
$tmp_name = $_FILES['foto']['tmp_name'];
$file_name = $_FILES['foto']['name'];

$validExtension = ['jpg', 'jpeg', 'png'];
$fileExtension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

if (!in_array($fileExtension, $validExtension)) {
    echo "
    <script>
    alert('File yang Harus Jpg, Jpeg, Png!');
    document.location.href = 'koridorpage.php';
    </script>";
    exit();
}

if ($_FILES["foto"]["size"] > 500000) {
    echo "
    <script>
        alert('File Terlalu Besar! Minimal 500KB');
        document.location.href = 'koridorpage.php';
    </script>";
    exit();
}

$sql = "SELECT foto FROM user WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$foto = $row['foto'];

if ($foto) {
    $file_path = "picture/" . $foto;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

$newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
if (move_uploaded_file($tmp_name, 'picture/' . $newFileName)) {
    $sql = "UPDATE user SET foto = ? WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newFileName, $id_user);
    $result = $stmt->execute();

    if ($result) {
        echo "
        <script>
            alert('Foto berhasil diupload!');
            document.location.href = 'koridorpage.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Gagal mengupdate foto di database!');
            document.location.href = 'koridorpage.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('Gagal mengupload foto!');
        document.location.href = 'koridorpage.php';
    </script>";
}
?>
