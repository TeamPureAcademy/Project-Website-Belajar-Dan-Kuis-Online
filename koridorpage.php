<?php
session_start();
if (!isset($_SESSION['namauser'])) {
    header('Location: login.php');
    exit;
}

require 'koneksi.php';
$user = $_SESSION['namauser'];
$sql = "SELECT id_user, namauser, email, foto FROM user WHERE namauser = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['id_user'] = $row['id_user']; 
} else {
    echo "No user found";
    exit;
}

$stmt->close();
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Academy</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="style/responsivekoridor.css">
    <link rel="stylesheet" href="style/stylelanding.css">
    <link rel="stylesheet" href="style/responsivesetting.css">
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"
    />
    
</head>
<body>

    <div class="container">
        <nav class="side-bar">
            <div class="menu-utama">

                <div class="image-menu">
                    <img src="image/Recovered_PURE ACADEMY blues.png" alt="logo">
                </div>
                
            </div>
            <div class="menu-utama">

                <button class="bar-menu" id="home">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
                    </svg>
                </button>
                </button>
                <button class="bar-menu" id="ulasan">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-plus" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372zm-2.54 1.183L5.93 9.363 1.591 6.602z"/>
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5"/>
                </svg>
                </button>
                <button class="bar-menu" id="setting">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                </svg>
                </button>

            </div>
            <div class="menu-utama">

                <form class="set=logout" action="logout.php">
                    

                    <button class="setting" id="setting">
                        <svg class="log-in" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z"/>
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
                        </svg>
                        <svg class="logout" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                            <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                        </svg>
                    </button>
                </form>
                <div class="image-menu">


                    <?php
                    require 'koneksi.php';

                    $userId = $_SESSION['id_user'] ;

                    $sql = "SELECT foto FROM user WHERE id_user = ?";


                   

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $userId); 
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo " <img src='picture/".$row['foto']."' alt='profile-foto'>";
                    }
                    else {
                        echo " <img src='picture/user.svg' alt='profile-foto'>";
                    }



                    ?>
                    
                    
                </div>
            </div>
        </nav>

        <div class="konten-home" id="kontenHome">
            
            <div class="text-area">

                <p>Jelajahi Dunia Dengan Belajar Bersama Kami </p>
            </div>
            <div class="kategori">
                <button class="kategori-semua" id="all"><div class="logo">
                    <svg id="svg0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-microsoft" viewBox="0 0 16 16">
                        <path d="M7.462 0H0v7.19h7.462zM16 0H8.538v7.19H16zM7.462 8.211H0V16h7.462zm8.538 0H8.538V16H16z"/>
                    </svg>
                </div><p class="semua">Semua</p></button>
                <div class="wrapper">
                    <div class="kategoris">

                        <button class="kategori-kelas"  id="engginer"><div class="logo">
                            <svg  id="svg1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
                                <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>
                            </svg>
                        </div><p class="enginner">Enginner</p></button>
                        <button class="kategori-kelas" id="dkv"><div class="logo dkv">
                            <svg id="svg2"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"/>
                            </svg>
                        </div><p class="dkv">Dkv</p></button>
                        <button class="kategori-kelas" id="bisnis"><div class="logo">
                            <svg id="svg3"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                            </svg>
                        </div><p class="bisnis">Bisnis</p></buton>
                        <button class="kategori-kelas" id="bahasa"><div class="logo">
                            <svg id="svg4"   xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                                <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                                <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                            </svg>
                        </div><p class="bahasa">Bahasa</p></button>
                        <button class="kategori-kelas" id="matematika"><div class="logo">
                            <svg id="svg5"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </div><p class="mtk">Matematika</p></button>
                        <button class="kategori-kelas" id="sains"><div class="logo">
                            <svg id="svg6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2"><path d="M27 27V10.139A2.139 2.139 0 0 1 29.139 8h5.722A2.139 2.139 0 0 1 37 10.139V27M40.937 43l6.094 8.865a2.781 2.781 0 0 1-2.29 4.355H19.259a2.78 2.78 0 0 1-2.29-4.355L23 43.092" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M31.174 41.14a2.655 2.655 0 0 0 1.652 0l4.011 4.289A8.32 8.32 0 0 1 32 46.971a8.32 8.32 0 0 1-4.837-1.542l4.011-4.289zM25.779 39.137l-2.091.375A8.365 8.365 0 0 1 28.539 31l1.763 5.564a2.66 2.66 0 0 0-.96 1.934M34.757 33.222 35.461 31a8.365 8.365 0 0 1 4.851 8.512l-5.654-1.014a2.66 2.66 0 0 0-.96-1.934" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="45.895" cy="26.711" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="15.5" cy="33" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M32 11h.575A1.424 1.424 0 0 1 34 12.425V18" style="fill:none;stroke:#222a33;stroke-width:1.5px"/></svg>
                        </div><p class="sains">Sains</p></button>
                    </div>
                </div>
                <button id="nextBtn" class="nextBtn">
                    <svg id="svgs"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                </button>
            </div>
            <div class="wrapper-kelas">
                <div class="kelas-mu">

                    <h4>Kategori Kelas Kamu</h4>
                    <div class="tambahorjoinkelas">

                        <?php
                        require 'koneksi.php';


                        require 'koneksi.php';

                        $userId = $_SESSION['id_user'] ;

                        $sql = "SELECT role FROM user WHERE id_user = ?";


                    

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $userId); 
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            if ($row['role'] == 'guru') {
                                echo "<style>
                                        .buatkelasbaru{
                                            display: flex;
                                        }
                                        .masukkelasbaru{
                                            display: none;
                                        }
                                      </style>";
                            } else if ($row['role'] == 'murid') {
                                echo "<style>
                                        .masukkelasbaru{
                                            display: flex;
                                        }
                                        .buatkelasbaru{
                                            display: none;
                                        }
                                      </style>";
                            }
                        } 


                        ?>
                        
                        <button class="buatkelasbaru" id="buatkelas">
                            <div class="icon-tambah">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </div>
                            <h4>Buat Kelas</h4>

                        </button>
                        <div class="joinkelasbaru">
                            
                        </div>
                        <button class="masukkelasbaru" id="masuk">
                            <div class="icon-tambah">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </div>
                            <h4>Masuk Kelas</h4>

                        </button>
                        <button id="nextBtns2" class="nextBtn nxt2" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                            </svg>
                        </button>
                        
                    </div>

                    <div class="kelas all" id="kelasContainer">
                        <?php
                        require 'koneksi.php';

                        $userId = $_SESSION['id_user'];
                        
                        $sqlRole = "SELECT role FROM user WHERE id_user = ?";
                        $stmtRole = $conn->prepare($sqlRole);
                        $stmtRole->bind_param("i", $userId);
                        $stmtRole->execute();
                        $resultRole = $stmtRole->get_result();
                        $roleRow = $resultRole->fetch_assoc();
                        $role = $roleRow['role'];
                        
                        
                        if ($role === 'murid') {
                            
                            $sql = "
                               SELECT kelas.*, user.*, 
                                (SELECT u.namauser 
                                FROM user u 
                                WHERE u.id_user = kelas.id_user LIMIT 1) AS guru,
                                (SELECT u.foto 
                                FROM user u 
                                WHERE u.id_user = kelas.id_user LIMIT 1) AS foto_guru
                                FROM kelas_user
                                JOIN kelas ON kelas_user.id_kelas = kelas.id_kelas
                                JOIN user ON kelas_user.id_user = user.id_user
                                WHERE kelas_user.id_user = ? AND user.role = 'murid';

                            ";
                        } else {
                            $sql = "
                                SELECT kelas.*, user.*, namauser as guru, foto as foto_guru
                                FROM kelas
                                JOIN user ON kelas.id_user = user.id_user
                                WHERE kelas.id_user = ?;
                            ";
                        }
                        

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $userId); 
                        $stmt->execute();
                        $result = $stmt->get_result();
    
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="kelas-box kategori-' . strtolower($row["kategori"]) . ' id="kelas-' . strtolower($row["kategori"]) . ' >';
                                echo '<div class="konten-kategori">';
                                echo '<div class="kategori-box">';
                                if(strtolower($row["kategori"]) == "engginer"){
                                    echo '<svg id="svg1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">';
                                    echo '<path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>';
                                    echo '</svg>';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>'; 
                                    echo '<div class="profile-engginer potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_kelas"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '  </p>';

                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="masukkelas.php" method="post">';
                                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kelas</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "dkv"){
                                    echo '<svg id="svg2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">';
                                    echo '<path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"/>';
                                    echo '</svg>';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-dkv potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_kelas"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';

                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="masukkelas.php" method="post">';
                                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kelas</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "bisnis"){
                                    echo '
                                        <svg id="svg3"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                            <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                        </svg>
                                    ';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-bisnis potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_kelas"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';
                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="masukkelas.php" method="post">';
                                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kelas</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "bahasa"){
                                    echo '
                                        <svg id="svg4"   xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                                        </svg>

                                    ';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-bahasa potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_kelas"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';
                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="masukkelas.php" method="post">';
                                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';

                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kelas</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "matematika"){
                                    echo '
                                        <svg id="svg5"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                                            <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                        </svg>';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-matematika potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_kelas"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';
                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="masukkelas.php" method="post">';
                                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kelas</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "sains"){
                                    echo '
                                        <svg id="svg6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2"><path d="M27 27V10.139A2.139 2.139 0 0 1 29.139 8h5.722A2.139 2.139 0 0 1 37 10.139V27M40.937 43l6.094 8.865a2.781 2.781 0 0 1-2.29 4.355H19.259a2.78 2.78 0 0 1-2.29-4.355L23 43.092" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M31.174 41.14a2.655 2.655 0 0 0 1.652 0l4.011 4.289A8.32 8.32 0 0 1 32 46.971a8.32 8.32 0 0 1-4.837-1.542l4.011-4.289zM25.779 39.137l-2.091.375A8.365 8.365 0 0 1 28.539 31l1.763 5.564a2.66 2.66 0 0 0-.96 1.934M34.757 33.222 35.461 31a8.365 8.365 0 0 1 4.851 8.512l-5.654-1.014a2.66 2.66 0 0 0-.96-1.934" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="45.895" cy="26.711" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="15.5" cy="33" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M32 11h.575A1.424 1.424 0 0 1 34 12.425V18" style="fill:none;stroke:#222a33;stroke-width:1.5px"/></svg>
                                    ';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-sains potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_kelas"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';
                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="masukkelas.php" method="post">';
                                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kelas</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                
                            }
                        } else {
                            echo "Belum Ada Kelas";
                        }
    
                        $conn->close();
                        ?>
                    </div>
                </div>
                <button id="nextBtns" class="nextBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                </button>
            </div>
            
        </div>
        <div class="konten-tambah" id="tambah">
            <h1>Semangat Menjelajahi Dunia Bersama</h1>
            <h1>PURE ACADEMY</h1>
            <div class="tanmbahorjoin">

                <button class="join-kelas" id="join">
                    <div class="joinKelas">
                        <svg class= "in" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                        </svg>
                        <svg class="out" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z"/>
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
                        </svg>
                    </div>
                    <p>Masuk Kelas</p>
                   
                </button>
                <button class="buat-kelas" id="buat">
                    <div class="tambah-kelas">
                        <svg class="in1" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                        <svg class="out1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                        </svg>
                    </div>
                    <p>Buat Kelas</p>
                </button>
            </div>
            <div class="joinkelass" id="joins">
                <form action="joinkelas.php" method="post">
                    <?php
                    $userId = $_SESSION['id_user'];
                    echo '<input type="hidden" name="userId" value="' . $userId . '">'; 
                    ?>

                </form>
            </div>
            
    
            <div class="buat-kelass" id="buats">
                <form action="tambahkelas.php" method="post">
                    <?php
                    $userId = $_SESSION['id_user'];
                    echo '<input type="hidden" name="userId" value="' . $userId . '">';


                    ?>
                    <input type="text" name="namakelas" id="namakelas" placeholder="Nama Kelas">
                    <input type="text" name="kode" id="kode" placeholder="Buat Kode Kelas">
                    <select id="kategori_p" name="kategori_p" class="stylkategori_p">
                        <option value="Engginer">Engginer</option>
                        <option value="Dkv">Dkv</option>  
                        <option value="Bisnis">Bisnis</option>
                        <option value="Bahasa">Bahasa</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Sains">Sains</option>
                    </select>  
    
                    <button type="submit" name="submit" id="submit">+</button>
    
                </form>
            </div>
        
        </div>

        <div class="buatkelas" id="kelasbaru">
            <form action="tambahkelas.php" method="post" class="kelaspembuat">
                <?php
                    $userId = $_SESSION['id_user'];
                    echo '<input type="hidden" name="userId" value="' . $userId . '">';


                ?>
                <input type="text" name="tambahkelas" id="tambahk" placeholder="Nama Kelas"  >
                <input type="text" name="kode" id="kode" placeholder="Buat Kode Kelas">
                <select id="kategori_p" name="kategori_p" class="stylkategori_p">
                    <option value="Engginer">Engginer</option>
                    <option value="Dkv">Dkv</option>  
                    <option value="Bisnis">Bisnis</option>
                    <option value="Bahasa">Bahasa</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Sains">Sains</option>
                </select>  

                <button type="submit" name="submit" id="submit">Submit</button>

            </form>

        </div>
        <div class="masukkelas" id="masukkelas">
            <form action="joinkelas.php" method="post" class="kelaspembuat">
                <?php
                    $userId = $_SESSION['id_user'];
                    echo '<input type="hidden" name="userId" value="' . $userId . '">';


                ?>
                <input type="text" name="kode" id="kode" placeholder="Masukkan Kode Kelas">

                <button type="submit" name="submit" id="submit">Masuk Kelas</button>

            </form>

        </div>
        <div class="gantinamauser" id="gantinama">
            <form action="gantinama.php" method="post" class="kelaspembuat">
                <p>Ganti Nama Anda</p>
                <?php
                    $userId = $_SESSION['id_user'];
                    echo '<input type="hidden" name="id_user" value="' . $userId . '">';


                ?>
                <input type="text" name="nama" id="kode" placeholder="Masukkan Nama Baru">

                <button type="submit" name="submit" id="submit">Simpan Perubahan</button>

            </form>

        </div>
        <div class="gantipass" id="gantipass">
            <form action="gantipassword.php" method="post" class="kelaspembuat">
                <p>Ganti Password</p>
                <?php
                    $userId = $_SESSION['id_user'];
                    echo '<input type="hidden" name="id_user" value="' . $userId . '">';


                ?>
                <input type="password" name="passlama" id="kode" placeholder="Masukkan Password Lama Anda" required>
                <input type="password" name="passbaru" id="passbaru" placeholder="Masukkan Password Baru" required>
                <button type="submit" name="submit" id="submit" disable>Simpan Perubahan</button>
               
               

                

            </form>

        </div>

        <div class="konten-setting" id="setting-konten">
            <div class="boxsetting">
                <div class="gantipp">
                    <div class="boxsizing">
                    <?php
                    require 'koneksi.php';
                    $userId = $_SESSION['id_user'] ;
                    $sql = "SELECT foto FROM user WHERE id_user = ?";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $userId); 
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo " <img class='boxsizing' src='picture/".$row['foto']."' alt='profile-foto'>";
                    }
                    else {
                        echo " <img src='picture/user.svg' alt='profile-foto'>";
                    }
                    ?>
                    </div>
                    <div class="uploadf">
                        <form action="upload_foto.php" method="post" enctype="multipart/form-data" class="upload-form">
                            <label for="fileToUpload" class="custom-file-upload">
                                
                                <p class="buttonfoto"> 
        
                                    Pilih Foto
                                </p>
                            </label>
                            <input type="hidden" name="userId" value="<?php echo $_SESSION['id_user']; ?>">
                            <input type="file" name="foto" id="fileToUpload" style="display: none;">
                            
                        </form>
                    </div>
                    <script>
                        document.getElementById('fileToUpload').addEventListener('change', function() {
                            if (this.files && this.files[0]) {
                                this.form.submit();
                            }
                        });
                    </script>
                    <div class="hapusfoto">

                        <form action="hapusfoto.php" method="post" enctype="multipart/form-data" class="upload-form">
                            <label for="fileToUpload" class="custom-file-upload">
                                
                                <button class="buttonfoto"> 
        
                                    Hapus Foto
                                </button>
                            </label>
                            <input type="hidden" name="userId" value="<?php echo $_SESSION['id_user']; ?>">
                            <input type="file" name="filehapus" id="fileToUpload" value="picture/User-Profile-PNG-Clipart.png" style="display: none;">
                            
                        </form>
                    </div>
                    
                </div>
                
                <div class="ubahsetting">
                    <div class="propillll">

                    <h5>Ubah Profile</h5>
                    <?php
                    require 'koneksi.php';

                        $userId = $_SESSION['id_user'] ;

                        $sql = "SELECT * FROM user WHERE id_user = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $namauser = $row['namauser'];
                        $emailuser = $row['email'];
                        



                    ?>
                    </div><br><br>
                    <div class="gantisetting">

                        <h4>Nama</h4>
                        <p><?php echo ucfirst(htmlspecialchars($namauser)) ?></p>
                        <button id="buttongantinama">Ubah</button>
              
                    </div>

                   
                    <br>
                        <form action="verifgantiemail.php" method="post" class="gantisetting" id="gantimail">
                            <h4>Email</h4>
                            <p><?php echo ucfirst(htmlspecialchars($emailuser)) ?></p>
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                            <input type="hidden" name="namauser" value="<?php echo $_SESSION['namauser']; ?>">
                            <button>Ubah</button>
                        </form>
                    
               
                    <div class="gantip">

                        <button class="buttonfoto" id="buttongantipass">
                            
                            <p > 
    
                                Ganti Password
                            </p>
                            
                        </button>
                    </div>
                    <div class="hapus">

                        <form action="hapusakun.php" method="post">
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                            <button class="buttonfoto">
                                
                                <p> 
                                    
                                    Hapus Akun
                                </p>
                                
                            </button>
                        </form>
                    </div>
    
                </div>
            </div>

        </div>

        <div class="konten-streak" id="ulasan-konten">


        <div class="review-container">
            <div class="review-header">
                <?php
                require 'koneksi.php';

                $userId = $_SESSION['id_user'] ;
                $fotosql = "SELECT foto, namauser FROM user WHERE id_user = ?";
                $stmt = $conn->prepare($fotosql);
                $stmt->bind_param("i", $userId);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $profile_img = 'picture/'.$row['foto'];
                $nama = $row['namauser'];

                ?>
                <img src="<?php echo $profile_img ?>" alt="Profile Picture" class="profile-pic">
                <div class="user-info">
                    <p class="username"><?php echo $nama ; ?></p>
                    <p class="review-text">Ulasan bersifat publik serta menyertakan info akun dan perangkat Anda. Pelajari lebih lanjut</p>
                </div>
            </div>
            <form class="form" action="tambahulasan.php" method="post">
                <div class="star-rating">
                    <span data-value="1">&#9733;</span>
                    <span data-value="2">&#9733;</span>
                    <span data-value="3">&#9733;</span>
                    <span data-value="4">&#9733;</span>
                    <span data-value="5">&#9733;</span>
                </div>
                <input type="hidden" name="rating" id="rating-value" required>
                <div class="right-image">
                    <img src="image/gambar3.png" alt="Illustration" class="illustration">
                </div>
                <div class="review-input">
                    <div class="input-container">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">
                        <input type="text" name="pesan" placeholder="Ketik ulasan" class="input-field" required>
                        <button type="submit" name="submit-btn" class="send-button"><i class="bi bi-send"></i></button>
                    </div>
                </div>
            </form>
            <p class="copyright">©Copyright Pure Academy 2024</p>
        </div>

            <script>
                const stars = document.querySelectorAll('.star-rating span');
                const ratingValue = document.getElementById('rating-value');
                let selectedRating = 0;

                stars.forEach(star => {
                    star.addEventListener('click', () => {
                        selectedRating = star.getAttribute('data-value');
                        ratingValue.value = selectedRating;
                        updateStars(selectedRating);
                    });
                });

                function updateStars(rating) {
                    stars.forEach(star => {
                        if (star.getAttribute('data-value') <= rating) {
                            star.classList.add('selected');
                        } else {
                            star.classList.remove('selected');
                        }
                    });
                }
            </script>
        </div>

        <div class="profile" id="prof">

            <div class="notifikasi" id="notifikasi">
                
                <div class="notif-setting">
                    <button class="notif" id="notifs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
                        </svg>
                    </button>
                    <button class="settingan" id="settingan">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                          </svg>
                    </button>
                </div>
            </div>  
            <div class="box-profile" id="box-profile">
                
                <div class="foto-profile">
                    <div class="img-profile">
                        <?php
                        require 'koneksi.php';

                        $userId = $_SESSION['id_user'] ;

                        $sql = "SELECT foto FROM user WHERE id_user = ?";


                    

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $userId); 
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo " <img src='picture/".$row['foto']."' alt='profile-foto'>";
                        }
                        else {
                            echo " <img src='picture/user.svg' alt='profile-foto'>";
                        }



                        ?>
                    </div>
                </div>
                <div class="textpro">
                    <?php
                    require 'koneksi.php';

                        $userId = $_SESSION['id_user'] ;

                        $sql = "SELECT namauser FROM user WHERE id_user = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo '<h3>' . ucfirst(htmlspecialchars($row['namauser'])) . '</h3>';
                        } else {
                            echo '<h3>User not found</h3>';
                        }



                    ?>
                    
                </div>

                <div class="line-prof"></div>
                
                <aside class="daftarkuis">
                    
                    <h2>Daftar Kuis Kamu</h2>

                    <?php
                        require 'koneksi.php';

                        $userId = $_SESSION['id_user'];
                        
                        $sqlRole = "SELECT role FROM user WHERE id_user = ?";
                        $stmtRole = $conn->prepare($sqlRole);
                        $stmtRole->bind_param("i", $userId);
                        $stmtRole->execute();
                        $resultRole = $stmtRole->get_result();
                        $roleRow = $resultRole->fetch_assoc();
                        $role = $roleRow['role'];
                        
                        
                        if ($role === 'murid') {
                            
                            $sql = "
                               SELECT 
                                    quiz.*, 
                                    kelas.*, 
                                    kelas_user.*, 
                                    guru.namauser AS guru, 
                                    guru.foto AS foto_guru
                                FROM 
                                    quiz
                                JOIN 
                                    kelas ON quiz.id_kelas = kelas.id_kelas
                                JOIN 
                                    kelas_user ON kelas_user.id_kelas = kelas.id_kelas
                                JOIN 
                                    user AS murid ON kelas_user.id_user = murid.id_user
                                LEFT JOIN 
                                    user AS guru ON kelas.id_user = guru.id_user
                                WHERE 
                                    murid.id_user = ? 
                                    AND murid.role = 'murid';


                            ";
                        } else {
                            $sql = "
                            SELECT 
                                kelas.*,                  
                                quiz.*,                   
                                guru.namauser AS guru,
                                guru.foto AS foto_guru      
                            FROM 
                                quiz
                            JOIN 
                                kelas ON quiz.id_kelas = kelas.id_kelas 
                            JOIN 
                                user AS guru ON kelas.id_user = guru.id_user  
                            WHERE 
                                guru.id_user = ?            
                                AND guru.role = 'guru';     




                            ";
                        }
                        

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $userId); 
                        $stmt->execute();
                        $result = $stmt->get_result();
    
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="jarakdaftarkuis kelas-box kategori-' . strtolower($row["kategori"]) . ' id="kelas-' . strtolower($row["kategori"]) . ' >';
                                echo '<div class="konten-kategori">';
                                echo '<div class="kategori-box">';
                                if(strtolower($row["kategori"]) == "engginer"){
                                    echo '<svg id="svg1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">';
                                    echo '<path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>';
                                    echo '</svg>';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>'; 
                                    echo '<div class="profile-engginer potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_quiz"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '  </p>';

                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="quiz.php" method="post">';
                                    $id_quiz = $row['id_quiz'];
                                    echo '<input type="hidden" name="id_quiz" value="' . $id_quiz . '">';
                                    echo '<input type="hidden" name="id_user" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kuis</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "dkv"){
                                    echo '<svg id="svg2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">';
                                    echo '<path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"/>';
                                    echo '</svg>';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-dkv potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_quiz"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';

                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="quiz.php" method="post">';
                                    $id_quiz = $row['id_quiz'];
                                    echo '<input type="hidden" name="id_quiz" value="' . $id_quiz . '">';
                                    echo '<input type="hidden" name="id_user" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kuis</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "bisnis"){
                                    echo '
                                        <svg id="svg3"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                            <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                        </svg>
                                    ';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-bisnis potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_quiz"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';
                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="quiz.php" method="post">';
                                    $id_quiz = $row['id_quiz'];
                                    echo '<input type="hidden" name="id_quiz" value="' . $id_quiz . '">';
                                    echo '<input type="hidden" name="id_user" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kuis</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "bahasa"){
                                    echo '
                                        <svg id="svg4"   xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                                        </svg>

                                    ';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-bahasa potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_kelas"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';
                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="quiz.php" method="post">';
                                    $id_quiz = $row['id_quiz'];
                                    echo '<input type="hidden" name="id_quiz" value="' . $id_quiz . '">';
                                    echo '<input type="hidden" name="id_user" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';

                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kuis</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "matematika"){
                                    echo '
                                        <svg id="svg5"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                                            <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                        </svg>';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-matematika potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_quiz"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';
                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="quiz.php" method="post">';
                                    $id_quiz = $row['id_quiz'];
                                    echo '<input type="hidden" name="id_quiz" value="' . $id_quiz . '">';
                                    echo '<input type="hidden" name="id_user" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kuis</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }else if(strtolower($row["kategori"]) == "sains"){
                                    echo '
                                        <svg id="svg6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2"><path d="M27 27V10.139A2.139 2.139 0 0 1 29.139 8h5.722A2.139 2.139 0 0 1 37 10.139V27M40.937 43l6.094 8.865a2.781 2.781 0 0 1-2.29 4.355H19.259a2.78 2.78 0 0 1-2.29-4.355L23 43.092" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M31.174 41.14a2.655 2.655 0 0 0 1.652 0l4.011 4.289A8.32 8.32 0 0 1 32 46.971a8.32 8.32 0 0 1-4.837-1.542l4.011-4.289zM25.779 39.137l-2.091.375A8.365 8.365 0 0 1 28.539 31l1.763 5.564a2.66 2.66 0 0 0-.96 1.934M34.757 33.222 35.461 31a8.365 8.365 0 0 1 4.851 8.512l-5.654-1.014a2.66 2.66 0 0 0-.96-1.934" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="45.895" cy="26.711" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="15.5" cy="33" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M32 11h.575A1.424 1.424 0 0 1 34 12.425V18" style="fill:none;stroke:#222a33;stroke-width:1.5px"/></svg>
                                    ';
                                    echo '</div>';
                                    echo '<p>' . strtolower($row["kategori"])  . '</p>';
                                    echo '<div class="profile-sains potoguru"><img class="profile-image-guru" src="picture/'.$row['foto_guru'].'" alt="profile-foto"></div>';
                                    echo '</div>';
                                    echo '<div class="judul-kelas">';
                                    echo '<p>' . strtolower($row["nama_quiz"]) . '</p>';
                                    echo '</div>';
                                    echo '<div class="lihat-kelas">';
                                    echo '<p>Dibuat Oleh :' . strtolower($row["guru"]) . '</p>';
                                    $id_kelas = $row['id_kelas'];
                                    echo '<form action="quiz.php" method="post">';
                                    $id_quiz = $row['id_quiz'];
                                    echo '<input type="hidden" name="id_quiz" value="' . $id_quiz . '">';
                                    echo '<input type="hidden" name="id_user" value="' . $userId . '">';
                                    echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                    echo '<button class="lihat">';
                                    echo '<p>Lihat Kuis</p>';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-down-right" viewBox="0 0 16 16">';
                                    echo '<path fill-rule="evenodd" d="M6.364 2.5a.5.5 0 0 1 .5-.5H13.5A1.5 1.5 0 0 1 15 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 2 13.5V6.864a.5.5 0 1 1 1 0V13.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H6.864a.5.5 0 0 1-.5-.5"/>';
                                    echo '<path fill-rule="evenodd" d="M11 10.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L1.146 1.854a.5.5 0 1 1 .708-.708L10 9.293V5.5a.5.5 0 0 1 1 0z"/>';
                                    echo '</svg>';
                                    echo '</button>';
                                    echo '</form>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                                
                            }
                        } else {
                            echo "Belum Ada Kelas";
                        }
    
                        $conn->close();
                        ?>
                </aside>
               
            </div>

        </div>
        
       
        
    </div>

    


    <script src="script/scripts.js"></script>
</body>
</html>