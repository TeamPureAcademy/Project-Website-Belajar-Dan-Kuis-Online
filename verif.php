<?php
include "koneksi.php";

$nama_pengguna = $_POST['namauser'];
$password_pengguna = $_POST['password'];
$email = $_POST['email'];
$id = $_POST['id'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['email'])){

    $sql = "SELECT * FROM user where id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $sqlverif = "SELECT * FROM verif WHERE id_pengguna = ?";
        $stmtverif = $conn->prepare($sqlverif);
        $stmtverif->bind_param("i", $id);
        $stmtverif->execute();
        $resultverif = $stmtverif->get_result();
        $rowverif = $resultverif->fetch_assoc();
        $code = $rowverif['code'];
        

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'timpureacademy@gmail.com';
        $mail->Password = 'robo wrmt yfec woyh';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('timpureacademy@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);
       
        $mail->Subject = "kode Verifikasi: $code";
        $mail->Body = "Hai $nama_pengguna, <br> Kode Verifikasi Anda adalah <b>$code</b>. <br> Terima Kasih Sudah Bergabung Dengan Kami .";

        $mail->send();

        echo "<form id='redirectForm' method='POST' action='kodeverif.php'>
            <input type='hidden' name='email' value='$email'>
        </form>
        <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
        </script>";
    } 

    $stmt->close();
}

$conn->close();
?>