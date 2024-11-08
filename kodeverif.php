<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['kode'])) {
    require 'koneksi.php';
    $kode = $_POST['kode'];
    $email = $_POST['email'];
    $sqlcek = "SELECT * FROM verif WHERE code = ? ";
    $stmtcek = $conn->prepare($sqlcek);
    $stmtcek->bind_param("i", $kode);
    $stmtcek->execute();
    $result = $stmtcek->get_result();
    
    if ($result->num_rows == 0) {
        echo "
        <script>
            alert('Berhasil Kode Verifikasi Salah!');
            document.location.href = 'login.php';
        </script>";
        echo "<form id='redirectForm' method='POST' action='kodeverif.php'>
            <input type='hidden' name='email' value='$email'>
          </form>
          <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
          </script>";
        
    }
    
    $row = $result->fetch_assoc();
    $id = $row['id_pengguna'];

    $sql = "SELECT * FROM verif WHERE id_pengguna = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    $updateverif = "UPDATE user set verif = 'udah' WHERE id_user = ?";
    $stmtupdate = $conn->prepare($updateverif);
    $stmtupdate->bind_param("i", $id);
    $stmtupdate->execute();
    $stmtupdate->close();
    
    $deletekode = "DELETE FROM verif WHERE id_pengguna = ?";
    $stmtdelete = $conn->prepare($deletekode);
    $stmtdelete->bind_param("i", $id);
    $stmtdelete->execute();

    header("Location: login.php");
    exit();


}
$email = $_POST['email'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/verif.css">
</head>
<body>

    <form action="" method="post" class="verification-container">
        <!-- Gmail Logo -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4e/Gmail_Icon.png" alt="Gmail Logo" class="gmail-logo">
        
        <!-- Title -->
        <div class="title">Masukkan Kode Verifikasi</div>
        
        <!-- Description -->
        <div class="description">Kode verifikasi telah dikirim melalui Gmail ke ****@gmail.com.</div>
        
        <!-- Input Field -->
        <input type="text" name="kode" class="code-input" placeholder="Masukkan kode">
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
        
        <!-- Resend Option -->
        <div class="resend">Tidak menerima kode? <a href="#">Kirim ulang</a></div>
    </form>
    

    <!-- <div class="textverif">
        <p>Silahkan Lakukan Verifikasi Email</p>
    </div>
    <div class="container">
        <div class="image-container">
            <img src="image/undraw_secure_files_re_6vdh.svg" alt="Learning Illustration" class="svg-image">
        </div>

        <form action="" method="post" class="login-form" >
            <div class="input-section">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="icon-grup">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </div>
                <div class="input-wrapper">
                    <div class="input-group">
                        <input type="text" id="USERNAME" name="kode" placeholder="Verifikasi Kode" required>
                    </div>
                </div>
            </div>

            

                <input type="submit" value="Verifikasi" class="login-button">
            </div>
        </form>
    </div> -->
</body>
</html>
