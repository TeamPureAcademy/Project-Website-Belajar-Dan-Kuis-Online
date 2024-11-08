<?php
include "koneksi.php";


$email = $_POST['email'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['email'])){

    $sql = "SELECT * FROM user where email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $sqlverif = "SELECT * FROM user WHERE email = ?";
        $stmtverif = $conn->prepare($sqlverif);
        $stmtverif->bind_param("s", $email);
        $stmtverif->execute();
        $resultverif = $stmtverif->get_result();
        $rowverif = $resultverif->fetch_assoc();
        $password = $rowverif['password'];
        
        

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'botmailrehan@gmail.com';
        $mail->Password = 'nkhs xstj klcr egit';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('botmailrehan@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Body = "Hai, <br> Password Anda adalah <b>  $password </b>. <br> Terima Kasih Sudah Bergabung Dengan Kami.";

        $mail->send();

        
    } else {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'botmailrehan@gmail.com';
        $mail->Password = 'nkhs xstj klcr egit';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('botmailrehan@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'User Bleum Terdaftar';
        $mail->Body = "Anda Belum Terdaftar Sebagai User";

        $mail->send();
        
    }

    $stmt->close();
}

$conn->close();
echo "<script type='text/javascript'>
            alert('Silahkan cek email Anda.');
            window.location.href = 'login.php';
        </script>";
?>