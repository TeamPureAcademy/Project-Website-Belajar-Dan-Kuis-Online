<?php

require 'koneksi.php';

$id_kelas = $_POST['id_kelas'];
$userId = $_POST['id_user'];
$id_quiz = $_POST['id_quiz'];


if (empty($id_kelas) || empty($userId)) {
    header("Location: Koridorpage.php");
    exit();
}else{
    $sql = "SELECT role FROM user WHERE id_user = $userId";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        header("Location: Koridorpage.php");
        exit();
    } else {
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
        if ($role !== 'guru') {

            $sqlcek = "SELECT * FROM nilai_user WHERE id_user = ? AND id_quiz = ?";
            $stmtcek = $conn->prepare($sqlcek);
            $stmtcek->bind_param("ii", $userId, $id_quiz);
            $stmtcek->execute();
            $resultcek = $stmtcek->get_result();
            if ($resultcek->num_rows > 0) {
                echo "<form action='pertanyaanquiz.php' method='post'>
                        <input type='hidden' name='id_kelas' value='$id_kelas'>
                        <input type='hidden' name='id_user' value='$userId'>
                        <input type='hidden' name='id_quiz' value='$id_quiz'>
                        <button type='submit' class='auto-button'></button>
                    <script>
                        document.addEventListener(\"DOMContentLoaded\", function() {
                            document.querySelector(\".auto-button\").click();
                        });
                    </script>
                      </form>";
                exit();
            }else{

                $sqlnilai = "INSERT INTO nilai_user (id_user, id_quiz, nilai, keterangan) VALUES (?, ?, 0, 'belum')";
    
                $stmtnilai = $conn->prepare($sqlnilai);
                $stmtnilai->bind_param("ii", $userId, $id_quiz);
                $stmtnilai->execute();
                echo "<form action='pertanyaanquiz.php' method='post'>
                        <input type='hidden' name='id_kelas' value='$id_kelas'>
                        <input type='hidden' name='id_user' value='$userId'>
                        <input type='hidden' name='id_quiz' value='$id_quiz'>
                        <button type='submit' class='auto-button'></button>
                    <script>
                        document.addEventListener(\"DOMContentLoaded\", function() {
                            document.querySelector(\".auto-button\").click();
                        });
                    </script>
                      </form>";
                exit();
            }

        }
    }

}

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/quiz.css">
    <link rel="stylesheet" href="style/responsivequiz.css">
    <link rel="stylesheet" href="style/navbar.css">
    <title>Document</title>
</head> 
<body>
    <nav class="navbar">
        <ul class="list-navbar">
            <li>
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
        <aside class="side-siswa">
            <div class="nilaisemua">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                  </svg>
                
                <p>Nilai Semua Siswa</p>
            </div>
            <?php
            require 'koneksi.php';

            $sql = "SELECT u.id_user, u.namauser, u.email, u.foto, u.role, 
                    j.id_quiz, j.nilai AS nilai_jawaban, j.id_nilai,
                    q.nilai AS nilai_quiz
                    FROM user u
                    JOIN nilai_user j ON u.id_user = j.id_user
                    JOIN quiz q ON j.id_quiz = q.id_quiz
                    WHERE j.id_quiz = {$id_quiz}";

            
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $nama = $row['namauser'];
                    $foto = $row['foto'];
                    $id_jawaban = $row['id_nilai'];
                    $id_user = $row['id_user'];
                    $id_quiz = $row['id_quiz'];
                    $nilai = $row['nilai_jawaban'];
                    $nilai_quiz = $row['nilai_quiz'];
                    $nilai = $nilai == null ? 'Belum Dinilai' : $nilai;
                   
                    echo "<div class='konten-nilai'>
                            <div class='profile'>
                                <div class='fotoprofile'>
                                    <img src='picture/$foto' alt='profile-siswa'>
                                </div>
                                <p>" . ucfirst($nama) . "</p>
                            </div>
                            <div class='nilai'>
                                <p>$nilai/ $nilai_quiz</p>
                            </div>
                        </div>";
                }
            } else {
                echo "<div class='konten-nilai'>
                        <p>Belum Ada Siswa Yang Mengirim Jawaban</p>
                    </div>";
            }
            ?>
            
            <!-- <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div>
            <div class="konten-nilai">

                <div class="profile">
                    <div class="fotoprofile">
                        <img src="picture/2024-10-18 02.44.49.jpeg" alt="profile-siswa">
                    </div>
                    <p>Alif Rifa'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</p>
                </div>
                <div class="nilai">
                    <p>.../100</p>
                </div>
            </div> -->
        </aside>
        <aside class="konten-jawaban">
            <div class="judul-quiz">
                <h1>Judul Quiz</h1>
                <button id="kontenhapus">...</button>
            </div>
            <div class="jumlah-jawaban">
                <?php
                require 'koneksi.php';
                $sql ="SELECT COUNT(*) AS total_rows
                    FROM (
                        SELECT u.id_user, u.namauser, u.email, u.foto, u.role, 
                            n.id_quiz, n.nilai AS nilai_jawaban, n.id_nilai,
                            q.nilai AS nilai_quiz
                        FROM user u
                        JOIN nilai_user n ON u.id_user = n.id_user
                        JOIN quiz q ON n.id_quiz = q.id_quiz
                        WHERE n.id_quiz = {$id_quiz}
                    ) AS subquery;
                    ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $total_rows = $row['total_rows'];
                ?>
                <h1><?php echo $total_rows; ?></h1>
                <p>Jawaban Terkirim</p>
            </div>
            <!-- <div class="kuiskosong">

                <p>Belum Ada Soal Kuis Yang Di buat</p>
            </div> -->
            

            <?php
            require 'koneksi.php';
            $sql = "SELECT *
                    FROM quiz q
                    JOIN pertanyaan_ganda pg ON q.id_Quiz = pg.id_Quiz
                    WHERE q.id_Quiz ={$id_quiz};
                    ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $id_pertanyaan = $row['id_pertanyaan'];
                    $soal = $row['soal'];
                    $jawaban_benar = $row['jawaban_benar'];
                    $jawaban_a = $row['jawaban_a'];
                    $jawaban_b = $row['jawaban_b'];
                    $jawaban_c = $row['jawaban_c'];
                    $jawaban_d = $row['jawaban_d'];
                    $jawaban_e = $row['jawaban_e'];

                    $sqlJawaban = "SELECT
                                        SUM(CASE WHEN j.jawaban = p.jawaban_a THEN 1 ELSE 0 END) AS jawaban_a_count,
                                        SUM(CASE WHEN j.jawaban = p.jawaban_b THEN 1 ELSE 0 END) AS jawaban_b_count,
                                        SUM(CASE WHEN j.jawaban = p.jawaban_c THEN 1 ELSE 0 END) AS jawaban_c_count,
                                        SUM(CASE WHEN j.jawaban = p.jawaban_d THEN 1 ELSE 0 END) AS jawaban_d_count,
                                        SUM(CASE WHEN j.jawaban = p.jawaban_e THEN 1 ELSE 0 END) AS jawaban_e_count
                                    FROM jawaban_user j
                                    JOIN pertanyaan_ganda p ON j.id_pertanyaan = p.id_pertanyaan
                                    WHERE j.id_pertanyaan = {$id_pertanyaan}" ;

                    $resultJawaban = mysqli_query($conn, $sqlJawaban);
                    $rowJawaban = mysqli_fetch_assoc($resultJawaban);



                    $jawaban_a_count = $rowJawaban['jawaban_a_count'];
                    $jawaban_b_count = $rowJawaban['jawaban_b_count'];
                    $jawaban_c_count = $rowJawaban['jawaban_c_count'];
                    $jawaban_d_count = $rowJawaban['jawaban_d_count'];
                    $jawaban_e_count = $rowJawaban['jawaban_e_count'];
                    if($jawaban_a_count == null){
                        $jawaban_a_count = 0;
                    }
                    if($jawaban_b_count == null){
                        $jawaban_b_count = 0;
                    }
                    if($jawaban_c_count == null){
                        $jawaban_c_count = 0;
                    }
                    if($jawaban_d_count == null){
                        $jawaban_d_count = 0;
                    }
                    if($jawaban_e_count == null){
                        $jawaban_e_count = 0;
                    }
                    
                    


                    $sql_jumlah_jawaban ="
                    SELECT COUNT(*) AS jumlah_benar
                    FROM jawaban_user ju
                    JOIN pertanyaan_ganda pg ON ju.id_pertanyaan = pg.id_pertanyaan
                    WHERE ju.jawaban = pg.jawaban_benar
                    AND ju.id_pertanyaan = {$id_pertanyaan}";

                    $result_jumlah_jawaban = mysqli_query($conn, $sql_jumlah_jawaban);
                    $row_jumlah_jawaban = mysqli_fetch_assoc($result_jumlah_jawaban);
                    $jumlah_benar = $row_jumlah_jawaban['jumlah_benar'];

                    echo "<div class='jawaban-quiz'>
                            <div class='infosoal'>
                                <h3>Soal $i</h3>
                                <p>$jumlah_benar / $total_rows Jawaban Benar</p>
                            </div>
                            <p>$soal</p>
                            <div class='abcde'>
                                <div class='abcdejawaban'>
                                    <div class='pilihan " . ($jawaban_a == $jawaban_benar ? 'benar' : '') . "'>
                                        <p>A</p>
                                        <p>$jawaban_a</p>
                                    </div>
                                    <div class='pilihan " . ($jawaban_b == $jawaban_benar ? 'benar' : '') . "'>
                                        <p>B</p>
                                        <p>$jawaban_b</p>
                                    </div>
                                    <div class='pilihan " . ($jawaban_c == $jawaban_benar ? 'benar' : '') . "'>
                                        <p>C</p>
                                        <p>$jawaban_c</p>
                                    </div>
                                    <div class='pilihan " . ($jawaban_d == $jawaban_benar ? 'benar' : '') . "'>
                                        <p>D</p>
                                        <p>$jawaban_d</p>
                                    </div>
                                    <div class='pilihan " . ($jawaban_e == $jawaban_benar ? 'benar' : '') . "'>
                                        <p>E</p>
                                        <p>$jawaban_e</p>
                                    </div>
                                </div>
                                <div class='jumlahjawaban'>
                                    <div class='jawabannya'>
                                        <p>$jawaban_a_count/$total_rows</p>
                                        <P>Menjawab A</P>
                                    </div>
                                    <div class='jawabannya'>
                                        <p>$jawaban_b_count/$total_rows</p>
                                        <P>Menjawab B</P>
                                    </div>
                                    <div class='jawabannya'>
                                        <p>$jawaban_c_count/$total_rows</p>
                                        <P>Menjawab C</P>
                                    </div>
                                    <div class='jawabannya'>
                                        <p>$jawaban_d_count/$total_rows</p>
                                        <P>Menjawab D</P>
                                    </div>
                                    <div class='jawabannya'>
                                        <p>$jawaban_e_count/$total_rows</p>
                                        <P>Menjawab E</P>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    $i++;
                }
            } else {
                echo "<div class='jawaban-quiz'>
                        <p>Belum Ada Soal Kuis Yang Di buat</p>
                    </div>";
                echo'
                <form action="pertanyaan.php" class="tambahkuis" method="post">
                    <input type="hidden" name="id_quiz" value="'.$id_quiz.'">
                    <input type="hidden" name="id" value=" '.$userId.'">
                    <input type="hidden" name="id_kelas" value="'. $id_kelas.'">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                    </button>
                </form> 
                
                
                ';
            }
            ?>
            <!-- <div class="jawaban-quiz">
                <div class="infosoal">

                    <h3>Soal 1</h3>
                    <p>5 / 20 Jawaban Benar</p>
                </div>
                <p>woadjaiwdjiwadwwwwwwwwwwwwwwwwwwwwwwwwwww</p>
                <div class="abcde">
                    <div class="abcdejawaban">

                        <div class="pilihan">
                            <p>A</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                        <div class="pilihan">
                            <p>B</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                        <div class="pilihan">
                            <p>C</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                        <div class="pilihan">
                            <p>D</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                        <div class="pilihan">
                            <p>E</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                    </div>
                    <div class="jumlahjawaban">
                        <div class="jawabannya">
                            <p>5/20</p>
                            <P>Menjawab A</P>
                        </div>
                        <div class="jawabannya">
                            <p>5/20</p>
                            <P>Menjawab B</P>
                        </div>
                        <div class="jawabannya">
                            <p>4/20</p>
                            <P>Menjawab C</P>
                        </div>
                        <div class="jawabannya">
                            <p>1/20</p>
                            <P>Menjawab D</P>
                        </div>
                        <div class="jawabannya">
                            <p>5/20</p>
                            <P>Menjawab E</P>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            <div class="jawaban-quiz">
                <div class="infosoal">

                    <h3>Soal 1</h3>
                    <p>5 / 20 Jawaban Benar</p>
                </div>
                <p>woadjaiwdjiwadwwwwwwwwwwwwwwwwwwwwwwwwwww</p>
                <div class="abcde">
                    <div class="abcdejawaban">

                        <div class="pilihan benar" >
                            <p>A</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                        <div class="pilihan">
                            <p>B</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                        <div class="pilihan">
                            <p>C</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                        <div class="pilihan">
                            <p>D</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                        <div class="pilihan">
                            <p>E</p>
                            <p>woadjaiwdjiwad</p>
                        </div>
                    </div>
                    <div class="jumlahjawaban">
                        <div class="jawabannya">
                            <p>5/20</p>
                            <P>Menjawab A</P>
                        </div>
                        <div class="jawabannya">
                            <p>5/20</p>
                            <P>Menjawab B</P>
                        </div>
                        <div class="jawabannya">
                            <p>4/20</p>
                            <P>Menjawab C</P>
                        </div>
                        <div class="jawabannya">
                            <p>1/20</p>
                            <P>Menjawab D</P>
                        </div>
                        <div class="jawabannya">
                            <p>5/20</p>
                            <P>Menjawab E</P>
                        </div>
                        
                    </div>
                    
                </div> -->
            </div>
        </aside>
    </div>



    <div class="menuhapus">
        <div class="hapus-quiz">
            <p>Hapus Quiz</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
            </svg>
        </div>
        <form id="delete-quiz-form" action="delete_quiz.php" method="post" style="display: none;">
            <input type="hidden" name="id_quiz" value="<?php echo $id_quiz; ?>">
            <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
            <input type="hidden" name="id_user" value="<?php echo $userId; ?>">
        </form>
        <script>
            document.querySelector('.hapus-quiz').addEventListener('click', function() {
                document.getElementById('delete-quiz-form').submit();
            
            });
        </script>
    </div>

    <script>

        const kontenhapus = document.getElementById('kontenhapus');

        kontenhapus.addEventListener('click', function() {
            const menuhapus = document.querySelector('.menuhapus');
            menuhapus.style.display = menuhapus.style.display === 'block' ? 'none' : 'block';
        });


        document.addEventListener("DOMContentLoaded", function() {
            const names = document.querySelectorAll('.side-siswa p');
            names.forEach(function(name) {
                if (name.textContent.length > 50) {
                    name.textContent = name.textContent.slice(0, 50) + '...';
                }
            });
        });
    </script>


</body>
</html>