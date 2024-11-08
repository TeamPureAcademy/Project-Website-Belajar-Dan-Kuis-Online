<?php

require 'koneksi.php';

if (!isset($_POST['role'])) {
    echo "
    <script>
        alert('Harap Isi Role!');
        document.location.href = 'registrasi.php';
    </script>";
    exit;
}

$username = $_POST['username'];
$email = $_POST['email'];
$role = $_POST['role'];
$sqlCheck = "SELECT * FROM user WHERE namauser = '$username' OR email = '$email'";
$resultCheck = mysqli_query($conn, $sqlCheck);

if (mysqli_num_rows($resultCheck) > 0) {
    echo "
    <script>
        alert('Username atau Email sudah terdaftar!');
        document.location.href = 'registrasi.php';
    </script>";
    exit;
}

if ($_POST['password'] != $_POST['password_confirm']) {
    echo "
    <script>
        alert('Password tidak sama!');
        document.location.href = 'registrasi.php';
    </script>";
    exit;
}

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$foto = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];
$file_name = $_FILES['foto']['name'];

if (empty($foto)) {
    $newFileName = 'default.png';
} else {
    $validExtension = ['jpg', 'jpeg', 'png'];
    $fileExtension = explode('.', $file_name);
    $fileExtension = strtolower(end($fileExtension));

    if (!in_array($fileExtension, $validExtension)) {
        echo "
        <script>
            alert('File yang Harus Jpg, Jpeg, Png!');
            document.location.href = 'registrasi.php';
        </script>";
        exit;
    } else {
        $newFileName = date('Y-m-d H.i.s') . '.' . $fileExtension;
        if (!move_uploaded_file($tmp_name, 'picture/' . $newFileName)) {
            echo "
            <script>
                alert('Gagal mengupload foto!');
                document.location.href = 'registrasi.php';
            </script>";
            exit;
        }
    }
}

$sql = "INSERT INTO user (namauser, password, email, foto, role, verif) VALUES ('$username', '$password', '$email','$newFileName', '$role', 'belum')";
$result = mysqli_query($conn, $sql);

if ($result) {
    $sqlcekid = "SELECT * FROM user WHERE namauser = '$username'";
    $resultcekid = mysqli_query($conn, $sqlcekid);
    $row = mysqli_fetch_assoc($resultcekid);
    $id = $row['id_user'];
    $code = rand(100000, 999999);
    $sqlverif = "INSERT INTO verif (id_pengguna, code) VALUES ('$id', '$code')";
    $resultverif = mysqli_query($conn, $sqlverif);

    if (!$resultverif) {
        echo "
        <script>
            alert('Gagal memasukkan data ke tabel verif!');
            document.location.href = 'registrasi.php';
        </script>";
        exit;
    }

    echo "
    <form id='redirectForm' method='POST' action='verif.php'>
        <input type='hidden' name='id' value='$id'>
        <input type='hidden' name='namauser' value='$username'>
        <input type='hidden' name='password' value='$password'>
        <input type='hidden' name='email' value='$email'>
    </form>
    <script type='text/javascript'>
        document.getElementById('redirectForm').submit();
    </script>";
} else {
    echo "
    <script>
        alert('Gagal membuat account!');
        document.location.href = 'registrasi.php';
    </script>";
}

?>
