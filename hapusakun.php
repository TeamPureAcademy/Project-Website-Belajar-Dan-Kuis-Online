<?php
require 'koneksi.php';
$id_user = $_POST['id_user'];
$sqlcekfoto = "SELECT foto FROM user WHERE id_user = ?";
$stmt = $conn->prepare($sqlcekfoto);
$stmt->bind_param("i", $id_user);
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


$sqlquiz = "SELECT id_quiz FROM quiz WHERE id_user = ?";
$stmtquiz = $conn->prepare($sqlquiz);
$stmtquiz->bind_param("i", $id_user);
$stmtquiz->execute();
$resultquiz = $stmtquiz->get_result();

while ($rowquiz = $resultquiz->fetch_assoc()) {
    $id_quiz = $rowquiz['id_quiz'];

    $cekganda = "SELECT id_pertanyaan FROM pertanyaan_ganda WHERE id_quiz = ?";
    $stmtcekganda = $conn->prepare($cekganda);
    $stmtcekganda->bind_param("i", $id_quiz);
    $stmtcekganda->execute();
    $resultcekganda = $stmtcekganda->get_result();

    while ($rowcekganda = $resultcekganda->fetch_assoc()) {
        $id_pertanyaan = $rowcekganda['id_pertanyaan'];

        $sqldeletepertanyaan = "DELETE FROM jawaban_user WHERE id_pertanyaan = ?";
        $stmtdeletepertanyaan = $conn->prepare($sqldeletepertanyaan);
        $stmtdeletepertanyaan->bind_param("i", $id_pertanyaan);
        $stmtdeletepertanyaan->execute();
        $stmtdeletepertanyaan->close();
    }
    $stmtcekganda->close();
    $resultcekganda->close();

    $sqlnilaiuser = "DELETE FROM nilai_user WHERE id_quiz = ?";
    $stmtnilaiuser = $conn->prepare($sqlnilaiuser);
    $stmtnilaiuser->bind_param("i", $id_quiz);
    $stmtnilaiuser->execute();
    $stmtnilaiuser->close();

    $sqlDeletePertanyaanGanda = "DELETE FROM pertanyaan_ganda WHERE id_quiz = ?";
    $stmtDeletePertanyaanGanda = $conn->prepare($sqlDeletePertanyaanGanda);
    $stmtDeletePertanyaanGanda->bind_param("i", $id_quiz);
    $stmtDeletePertanyaanGanda->execute();
    $stmtDeletePertanyaanGanda->close();
}

$sqlquiz = "SELECT id_quiz FROM quiz WHERE id_user = ?";
$stmtquiz = $conn->prepare($sqlquiz);
$stmtquiz->bind_param("i", $id_user);
$stmtquiz->execute();
$resultquiz = $stmtquiz->get_result();

while ($rowquiz = $resultquiz->fetch_assoc()) {
    $id_quiz = $rowquiz['id_quiz'];

    $sqlnilaiuser = "DELETE FROM nilai_user WHERE id_quiz = ?";
    $stmtnilaiuser = $conn->prepare($sqlnilaiuser);
    $stmtnilaiuser->bind_param("i", $id_quiz);
    $stmtnilaiuser->execute();
    $stmtnilaiuser->close();

    $sqlDeletePertanyaanGanda = "DELETE FROM pertanyaan_ganda WHERE id_quiz = ?";
    $stmtDeletePertanyaanGanda = $conn->prepare($sqlDeletePertanyaanGanda);
    $stmtDeletePertanyaanGanda->bind_param("i", $id_quiz);
    $stmtDeletePertanyaanGanda->execute();
    $stmtDeletePertanyaanGanda->close();
}





$sqljawabanuser = "DELETE FROM jawaban_user WHERE id_user = ?";
$sqlulasan = "DELETE FROM ULASAN WHERE id_user = ?";
$sqlnilaiuser = "DELETE FROM NILAI_USER WHERE id_user = ?";
$sqlquizdelete = "DELETE FROM QUIZ WHERE id_user = ?";
$sqlmodul = "DELETE FROM MODUL WHERE id_user = ?";
$sqlverif = "DELETE FROM VERIF WHERE id_pengguna = ?";
$sqlkelasuser = "DELETE FROM KELAS_USER WHERE id_user = ?";
$sqlkelas = "DELETE FROM kelas WHERE id_user = ?";
$sqluser = "DELETE FROM user WHERE id_user = ?";
$deleteQueries = [ $sqljawabanuser, $sqlulasan, $sqlnilaiuser, $sqlquizdelete, $sqlmodul, $sqlverif, $sqlkelasuser, $sqlkelas, $sqluser];
$deleteQueries = [ $sqljawabanuser, $sqlulasan, $sqlnilaiuser, $sqlquizdelete, $sqlmodul, $sqlverif, $sqlkelasuser, $sqlkelas, $sqluser];

foreach ($deleteQueries as $sql) {
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id_user);
        if (!$stmt->execute()) {
            echo "Error deleting user: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

echo "
<script>
    alert('Berhasil menghapus akun!');
    document.location.href = 'index.php';
</script>";

$conn->close();








?>