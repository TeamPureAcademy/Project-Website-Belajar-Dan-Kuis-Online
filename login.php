
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/Login.css">
</head>
<body>
    <div class="container">
        <!-- Image Section -->
        <div class="image-container">
            <img src="image/undraw_educator_re_ju47.svg" alt="Learning Illustration" class="svg-image">
        </div>

        <!-- Form Section -->
        <form action="in.php" method="post" class="login-form" >
            <!-- Username Input -->
            <div class="input-section">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="icon-grup">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                </div>
                <div class="input-wrapper">
                    <div class="input-group">
                        <input type="text" id="USERNAME" name="namauser" placeholder="NAMA" required>
                    </div>
                </div>
            </div>

            <!-- Email Input -->
            <div class="input-section">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="icon-grup">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                    </svg>
                </div>
                <div class="input-wrapper">
                    <div class="input-group">
                        <input type="email" id="EMAIL" name="email" placeholder="EMAIL" required>
                    </div>
                </div>
            </div>

            <!-- Password Input -->
            <div class="input-section">
                <div class="icon-container">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="icon-grup">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                    </svg>
                </div>
                <div class="input-wrapper">
                    <div class="input-group">
                        <input type="password" id="PASSWORD" name="password" placeholder="KATA SANDI" required>
                    </div>
                </div>
            </div>
            <div class="change">
                <!-- Submit Button -->
                <input type="submit" value="Masuk" class="login-button">
                <a href="registrasi.php"  class="dont-have-akun">Belum Punya Akun?</a>
            </div>
        </form>
    </div>
</body>
</html>
