<?php
session_start();
require 'koneksi.php';
 
$emaill = $_POST['email'];
$passwordd = $_POST['password'];
$username = $_POST['namauser'];

$sql = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $emaill);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$verif = $row['verif'];
$namauser = $row['namauser'];
$id = $row['id_user'];

if ($verif == 'belum') {
    
    echo "<form id='verifForm' action='kodeverif.php' method='POST'>
        <input type='hidden' name='email' value='$emaill'>
        <input type='hidden' name='namauser' value='$namauser'>
        <input type='hidden' name='password' value='$passwordd'>
        <input type='hidden' name='id' value='$id'>
          </form>
          <script>
        document.getElementById('verifForm').submit();
          </script>";
    exit();
}else{

    if ($result->num_rows > 0) {
        if (password_verify($passwordd, $row['password']) && $username == $row['namauser']  && $emaill == $row['email']) { 
            $_SESSION['namauser'] = $row['namauser']; 
            header("Location: koridorpage.php"); 
            exit();
        } else {
            echo "<script>
                alert('Login Gagal: Data Tidak Sesuai.');
                window.location.href = 'login.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Login Gagal: Email atau password salah.');
            window.location.href = 'login.php';
        </script>";
    }
}

?>