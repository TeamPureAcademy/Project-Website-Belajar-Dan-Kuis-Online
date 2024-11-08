<?php

if (!isset($_POST['id_user'])) {
    header("Location: koridorpage.php");
    exit();
}

$id_kelas = $_POST['id_kelas'];
$userId = $_POST['id_user'];
$idquiz = $_POST['id_quiz'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pure - Lihat Nilai</title>
    <link rel="stylesheet" href="style/lihatnilai.css">
    <link rel="stylesheet" href="style/responsivelihatnilai.css">
</head>
<body>
    <style>
        body {
        display: flex;
        flex-direction: column;
        width: 100%;
        height: 100vh;
        padding: 0px;
        margin: 0px;
        font-family: 'Roboto', sans-serif;
    }

    .navbar {
        display: flex;
        width: 100%;
        border-bottom: 1px solid lightgray;
        box-shadow: 0 4px 2px -2px lightgray;
        background-color: white;
        height: 100px;
        align-items: center; 
        justify-content: space-between;
    }

    .list-navbar {
        list-style: none;
        display: flex; 
        padding: 0;
        margin: 0;
        justify-content: center;
        align-items: center;
        
    }

    .list-navbar li {
        margin-left: 30px;
    }

    .list-navbar button{
        border: none;
        background-color: white;
    }

    .logo-navbar{
        width: 50px;
        height: 50px;
        border-radius: 50%;
        
    }

    .logo-navbar img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Ensures the image fits within the container while maintaining its aspect ratio */
    }

    .list-navbar p {
        font-size: 20px;
        font-weight: bold;
        color: #000000;
        margin: 0;
    }

    .profile-navbar {
        margin-right: 30px;
        height: 50px;
        width: 50px;
        border-radius: 50%;
        overflow: hidden; 
    }

    .profile-navbar img {
        width: 100%;
        height: 100%;
        object-fit: cover; 
    }

    .nama-web:hover {
        color: #5e6fe0;
        text-decoration: underline;
        cursor: pointer;
    }
    .namaKelas:hover {
        color: #5e6fe0;
        text-decoration: underline;
        cursor: pointer;
    }

    .kembalikesebelumnya:hover {
        fill: #5e6fe0;
        border-radius: 50%;
        background-color: #c8c7c7;
    }

    .jenis{
        width: 100px;
    }
    </style>
    <nav class="navbar">
        <ul class="list-navbar">
            <li >
                <form action="masukkelas.php" method="post">
                    <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                    <input type="hidden" name="id" value="<?php echo $userId; ?>">
                    <button class="kembalikesebelumnya">
                    <svg id='Reply_All_Arrow_24' width='30' height='30' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                        <g transform="matrix(0.77 0 0 0.77 12 12)" >
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-14.99, -15.5)" d="M 8 6 C 7.722919966188732 6.000337773826128 7.4584001349509315 6.1156231559820355 7.2695312 6.3183594 L 2.3808594 11.205078 C 2.132518321721257 11.394520683571358 1.9869474488697152 11.689111906521271 1.987330693802456 12.001460549295155 C 1.9877139387351965 12.313809192069039 2.134007286128719 12.608042304023291 2.3828125 12.796875 L 7.2695312 17.681641 L 7.2714844 17.683594 C 7.460228702677729 17.885113803937276 7.723894033565336 17.999627882544274 8 18 C 8.552284749830793 18 9 17.552284749830793 9 17 L 9 13.414062 L 13.271484 17.683594 C 13.460228397825487 17.885113905226618 13.72389389444672 17.99962799293909 14 18 C 14.552284749830793 18 15 17.552284749830793 15 17 L 15 13 L 21 13 C 23.773666 13 26 15.226334 26 18 C 26 20.773666 23.773666 23 21 23 L 18 23 C 17.639364083422432 22.994899710454515 17.303918635428392 23.184375296169332 17.122112278513484 23.49587284971433 C 16.940305921598572 23.80737040325933 16.940305921598572 24.192629596740673 17.122112278513484 24.50412715028567 C 17.303918635428396 24.815624703830668 17.639364083422432 25.005100289545485 18 25 L 21 25 C 24.71951 25 27.714334 22.049648 27.923828 18.380859 C 27.973863472952722 18.260103611663325 27.999742078288303 18.130710924724504 28 18 C 28 14.145666 24.854334 11 21 11 L 15 11 L 15 7 C 15 6.447715250169207 14.552284749830793 6 14 6 C 13.72291989661236 6.0003377184318 13.458399982398523 6.115623105186295 13.269531 6.3183594 L 9 10.585938 L 9 7 C 9 6.447715250169207 8.552284749830793 6 8 6 z" stroke-linecap="round" />
                        </g>
                    </svg>
                </button></form>
            </li>
            <li>
                <form action="Koridorpage.php"><button class="logo-navbar">
                    <img src="image/Recovered_PURE ACADEMY blues.png" alt="Logo">
                </button></form>
            </li>
            <li>
                <form action="Koridorpage.php" ><button>
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
    <div class="container">
        
        <div class="boxnilai">
            <div class="contentnilai">
            
                <?php
                $soal = 1;
                while (true) {
                    $sqlquiz = "SELECT * FROM pertanyaan_ganda WHERE id_quiz = ? and nomor_pertanyaan  = ?";
                    $stmtquiz = $conn->prepare($sqlquiz);
                    $stmtquiz->bind_param("ii", $idquiz, $soal);
                    $stmtquiz->execute();
                    $resultquiz = $stmtquiz->get_result();
                    if ($resultquiz->num_rows == 0) {
                        break;
                    }
                    $rowquiz = $resultquiz->fetch_assoc();
                    $soalText = $rowquiz['soal'];
                    $jawabanBenar = $rowquiz['jawaban_benar'];
                    $jawabanA = $rowquiz['jawaban_a'];
                    $jawabanB = $rowquiz['jawaban_b'];
                    $jawabanC = $rowquiz['jawaban_c'];
                    $jawabanD = $rowquiz['jawaban_d'];
                    $jawabanE = $rowquiz['jawaban_e'];
                    $nilai = $rowquiz['nilai'];
                    $id_pertanyaan = $rowquiz['id_pertanyaan'];

                    $jawabanuser = "SELECT * from jawaban_user where id_user = ? and id_pertanyaan = ?";
                    $stmtjawabanuser = $conn->prepare($jawabanuser);
                    $stmtjawabanuser->bind_param("ii", $userId, $id_pertanyaan );
                    $stmtjawabanuser->execute();
                    $resultjawabanuser = $stmtjawabanuser->get_result();
                    $rowjawabanuser = $resultjawabanuser->fetch_assoc();
                    $jawabanuser = $rowjawabanuser ? $rowjawabanuser['jawaban'] : '';

                    ?>
                    <div class="kontensoal">
                        <div class="textkonten">
                            <h1>Soal Nomor <?php echo $soal; ?></h1>
                            <h3><?php 
                                 if ($jawabanuser == $jawabanBenar) {
                                    echo $nilai . '/' . $nilai;
                                } else {
                                    echo '0/' . $nilai;
                                }
                             ?> Point</h3>
                       
                        </div>
                        <h3><?php echo $soalText; ?></h3>
                        <div class="pilihanabcde">
                        <div class="pilihan <?php echo ($jawabanA == $jawabanBenar ? 'jawabanbenar' : '') . ($jawabanA == $jawabanuser && $jawabanA != $jawabanBenar ? ' jawabanuser' : ''); ?>">
                            <p>a. <?php echo $jawabanA; ?></p>
                        </div>

                        <div class="pilihan <?php echo ($jawabanB == $jawabanBenar ? 'jawabanbenar' : '') . ($jawabanB == $jawabanuser && $jawabanB != $jawabanBenar ? ' jawabanuser' : ''); ?>">
                            <p>b. <?php echo $jawabanB; ?></p>
                        </div>

                        <div class="pilihan <?php echo ($jawabanC == $jawabanBenar ? 'jawabanbenar' : '') . ($jawabanC == $jawabanuser && $jawabanC != $jawabanBenar ? ' jawabanuser' : ''); ?>">
                            <p>c. <?php echo $jawabanC; ?></p>
                        </div>

                        <div class="pilihan <?php echo ($jawabanD == $jawabanBenar ? 'jawabanbenar' : '') . ($jawabanD == $jawabanuser && $jawabanD != $jawabanBenar ? ' jawabanuser' : ''); ?>">
                            <p>d. <?php echo $jawabanD; ?></p>
                        </div>

                        <div class="pilihan <?php echo ($jawabanE == $jawabanBenar ? 'jawabanbenar' : '') . ($jawabanE == $jawabanuser && $jawabanE != $jawabanBenar ? ' jawabanuser' : ''); ?>">
                            <p>e. <?php echo $jawabanE; ?></p>
                        </div>
                        </div>
                    </div>
                    <?php
                    $soal++;
                }
                ?>
                
                
        </div>
        <footer>
            <p>&copy; Pure Academy 2024</p>
        </footer>
    </div>

    <?php

    $sqlnialiuser = "SELECT * FROM nilai_user WHERE id_user = ? and id_quiz = ?";
    $stmt = $conn->prepare($sqlnialiuser);
    $stmt->bind_param("ii", $userId, $idquiz);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $nilaiuser = $row['nilai'];

    $nilaiiquiz = "SELECT * FROM quiz WHERE id_quiz = ?";
    $stmtquiz = $conn->prepare($nilaiiquiz);
    $stmtquiz->bind_param("i", $idquiz);
    $stmtquiz->execute();
    $resultquiz = $stmtquiz->get_result();
    $rowquiz = $resultquiz->fetch_assoc();
    $nilaiquiz = $rowquiz['nilai'];


    ?>
    <div class="nilaiakhir">
        <h3>Hasil Nilai Kuis Anda :</h3>
        <h4><?php echo $nilaiuser ?>/<?php echo $nilaiquiz ?></h4>
    </div>
</body>
</html>