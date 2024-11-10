<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/regis.css">
    <title>Login</title>
</head>
<body>
    <div class="content">
            
        <div class="sec_mid">
            <form action="tambah.php" method="post" enctype="multipart/form-data">
                <table border = "0">
                    <tr>
                        <td>
                            <div class="icon-container">
        
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-group" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                            </div>
                        </td>
                        <td>
                            <div class="input">
                                <input type="text" id="name" name="username" placeholder="Nama"  required>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="icon-container">
        
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-group" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                                </svg>
                            </div>
                        </td>
                        
                        <td>
                            <div class="input">
                                <input type="email" id="email" name="email" placeholder="Email" required>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-group" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                                </svg>
                            </div>
                        </td>
                        <td>
                            <div class="input">
                                <input type="password" id="password" name="password" placeholder="Kata Sandi" required>
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="icon-container">
        
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-group" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                                </svg>
                            </div>
                        </td>
                        <td>
                            <td>
                            <div class="input">
                                <input type="password" id="password_confirm" name="password_confirm" placeholder="Konfirmasi Kata Sandi" required>
                                <i class="bi bi-eye-slash" id="togglePasswordConfirm" \></i>
                            </div>
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="icon-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-group" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                            </div>
                        </td>
                        <td>
                            <div class="select">
                                <select id="role" name="role">
                                    <option value="default" disabled selected>Pilih peran</option>
                                    <option value="guru">Guru</option>
                                    <option value="murid">Murid</option>
                                </select>
                                  <br><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label class="avatar"  for="avatar"><strong>AVATAR</strong></label>
                        </td>
                        
                        <td>
                            <div class="custom-file-upload">
                                Pilih File
                                <input type="file" id="file-upload" name="foto">
                            </div>
                        </td>
                        <td>
                            <span class="keteranganFile"  id="file-chosen">Tidak Ada File yang Dipilih</span>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                        </td>

                        <td>
                            <div class="btn">
                                <a href="#register"><button>Daftar</button></a>
                            </div>
                        </td>
                    </tr>
        
                </table>
               
               
            </form>
        </div>
            <img class="right" src="image/gambar.png" alt="logo kanan">
    </div>
    <script src="script/regis.js"></script>

</body>
</html>