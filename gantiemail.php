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
        echo "<form id='redirectForm' method='POST' action=''>
            <input type='hidden' name='email' value='$email'>
          </form>
          <script type='text/javascript'>
            document.getElementById('redirectForm').submit();
          </script>";
        
    }else{
        $row = $result->fetch_assoc();
        $id = $row['id_pengguna'];
        echo "
        <!DOCTYPE html>
        <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title>Login Page</title>
            <link rel=\"stylesheet\" href=\"style/verif.css\">
        </head>
        <body>

            
            <form action=\"\" method=\"post\" class=\"verification-container\">
                <!-- Gmail Logo -->
                <img src=\"https://upload.wikimedia.org/wikipedia/commons/4/4e/Gmail_Icon.png\" alt=\"Gmail Logo\" class=\"gmail-logo\">
                
                <!-- Title -->
                <div class=\"title\">Masukkan Email Baru Anda</div>
                
                
                <!-- Input Field -->
                <input type=\"text\" name=\"EmailBaru\" class=\"code-input\" placeholder=\"Masukkan Email Baru Anda\">
                <input type=\"hidden\" name=\"email\" value=\"$email ?>\">
                <input type=\"hidden\" name=\"id\" value=\"$id\">
    
            </form>
            

            
        </body>
        </html>
        ";

    }
    
    
    

    exit();


}else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['EmailBaru'])){
    require 'koneksi.php';
    
    
    $id = $_POST['id'];
    $sqlupdatemail = "UPDATE user SET email = ? WHERE id_user = ?";
    $stmtupdatemail = $conn->prepare($sqlupdatemail);
    $stmtupdatemail->bind_param("si", $_POST['EmailBaru'], $id);
    $stmtupdatemail->execute();
    $deletekode = "DELETE FROM verif WHERE id_pengguna = ?";
    $stmtdelete = $conn->prepare($deletekode);
    $stmtdelete->bind_param("i", $id);
    $stmtdelete->execute();


    echo "
    <script>
        alert('Berhasil Kode Mengganti Email!');
        document.location.href = 'koridorpage.php';
    </script>";
   
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
    
    

    
</body>
</html>
