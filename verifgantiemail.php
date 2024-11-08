<?php
require 'koneksi.php';

$id_user = $_POST['id_user'];

$code = rand(100000, 999999);
$sqlverif = "INSERT INTO verif (id_pengguna, code) VALUES ('$id_user', '$code')";
$resultverif = mysqli_query($conn, $sqlverif);






use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['id_user'])){

    $sql = "SELECT * FROM user where id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        

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
       
        $mail->Subject = "kode Verifikasi: $code";
        $mail->Body = "Hai $nama_pengguna, <br> Kode Verifikasi Anda adalah <b>$code</b>. <br> Kode Ini Berifat Privasi, Mohon Tidak Memberikan Kode Ke Orang Yang Anda Tidak Kenal .";

        $mail->send();

        echo "<form id='redirectForm' method='POST' action='gantiemail.php'>
            <input type='hidden' name='email' value='$email'>
        </form>
        <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
        </script>";
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
        $mail->Subject = 'User Not Registered';
        $mail->Body = "The email address you provided is not registered in our system.";

        $mail->send();
        
    }

    $stmt->close();
}

$conn->close();
?>









?>