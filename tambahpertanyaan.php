<?php

require 'koneksi.php';

$gandaSoalList = [];
$gandaJawabanList = [];
$apilihangandaList = [];
$bpilihangandaList = [];
$cpilihangandaList = [];
$dpilihangandaList = [];
$epilihangandaList = [];
$poingganda = [];
$nogandalist = [];
$id_quiz = $_POST['id_quiz'];
$id_kelas = $_POST['id_kelas'];
$userId = $_POST['id'];

$c = 1;
$d = 1;
$e = 1;
$f = 1;
$g = 1;
$h = 1;
$i = 1;
$z = 1;
$per = 1;

while (isset($_POST['soal-pilihanganda' . $h])) {
    $gandaSoalList[] = $_POST['soal-pilihanganda' . $h];
    $h++;
}

while (isset($_POST['a-pilihanganda' . $c])) {
    $apilihangandaList[] = $_POST['a-pilihanganda' . $c];
    $c++;
}

while (isset($_POST['b-pilihanganda' . $d])) {
    $bpilihangandaList[] = $_POST['b-pilihanganda' . $d];
    $d++;
}

while (isset($_POST['c-pilihanganda' . $e])) {
    $cpilihangandaList[] = $_POST['c-pilihanganda' . $e];
    $e++;
}

while (isset($_POST['d-pilihanganda' . $f])) {
    $dpilihangandaList[] = $_POST['d-pilihanganda' . $f];
    $f++;
}

while (isset($_POST['e-pilihanganda' . $g])) {
    $epilihangandaList[] = $_POST['e-pilihanganda' . $g];
    $g++;
}

while (isset($_POST['jawaban-pilihanganda' . $i])) {
    $gandaJawabanList[] = $_POST['jawaban-pilihanganda' . $i];
    $i++;
}

while (isset($_POST['Point-ganda' . $z])) {
    $poingganda[] = $_POST['Point-ganda' . $z];
    $z++;
}

while (isset($_POST['no-ganda' . $per])) {
    $nogandalist[] = $_POST['no-ganda' . $per];
    $per++;
}

$validChoices = ['a', 'b', 'c', 'd', 'e'];
$isValid = true;

for ($jawabannbenar = 0; $jawabannbenar < count($gandaJawabanList); $jawabannbenar++){
    if ($gandaJawabanList[$jawabannbenar] == $apilihangandaList[$jawabannbenar]){
        
    } else if ($gandaJawabanList[$jawabannbenar] == $bpilihangandaList[$jawabannbenar]){
        $gandaJawabanList[$jawabannbenar] = 'b';
    } else if ($gandaJawabanList[$jawabannbenar] == $cpilihangandaList[$jawabannbenar]){
        $gandaJawabanList[$jawabannbenar] = 'c';
    } else if ($gandaJawabanList[$jawabannbenar] == $dpilihangandaList[$jawabannbenar]){
        $gandaJawabanList[$jawabannbenar] = 'd';
    } else if ($gandaJawabanList[$jawabannbenar] == $epilihangandaList[$jawabannbenar]){
        $gandaJawabanList[$jawabannbenar] = 'e';
    }else{
        echo "<script>alert('Jawaban Harus Sesuai Dengan A, B, C, D, E');</script>";
        echo "<form id='redirectForm' method='POST' action='pertanyaan.php'>
            <input type='hidden' name='id_kelas' value='$id_kelas'>
            <input type='hidden' name='id' value='$userId'>
            <input type='hidden' name='id_quiz' value='$id_quiz'>
          </form>
          <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
          </script>";
          $isValid = false;
    }
}


if ($isValid && $conn) {
    $stmt = $conn->prepare("INSERT INTO pertanyaan_ganda (id_quiz, nomor_pertanyaan, soal, jawaban_a, jawaban_b, jawaban_c, jawaban_d, jawaban_e, jawaban_benar, nilai) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    for ($j = 0; $j < count($gandaSoalList); $j++) {
        $stmt->bind_param("iisssssssi",
            $id_quiz,
            $nogandalist[$j],
            $gandaSoalList[$j],
            $apilihangandaList[$j],
            $bpilihangandaList[$j],
            $cpilihangandaList[$j],
            $dpilihangandaList[$j],
            $epilihangandaList[$j],
            $gandaJawabanList[$j],
            $poingganda[$j]
        );

        if (!$stmt->execute()) {
            echo "Error inserting question " . ($j + 1) . ": " . $stmt->error;
        }
    }

    $stmt->close();
    
    echo "<form id='redirectForm' method='POST' action='masukkelas.php'>
            <input type='hidden' name='id_kelas' value='$id_kelas'>
            <input type='hidden' name='id' value='$userId'>
          </form>
          <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
          </script>";
} else {
    echo "Failed to connect to the database.";
}

$conn->close();

?>
