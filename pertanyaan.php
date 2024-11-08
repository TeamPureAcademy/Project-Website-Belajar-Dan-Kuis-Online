<?php
require 'koneksi.php';


$id_quiz = $_POST['id_quiz'];
$id = $_POST['id'];
$kelas = $_POST['id_kelas'] ;

if (empty($id_quiz) || empty($id) || empty($kelas)) {
    header("Location: koridorpage.php");
    exit;
}


$sql = "SELECT * FROM user WHERE id_user = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['role'] !== 'guru') {
    header("Location: koridorpage.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/pertanyaan.css">
    <link rel="stylesheet" href="style/navbar.css">

    <title>Quiz Kelas - WEB </title>
</head>
<body>
<nav class="navbar">
        <ul class="list-navbar">
            <li >
                <form action="quiz.php" method="post">
                    <input type="hidden" name="id_kelas" value="<?php echo $kelas; ?>">
                    <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                    <input type="hidden" name="id_quiz" value="<?php echo $id_quiz; ?>">
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
                    $stmtKelas->bind_param("i", $kelas);
                    $stmtKelas->execute();
                    $resultKelas = $stmtKelas->get_result();
                    $kelasRow = $resultKelas->fetch_assoc();
                    $namaKelas = $kelasRow['nama_kelas'];
                    ?>
                    <input type="hidden" name="id_kelas" value="<?php echo $kelas; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <P class="namaKelas"><?php echo ucfirst(strtolower($namaKelas)); ?></P>
                </button></form>
            </li>
        </ul>
        <div class="profile-navbar">
            
        </div>
    </nav>
    <form action="tambahpertanyaan.php" class="content" method="post">
        
        <button class="save">
            <p>Simpan Soal</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0H3v5.5A1.5 1.5 0 0 0 4.5 7h7A1.5 1.5 0 0 0 13 5.5V0h.086a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5H14v-5.5A1.5 1.5 0 0 0 12.5 9h-9A1.5 1.5 0 0 0 2 10.5V16h-.5A1.5 1.5 0 0 1 0 14.5z"/>
                <path d="M3 16h10v-5.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5zm9-16H4v5.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5zM9 1h2v4H9z"/>
            </svg>
        </button>
        <div class="container">
            
            <div class="pertanyaan">
                <div class="navitem">

                    <p>Pertanyaan 1</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question-fill" viewBox="0 0 16 16">
                        <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0m1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.7 1.7 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627"/>
                    </svg>
                    <div id="jenis" name="jenis1" class="jenis" >
                        <p>Pilihan Ganda</p>
                    </div>
                    
                    <div class="delete" onclick="hapusPertanyaan(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>

                    </div>
                </div>
                <div class="pertanyaanganda" id="ganda">
                    <input type="hidden" name="id_quiz" value="<?php echo htmlspecialchars($id_quiz); ?>">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <input type="hidden" name="id_kelas" value="<?php echo htmlspecialchars($kelas); ?>">
                    <input type="hidden" name="no-ganda1" value="1">
                    <input type="text" placeholder="Masukkan Soal" class="input-soal" name="soal-pilihanganda1">
                    <input type="text" placeholder="Masukkan Jawaban" class="input-soal" name="jawaban-pilihanganda1">
                    <input type="text" placeholder="Masukkan Jumlah Point" class="input-soal" name="Point-ganda1">
                    <div class="jawaban">
                        <input type="text" placeholder="Jawaban A" class="input-jawaban"  name="a-pilihanganda1">
                        <input type="text" placeholder="Jawaban B" class="input-jawaban" name="b-pilihanganda1">
                        <input type="text" placeholder="Jawaban C" class="input-jawaban" name="c-pilihanganda1">
                        <input type="text" placeholder="Jawaban D" class="input-jawaban" name="d-pilihanganda1">
                        <input type="text" placeholder="Jawaban E" class="input-jawaban" name="e-pilihanganda1">
                    </div>
                    
                    

                </div>
                

                
            </div>
            

            
            
        </div>
    </form>
    <div class="tambah" onclick="tambahPertanyaan()">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
        </svg>
    </div>

    
    
    
    

</body>
<script src="script/tambahpertanyaan.js"></script>

</html>