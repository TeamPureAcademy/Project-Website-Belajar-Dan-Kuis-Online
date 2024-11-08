<?php


$id_kelas = $_POST['id_kelas'];
$userId = $_POST['id'] ;

if(empty($_POST['id_kelas'])) {
    header("Location: koridorpage.php");
    exit();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure Academy</title>
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="style/responsivekelas.css">
    <link rel="stylesheet" href="style/responsivemasukkelas.css">
  <link rel="stylesheet" href="style/navbar.css">
  
    

</head>
<body> 
    <nav class="navbar">
        <ul class="list-navbar">
            <li >
                <form action=""><button class="kembalikesebelumnya">
                    <svg  id='Reply_All_Arrow_24' width='30' height='30' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                        <g transform="matrix(0.77 0 0 0.77 12 12)" >
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-14.99, -15.5)" d="M 8 6 C 7.722919966188732 6.000337773826128 7.4584001349509315 6.1156231559820355 7.2695312 6.3183594 L 2.3808594 11.205078 C 2.132518321721257 11.394520683571358 1.9869474488697152 11.689111906521271 1.987330693802456 12.001460549295155 C 1.9877139387351965 12.313809192069039 2.134007286128719 12.608042304023291 2.3828125 12.796875 L 7.2695312 17.681641 L 7.2714844 17.683594 C 7.460228702677729 17.885113803937276 7.723894033565336 17.999627882544274 8 18 C 8.552284749830793 18 9 17.552284749830793 9 17 L 9 13.414062 L 13.271484 17.683594 C 13.460228397825487 17.885113905226618 13.72389389444672 17.99962799293909 14 18 C 14.552284749830793 18 15 17.552284749830793 15 17 L 15 13 L 21 13 C 23.773666 13 26 15.226334 26 18 C 26 20.773666 23.773666 23 21 23 L 18 23 C 17.639364083422432 22.994899710454515 17.303918635428392 23.184375296169332 17.122112278513484 23.49587284971433 C 16.940305921598572 23.80737040325933 16.940305921598572 24.192629596740673 17.122112278513484 24.50412715028567 C 17.303918635428396 24.815624703830668 17.639364083422432 25.005100289545485 18 25 L 21 25 C 24.71951 25 27.714334 22.049648 27.923828 18.380859 C 27.973863472952722 18.260103611663325 27.999742078288303 18.130710924724504 28 18 C 28 14.145666 24.854334 11 21 11 L 15 11 L 15 7 C 15 6.447715250169207 14.552284749830793 6 14 6 C 13.72291989661236 6.0003377184318 13.458399982398523 6.115623105186295 13.269531 6.3183594 L 9 10.585938 L 9 7 C 9 6.447715250169207 8.552284749830793 6 8 6 z" stroke-linecap="round" />
                        </g>
                    </svg>
                </button></form>
            </li>
            <li>
                <form action=""><button class="logo-navbar">
                    <img src="image/Recovered_PURE ACADEMY blues.png" alt="Logo">
                </button></form>
            </li>
            <li>
                <form action=""><button>
                    <P class="nama-web">Pure Academy </P>
                </button></form>
            </li>
            <li>
                <form action=""><button>
                    <P>|</P>
                </button></form>
            </li>
            <li>
                <form action="masukkelas.php" method="post"><button>
                    <?php
                    require 'koneksi.php';

                    $sqlKelas = "SELECT nama_kelas FROM kelas WHERE id_kelas = ?";
                    $stmtKelas = $conn->prepare($sqlKelas);
                    $stmtKelas->bind_param("i", $id_kelas);
                    $stmtKelas->execute();
                    $resultKelas = $stmtKelas->get_result();
                    $kelasRow = $resultKelas->fetch_assoc();
                    $namaKelas = $kelasRow['nama_kelas'];
                    ?>
                    <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                    <input type="hidden" name="id" value="<?php echo $userId; ?>">
                    <P class="namaKelas"><?php echo ucfirst(strtolower($namaKelas)); ?></P>
                </button></form>
            </li>
        </ul>
        <div class="profile-navbar">
            <?php
            require 'koneksi.php';

            $sqlProfile = "SELECT foto FROM user WHERE id_user = ?";
            $stmtProfile = $conn->prepare($sqlProfile);
            $stmtProfile->bind_param("i", $userId);
            $stmtProfile->execute();
            $resultProfile = $stmtProfile->get_result();
            $profileRow = $resultProfile->fetch_assoc();
            $foto = $profileRow['foto'];
            ?>
            <img src="picture/<?php echo $foto; ?>" alt="profil-user">
        </div>
    </nav>
    <div class="container-dalamKelas">
    <aside class="sidebarkelas">
        <div class="beranda-koridor">
            
            <div class="kelasAnda">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mortarboard-fill" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466z"/>
                </svg>
                <p>Kelas Anda</p>
                
            
            </div>
        </div>
        <div class="kelasmuu">

            <?php
            require 'koneksi.php';

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
                while ($row = $result->fetch_assoc()) {
                    $additionalClass = ($row['id_kelas'] == $id_kelas) ? ' kelas-side-klik' : '';
                    echo '<form action="masukkelas.php" method="post">';
                    echo '<button class="kelas-side koridor-' . strtolower($row['kategori']) . $additionalClass . '">';
                    echo '<input type="hidden" name="id_kelas" value="' . $row['id_kelas'] . '">';
                    echo '<input type="hidden" name="id" value="' . $userId . '">';
                    echo '<div class="icon-kelasS">';   
                    switch (strtolower($row['kategori'])) {
                        case 'engginer':
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
                                    <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>
                                  </svg>';
                            break;
                        case 'sains':
                            echo '<svg id="svg6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2">
                                    <path d="M27 27V10.139A2.139 2.139 0 0 1 29.139 8h5.722A2.139 2.139 0 0 1 37 10.139V27M40.937 43l6.094 8.865a2.781 2.781 0 0 1-2.29 4.355H19.259a2.78 2.78 0 0 1-2.29-4.355L23 43.092" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>
                                    <path d="M31.174 41.14a2.655 2.655 0 0 0 1.652 0l4.011 4.289A8.32 8.32 0 0 1 32 46.971a8.32 8.32 0 0 1-4.837-1.542l4.011-4.289zM25.779 39.137l-2.091.375A8.365 8.365 0 0 1 28.539 31l1.763 5.564a2.66 2.66 0 0 0-.96 1.934M34.757 33.222 35.461 31a8.365 8.365 0 0 1 4.851 8.512l-5.654-1.014a2.66 2.66 0 0 0-.96-1.934" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>
                                    <circle cx="45.895" cy="26.711" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>
                                    <circle cx="15.5" cy="33" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>
                                    <path d="M32 11h.575A1.424 1.424 0 0 1 34 12.425V18" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>
                                  </svg>';
                            break;
                        case 'dkv':
                            echo '<svg id="svg2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                                    <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"/>
                                  </svg>';
                            break;
                        case 'bisnis':
                            echo '<svg id="svg3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                  </svg>';
                            break;
                        case 'matematika':
                            echo '<svg id="svg5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                                    <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                  </svg>';
                            break;
                        case 'bahasa':
                            echo '<svg id="svg4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                                    <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                                    <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                                  </svg>';
                            break;
                    }
                    echo '</div>';
                    echo '<p class="kelas-side-text">' . $row['nama_kelas'] . '</p>';
                    echo '</button>';
                    echo '</form>';
                }
            }
            ?>
            <!-- <div class="kelas-side koridor-engginer">
                <div class="icon-kelasS">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
                        <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>
                    </svg>
                </div>
                <p class="kelas-side-text">dwaww</p>
            </div>
            <div class="kelas-side koridor-sains">
                <div class="icon-kelasS">
                    <svg id="svg6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2"><path d="M27 27V10.139A2.139 2.139 0 0 1 29.139 8h5.722A2.139 2.139 0 0 1 37 10.139V27M40.937 43l6.094 8.865a2.781 2.781 0 0 1-2.29 4.355H19.259a2.78 2.78 0 0 1-2.29-4.355L23 43.092" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M31.174 41.14a2.655 2.655 0 0 0 1.652 0l4.011 4.289A8.32 8.32 0 0 1 32 46.971a8.32 8.32 0 0 1-4.837-1.542l4.011-4.289zM25.779 39.137l-2.091.375A8.365 8.365 0 0 1 28.539 31l1.763 5.564a2.66 2.66 0 0 0-.96 1.934M34.757 33.222 35.461 31a8.365 8.365 0 0 1 4.851 8.512l-5.654-1.014a2.66 2.66 0 0 0-.96-1.934" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="45.895" cy="26.711" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="15.5" cy="33" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M32 11h.575A1.424 1.424 0 0 1 34 12.425V18" style="fill:none;stroke:#222a33;stroke-width:1.5px"/></svg>
                </div>
                <p class="kelas-side-text">dwaww</p>
            </div>
            <div class="kelas-side koridor-dkv">
                <div class="icon-kelasS">
                    <svg id="svg2"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                        <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"/>
                    </svg>
                </div>
                <p class="kelas-side-text">daawawdawdawdda</p>
            </div>
            <div class="kelas-side koridor-bisnis">
                <div class="icon-kelasS">
                    <svg id="svg3"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                        <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                    </svg>
                </div>
                <p class="kelas-side-text">daawawdawdawdda</p>
            </div>
            <div class="kelas-side koridor-matematika">
                <div class="icon-kelasS">
                    <svg id="svg5"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                        <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                        <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
                <p class="kelas-side-text">daawawdawdawdda</p>
            </div>
            
            <div class="kelas-side koridor-bahasa">
                <div class="icon-kelasS">
                    <svg id="svg4"   xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                        <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                        <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                    </svg>
                </div>
                <p class="kelas-side-text">daawawdawdawdda</p>  -->
            
        </div>
        
       </aside>
        <!-- KORIDOR KELAS -->
        <div class="koridorkelas">
            <!-- ENGGINER -->
            <!-- <div class="koridor-kelas koridor-engginer">
                <div class="genre-kelas">
                    <div class="icongenre">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">
                            <path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>
                        </svg>
                    </div>
                    <h1>Engginer</h1>
                </div>
                <div class="koridor-info">

                    <h2>Kelas - Web</h1> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>    
                </div>
            </div> -->
            <!-- DKV -->
            <!-- <div class="koridor-kelas koridor-dkv">
                <div class="genre-kelas">
                    <div class="icongenre">
                        <svg id="svg2"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
                            <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"/>
                        </svg>
                    </div>
                    <h1>Dkv</h1>
                </div>
                <div class="koridor-info">

                    <h2>Kelas - Visual</h1> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>    
                </div>
            </div> -->
            <!-- BISNIS -->
            <!-- <div class="koridor-kelas koridor-bisnis">
                <div class="genre-kelas">
                    <div class="icongenre">
                        <svg id="svg3"  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                            <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                        </svg>
                    </div>
                    <h1>Dkv</h1>
                </div>
                <div class="koridor-info">

                    <h2>Kelas - Visual</h1> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>    
                </div>
            </div> -->
            <!-- BHASA -->
            <!-- <div class="koridor-kelas koridor-bahasa">
                <div class="genre-kelas">
                    <div class="icongenre">
                        <svg id="svg4"   xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                        </svg>
                    </div>
                    <h1>Bahasa</h1>
                </div>
                <div class="koridor-info">

                    <h2>Kelas - B inngris</h1> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>    
                </div>
            </div> -->
            <!-- <div class="koridor-kelas koridor-matematika">
                <div class="genre-kelas">
                    <div class="icongenre">
                        <svg id="svg5"  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </div>
                    <h1>Bahasa</h1>
                </div>
                <div class="koridor-info">

                    <h2>Kelas - B inngris</h1> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>    
                </div>
            </div> -->

            <?php

            require 'koneksi.php';
            $sql = "SELECT * FROM kelas WHERE id_kelas = $id_kelas";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            echo '<div class="koridor-kelas koridor-'. strtolower($row["kategori"])  .'">';
            echo '<div class="genre-kelas">';
            echo '<div class="icongenre">';
            if(strtolower($row["kategori"]) == "sains"){

                echo '<svg id="svg6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2">';
                echo '<path d="M27 27V10.139A2.139 2.139 0 0 1 29.139 8h5.722A2.139 2.139 0 0 1 37 10.139V27M40.937 43l6.094 8.865a2.781 2.781 0 0 1-2.29 4.355H19.259a2.78 2.78 0 0 1-2.29-4.355L23 43.092" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>';
                echo '<path d="M31.174 41.14a2.655 2.655 0 0 0 1.652 0l4.011 4.289A8.32 8.32 0 0 1 32 46.971a8.32 8.32 0 0 1-4.837-1.542l4.011-4.289zM25.779 39.137l-2.091.375A8.365 8.365 0 0 1 28.539 31l1.763 5.564a2.66 2.66 0 0 0-.96 1.934M34.757 33.222 35.461 31a8.365 8.365 0 0 1 4.851 8.512l-5.654-1.014a2.66 2.66 0 0 0-.96-1.934" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>';
                echo '<circle cx="45.895" cy="26.711" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>';
                echo '<circle cx="15.5" cy="33" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/>';
                echo '<path d="M32 11h.575A1.424 1.424 0 0 1 34 12.425V18" style="fill:none;stroke:#222a33;stroke-width:1.5px"/></svg>';
            }else if(strtolower($row["kategori"]) == "matematika"){
                echo '<svg id="svg5"  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">';
                echo '<path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>';
                echo '<path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>';
                echo '</svg>';
            }else if(strtolower($row["kategori"]) == "bahasa"){
                echo '<svg id="svg4" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">';
                echo '<path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>';
                echo '<path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>';
                echo '</svg>';
            }else if(strtolower($row["kategori"]) == "bisnis"){
                echo '<svg id="svg3"  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">';
                echo '<path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>';
                echo '<path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>';
                echo '</svg>';
            }
            else if(strtolower($row["kategori"]) == "dkv"){
                echo '<svg id="svg2" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">';
                echo '<path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm4 0v6h8V1zm8 8H4v6h8zM1 1v2h2V1zm2 3H1v2h2zM1 7v2h2V7zm2 3H1v2h2zm-2 3v2h2v-2zM15 1h-2v2h2zm-2 3v2h2V4zm2 3h-2v2h2zm-2 3v2h2v-2zm2 3h-2v2h2z"/>';
                echo '</svg>';
            }else if(strtolower($row["kategori"]) == "engginer"){
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pc-display" viewBox="0 0 16 16">';
                echo '<path d="M8 1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1zm1 13.5a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0m2 0a.5.5 0 1 0 1 0 .5.5 0 0 0-1 0M9.5 1a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM9 3.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1h-5a.5.5 0 0 0-.5.5M1.5 2A1.5 1.5 0 0 0 0 3.5v7A1.5 1.5 0 0 0 1.5 12H6v2h-.5a.5.5 0 0 0 0 1H7v-4H1.5a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5H7V2z"/>';
                echo '</svg>';
            }
            echo '</div>';
            echo '<h1>'. ucfirst(strtolower($row["kategori"])) .'</h1>';
            echo '</div>';
            echo '<div class="koridor-info">';
            echo '<h2>Kelas - '. ucfirst(strtolower($row["nama_kelas"])) .'</h2>';
            echo '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">';
            echo '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>';
            echo '</svg>';
            echo '</div>';
            echo '</div>';
            ?>
                <!-- <div class="genre-kelas">
                    
                    <div class="icongenre">
                        <svg id="svg6"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:2"><path d="M27 27V10.139A2.139 2.139 0 0 1 29.139 8h5.722A2.139 2.139 0 0 1 37 10.139V27M40.937 43l6.094 8.865a2.781 2.781 0 0 1-2.29 4.355H19.259a2.78 2.78 0 0 1-2.29-4.355L23 43.092" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M31.174 41.14a2.655 2.655 0 0 0 1.652 0l4.011 4.289A8.32 8.32 0 0 1 32 46.971a8.32 8.32 0 0 1-4.837-1.542l4.011-4.289zM25.779 39.137l-2.091.375A8.365 8.365 0 0 1 28.539 31l1.763 5.564a2.66 2.66 0 0 0-.96 1.934M34.757 33.222 35.461 31a8.365 8.365 0 0 1 4.851 8.512l-5.654-1.014a2.66 2.66 0 0 0-.96-1.934" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="45.895" cy="26.711" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><circle cx="15.5" cy="33" r="2" style="fill:none;stroke:#222a33;stroke-width:1.5px"/><path d="M32 11h.575A1.424 1.424 0 0 1 34 12.425V18" style="fill:none;stroke:#222a33;stroke-width:1.5px"/></svg>
                    </div>
                    <h1>Bahasa</h1>
                </div>
                <div class="koridor-info">

                    <h2>Kelas - B inngris</h1> 
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>    
                </div>
            </div> -->

            

            
            <div class="konten-koridor">
                <div class="konten-quiz">
                    <div class="textdaftarquiz">
                        
                        <p>Daftar Kuis Kamu</p>
                    </div>
                    <div class="listkuis">

                        <?php
                        $sql = "SELECT * FROM quiz WHERE id_kelas = $id_kelas";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<form class="listingkuis" action="quiz.php" method="post">';
                                echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
                                echo '<input type="hidden" name="id_user" value="' . $userId . '">';
                                echo '<input type="hidden" name="id_quiz" value="' . $row['id_quiz'] . '">';
                                echo '<button class="quiz-button">' . $row['nama_quiz'] . '</button>';
                                echo '</form>';
                            }
                        } else {
                            echo '<p>Belum ada quiz yang tersedia.</p>';
                        }


                        ?>
                        
                    </div>
                </div>
                <div  class="dalamkelas">
                   
                <?php
                require 'koneksi.php';

                $sql = "
                    (SELECT id_modul AS id, judul_modul AS nama, 'modul' AS type
                    FROM modul
                    WHERE id_kelas = '$id_kelas')
                    UNION
                    (SELECT id_quiz AS id, nama_quiz AS nama, 'quiz' AS type
                    FROM quiz
                    WHERE id_kelas = '$id_kelas')
                ";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['type'] == 'modul') {
                            echo '<form action="modul.php" class="modul-guru" method="post">';
                            echo ' <input type="hidden" name="id_kelas" value="'.$id_kelas.'">';
                            echo ' <input type="hidden" name="id_user" value="'.$userId.'">';
                            echo ' <input type="hidden" name="id_modul" value="'.$row['id'].'">';
                            echo '<button class="modul">';
                            echo '<div class="boder-modul">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">';
                            echo '<path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/></svg>';
                            echo '</div>';
                            echo '<h1>- ' . $row['nama'] . '</h1>';
                            echo '</button>';
                            echo '</form>';
                        } elseif ($row['type'] == 'quiz') {
                            echo '<form action="quiz.php" class="modul-guru" method="post">';
                            echo ' <input type="hidden" name="id_kelas" value="'.$id_kelas.'">';
                            echo ' <input type="hidden" name="id_user" value="'.$userId.'">';
                            echo ' <input type="hidden" name="id_quiz" value="'.$row['id'].'">';
                            echo '<button class="modul">';
                            echo '<div class="boder-modul">';
                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">';
                            echo '<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>';
                            echo '<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/></svg>';
                            echo '</div>';
                            echo '<h1>- ' . $row['nama'] . '</h1>';
                            echo '</button>';
                            echo '</form>';
                        }
                    }
                } else {
                    echo '<P>Belum Ada Modul atau Quiz yang Dibuat</p>';
                }

                mysqli_close($conn);
                ?>

                
            
            
                </div>
    
                
            </div>
            
            <?php
            require 'koneksi.php';

            

            $sql = "SELECT role FROM user WHERE id_user = ?";


            

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $userId); 
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['role'] == 'guru') {
                    echo '<div class="tambahmoduls" id="tambahqm">';
                    echo '    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">';
                    echo '        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>';
                    echo '    </svg>';
                    echo '</div>';
                }
            }
            else {
               
            }



            ?>
            
            
        </div>
    </div>
    <div class="warn" id="kontenqm">
        <div class="konten-qm">
            <h3>Tambah Modul Dan Kuis</h3>
            <div class="tambahanqm" id="tambahanqm" style="display: flex; flex-direction: column; gap: 10px; max-width: 300px; margin: auto;">
                <form action="tambahquiz.php" class="tambahanq" id="tambahanq" method="post">
                    <?php
                    echo ' <input type="hidden" name="id_kelas" value="'.$id_kelas.'">';
                    echo ' <input type="hidden" name="id_user" value="'.$userId.'">';

                    ?>

                    <label for="quiz" style="font-weight: bold;">Masukkan Nama Quiz:</label>
                    <input type="text" name="quiz" id="quiz" placeholder="Masukkan Nama Quiz" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    
                    <label for="jumlahnilai" style="font-weight: bold;">Masukkan Nilai Maksimal:</label>
                    <input type="number" name="jumlahnilai" id="jumlahnilai" placeholder="Masukkan Nilai Maksimal" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    
                    <button type="submit" style="padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
                </form>
                <form action="tambahmodul.php" class="tambahanm" id="tambahanm" method="post" enctype="multipart/form-data"> 
                    <?php
                    echo ' <input type="hidden" name="id_kelas" value="'.$id_kelas.'">';
                    echo ' <input type="hidden" name="id_user" value="'.$userId.'">';

                    ?>
                    <label for="Modul" style="font-weight: bold; margin-bottom: 5px;">Masukkan Nama Modul:</label>
                    <input type="text" name="modul" id="Modul" placeholder="Masukkan Nama Modul" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 15px; ">
                    
                    <label for="filemodul" style="font-weight: bold; margin-bottom: 5px;">Upload File Modul:</label>
                    <input type="file" name="filemodul" id="filemodul" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 15px;">
                    
                    <button type="submit" style="padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
                </from>

            </div>
            <div class="qmkonten" id="qmkonten">

                <div class="tombol-q" id="tombolq">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                    <p>Tambah Quiz</p>
                </div>
                <div class="tombol-m" id="tombolm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                    </svg>
                    <p>Tambah Modul</p>
                </div>
            </div>
        </div>
    </div>

    <script src="script/masukkelas.js" ></script>

</body>
</html>
