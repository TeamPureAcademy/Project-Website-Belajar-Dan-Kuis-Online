<?php
require 'koneksi.php';

$id = $_POST['id_user'];
$id_kelas = $_POST['id_kelas'];
$namaModul = $_POST['modul'];
$temp_nama = $_FILES['filemodul']['tmp_name'];
$file_name = $_FILES['filemodul']['name'];

$validExtension = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx'];
$fileExtension = explode('.', $file_name);
$fileExtension = strtolower(end($fileExtension));
if(!in_array($fileExtension, $validExtension)) {
    echo "
          <script>
              alert('File Tidak Di Dukung Mohon Masukkan File Jenis Pdf, Doc, Docx, Ppt, Pptx, Xls, Xlsx!');
          </script>";
    echo '
    <form id="redirectForm" action="masukkelas.php" method="POST">
        <input type="hidden" name="id_kelas" value="' . $id_kelas . '">
        <input type="hidden" name="id" value="' . $id . '">
    </form>
    <script type="text/javascript">
        document.getElementById("redirectForm").submit();
    </script>
    ';
}else{
    $newFileName = 'modul-' . date('Y-m-d H.i.s') . '.' . $fileExtension;
    if(move_uploaded_file($temp_nama,'modul/' .$newFileName)) {
        $sql = "INSERT INTO modul (id_kelas, judul_modul, file_modul, id_user) VALUES ('$id_kelas', '$namaModul', '$newFileName', '$id')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "
            <script>
                alert('Berhasil menambah Modul!');
            </script>" ;

            echo '
                <form id="redirectForm" action="masukkelas.php" method="POST">
                    <input type="hidden" name="id_kelas" value="' . $id_kelas . '">
                    <input type="hidden" name="id" value="' . $id . '">
                </form>
                <script type="text/javascript">
                    document.getElementById("redirectForm").submit();
                </script>
                ';
        }
    }
}









?>