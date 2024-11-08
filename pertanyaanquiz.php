



<?php 
if (!isset($_POST['id_kelas']) || !isset($_POST['id_user']) || !isset($_POST['id_quiz'])) {
    
    header("Location: masukkelas.php?id_kelas=" . $_POST['id_kelas'] . "&id" . $_POST['id_user']);
    exit();
    
}else{

    $id_kelas = $_POST['id_kelas'];
    $userId = $_POST['id_user'];
    $id_quiz = $_POST['id_quiz'];
    
    require 'koneksi.php';
    $ceknilai = "SELECT * FROM nilai_user WHERE id_user = ? AND id_quiz = ?";
    $stmtceknilai = $conn->prepare($ceknilai);
    $stmtceknilai->bind_param("ii", $userId, $id_quiz);
    $stmtceknilai->execute();
    $resultceknilai = $stmtceknilai->get_result();
    $ceknilaiRow = $resultceknilai->fetch_assoc();
    $keterangan = $ceknilaiRow['keterangan'];
    if ($keterangan == 'sudah') {
        echo '<form id="redirectForm" method="post" action="lihatnilai.php" style="display:none;">';
        echo '<input type="hidden" name="id_kelas" value="' . $id_kelas . '">';
        echo '<input type="hidden" name="id_user" value="' . $userId . '">';
        echo '<input type="hidden" name="id_quiz" value="' . $id_quiz . '">';
        echo '</form>';
        echo '<script>document.getElementById("redirectForm").submit();</script>';
        exit();
    }

    

    
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probabilitas Sederhana</title>
    <link rel="stylesheet" href="style/pertanyaanquiz.css">
    <link rel="stylesheet" href="style/navbar.css">
</head>
<body>
    <div class="peringatan">
        <div class="boxperingatan">
            <img src="image/KOCENG-removebg-preview 1.png" alt="kucing">
            <h4>Soal tidak bisa diulang. Keluar tidak akan menambah rekor beruntun dan nilai hanya bertambah dari soal yang dikerjakan.</h4>
            <button id="lanjut">Lanjutkan</button>
            <form action="keluarprogress.php" method="post">
                <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                <input type="hidden" name="id_user" value="<?php echo $userId; ?>">
                <input type="hidden" name="id_quiz" value="<?php echo $id_quiz; ?>">
                <button id="keluar">Keluar</button>
            </form>
        </div>
    </div>
    <nav class="navbar">
        <ul class="list-navbar">
            <li >
                <button class="kembalikesebelumnya">
                    <svg  id='Reply_All_Arrow_24' width='30' height='30' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                        <g transform="matrix(0.77 0 0 0.77 12 12)" >
                        <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" translate(-14.99, -15.5)" d="M 8 6 C 7.722919966188732 6.000337773826128 7.4584001349509315 6.1156231559820355 7.2695312 6.3183594 L 2.3808594 11.205078 C 2.132518321721257 11.394520683571358 1.9869474488697152 11.689111906521271 1.987330693802456 12.001460549295155 C 1.9877139387351965 12.313809192069039 2.134007286128719 12.608042304023291 2.3828125 12.796875 L 7.2695312 17.681641 L 7.2714844 17.683594 C 7.460228702677729 17.885113803937276 7.723894033565336 17.999627882544274 8 18 C 8.552284749830793 18 9 17.552284749830793 9 17 L 9 13.414062 L 13.271484 17.683594 C 13.460228397825487 17.885113905226618 13.72389389444672 17.99962799293909 14 18 C 14.552284749830793 18 15 17.552284749830793 15 17 L 15 13 L 21 13 C 23.773666 13 26 15.226334 26 18 C 26 20.773666 23.773666 23 21 23 L 18 23 C 17.639364083422432 22.994899710454515 17.303918635428392 23.184375296169332 17.122112278513484 23.49587284971433 C 16.940305921598572 23.80737040325933 16.940305921598572 24.192629596740673 17.122112278513484 24.50412715028567 C 17.303918635428396 24.815624703830668 17.639364083422432 25.005100289545485 18 25 L 21 25 C 24.71951 25 27.714334 22.049648 27.923828 18.380859 C 27.973863472952722 18.260103611663325 27.999742078288303 18.130710924724504 28 18 C 28 14.145666 24.854334 11 21 11 L 15 11 L 15 7 C 15 6.447715250169207 14.552284749830793 6 14 6 C 13.72291989661236 6.0003377184318 13.458399982398523 6.115623105186295 13.269531 6.3183594 L 9 10.585938 L 9 7 C 9 6.447715250169207 8.552284749830793 6 8 6 z" stroke-linecap="round" />
                        </g>
                    </svg>
                </button>
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
                <P>|</P>
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
            
        
    <?php
        require 'koneksi.php';

        $soal = isset($_POST['soal']) ? $_POST['soal'] : 1;
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jawaban'])) {
            $idper = $_POST['id_pertanyaan'];
            $id = $_POST['id_user'];
            $jawabBenar = $_POST['jawaban_benar'];
            $nialibenar = $_POST['nilai'];

            $jawaban_user = $_POST['jawaban'];
            $sqlJawaban = "INSERT INTO jawaban_user (id_user, id_pertanyaan, jawaban) VALUES (?, ?, ?)";
            $stmtJawaban = $conn->prepare($sqlJawaban);
            $stmtJawaban->bind_param("iis", $id, $idper, $jawaban_user);
            $stmtJawaban->execute();
            if ($jawaban_user == $jawabBenar) {
                $sqlUpdateNilai = "UPDATE nilai_user SET nilai = nilai + ? WHERE id_user = ? AND id_quiz = ?";
                $stmtUpdateNilai = $conn->prepare($sqlUpdateNilai);
                $stmtUpdateNilai->bind_param("iii", $nialibenar, $id, $id_quiz);
                $stmtUpdateNilai->execute();
            }
            
            
        }

        $sql = "SELECT * FROM pertanyaan_ganda WHERE id_quiz = ? AND nomor_pertanyaan = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $id_quiz, $soal);
        $stmt->execute();
        $result = $stmt->get_result();
        $quizRow = $result->fetch_assoc();

        if (!$quizRow) {
            $sqlNilai = "SELECT * FROM nilai_user WHERE id_user = ? AND id_quiz = ?";
            $stmtNilai = $conn->prepare($sqlNilai);
            $stmtNilai->bind_param("ii", $userId, $id_quiz);
            $stmtNilai->execute();
            $resultNilai = $stmtNilai->get_result();
            $nilaiRow = $resultNilai->fetch_assoc();
            $nilai = $nilaiRow['nilai'];

            $sqlKeterangan = "UPDATE nilai_user SET keterangan = 'sudah' WHERE id_user = ? AND id_quiz = ?";
            $stmtKeterangan = $conn->prepare($sqlKeterangan);
            $stmtKeterangan->bind_param("ii", $userId, $id_quiz);
            $stmtKeterangan->execute();
            
            echo '<div class="nilaiakhir">';
           
           
            echo '<div class="nilaidantext">';
            echo '<h3>Selamat Sudah Menyelesaikan Kuis Ini</h3>';
            if($nilai >= 80) {
                echo '<div class="nilaianda nilailebih80bg">';
                echo '<div class="headernilai nilailebih80border">';
                echo '<p>Wahh Hebat !!!</p>';
            } else if($nilai >= 60) {
                echo '<div class="nilaianda nilailebih50bg">';
                echo '<div class="headernilai nilailebih50border">';
                echo '<p>Tidak Buruk, Tetap Semangat Ya!</p>';
            } else {
                echo '<div class="nilaianda nilaikurang50bg">';
                echo '<div class="headernilai nilaikurang50border">';
                echo '<p>Gapapa Ayo Lebih Giat Belajar</p>';
            }
            echo '<div class="bgnilai">';
            echo '<h3>Nilai Kamu</h3>';
            echo '<h1>' . $nilai . '</h1>';
            echo '</div></div></div>';
            echo "
            <form id='redirectForm' method='POST' action='lihatnilai.php'>
                <input type='hidden' name='id_user' value='$id'>
                <input type='hidden' name='id_kelas' value='$id_kelas'>
                <input type='hidden' name='id_quiz' value='$id_quiz'>
                <button class='lihatnilai'>Lihat Nilai</button>
            </form>";
            exit();
        }
        
        $jawaban_a = $quizRow['jawaban_a'];
        $jawaban_b = $quizRow['jawaban_b'];
        $jawaban_c = $quizRow['jawaban_c'];
        $jawaban_d = $quizRow['jawaban_d'];
        $jawaban_e = $quizRow['jawaban_e'];
        $soal_text = $quizRow['soal'];
        $id_pertanyaan = $quizRow['id_pertanyaan'];
        $jawaban_benar = $quizRow['jawaban_benar'];
        $nilai = $quizRow['nilai'];
        
        $sqlquiz = "SELECT * FROM quiz WHERE id_quiz = ?";
        $stmtquiz = $conn->prepare($sqlquiz);
        $stmtquiz->bind_param("i", $id_quiz);
        $stmtquiz->execute();
        $resultquiz = $stmtquiz->get_result();
        $quizRow = $resultquiz->fetch_assoc();
        $namaquiz = $quizRow['nama_quiz'];
        
        echo "<h1>" . ucfirst($namaquiz) . "</h1>";
        echo "<div class='pertanyaan'>";
        echo "<p>$soal_text</p>";
        echo "</div>";
        
        echo "<form method='post' action=''>";
        echo "<label class='pilihan'><input class='pilihan' type='radio' name='jawaban' value='$jawaban_a'> A. $jawaban_a</label>";
        echo "<label class='pilihan'><input class='pilihan' type='radio' name='jawaban' value='$jawaban_b'> B. $jawaban_b</label>";
        echo "<label class='pilihan'><input class='pilihan' type='radio' name='jawaban' value='$jawaban_c'> C. $jawaban_c</label>";
        echo "<label class='pilihan'><input class='pilihan' type='radio' name='jawaban' value='$jawaban_d'> D. $jawaban_d</label>";
        echo "<label class='pilihan'><input class='pilihan' type='radio' name='jawaban' value='$jawaban_e'> E. $jawaban_e</label>";
        echo "<input type='hidden' name='id_kelas' value='$id_kelas'>";
        echo "<input type='hidden' name='id_user' value='$userId'>";
        echo "<input type='hidden' name='id_quiz' value='$id_quiz'>";
        echo "<input type='hidden' name='nilai' value='$nilai'>";
        echo "<input type='hidden' name='jawaban_benar' value='$jawaban_benar'>";
        echo "<input type='hidden' name='soal' value='" . ($soal + 1) . "'>";
        echo "<input type='hidden' name='id_pertanyaan' value='$id_pertanyaan'>";
        echo "<div class='periksa' id='periksa'>Periksa</div>";
        echo "<button type='submit' id='selanjutnya' class='nextBtn'>Selanjutnya</button>";
        echo "</form>";
        
        
        
        ?>

        
        <div class="bgblocked">

            <div class="pilihanbenar">
                <div class="iconbenar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.354 4.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0L2.646 9.354a.5.5 0 0 1 .708-.708L6 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </div>
                <h1>Keren !</h1>
            </div>
        </div>
        <div class="bgblocked">

            <div class="pilihansalah">
                <div class="iconsalah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.354 4.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0L2.646 9.354a.5.5 0 0 1 .708-.708L6 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </div>
                <h1>Keren !</h1>
            </div>
        </div>
        <div class="bgblockedsalah">

            <div class="pilihansalah">
                <div class="iconsalah">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                </div>
                <div class="textsalah">

                    <h2>Jawaban Benar :</h2>
                    <h4><?php echo $jawaban_benar; ?></h4>
                </div>
            </div>
        </div>

    </div>
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script> 

    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const pilihanElements = document.querySelectorAll(".pilihan input[type='radio']");
            const nextBtn = document.querySelector(".nextBtn");
            const periksa = document.getElementById('periksa');
            const selanjutnya = document.getElementById('selanjutnya');
            const bgBlocked = document.querySelector('.bgblocked');
            const bgBlockedSalah = document.querySelector('.bgblockedsalah');

            const savedJawaban = localStorage.getItem("jawabanTerpilih");
            const isPeriksaDitekan = localStorage.getItem("isPeriksaDitekan");

            if (savedJawaban) {
                pilihanElements.forEach((pilihan) => {
                    if (pilihan.value === savedJawaban) {
                        pilihan.checked = true;
                        pilihan.parentElement.classList.add("terpilih");
                        nextBtn.disabled = false;
                    }
                });
            }

            if (isPeriksaDitekan === 'true') {
                const jawabanBenar = '<?php echo $jawaban_benar; ?>';
                if (savedJawaban === jawabanBenar) {
                    bgBlocked.style.display = 'flex';
                    selanjutnya.classList.add('btnbenar');
                } else {
                    bgBlockedSalah.style.display = 'flex';
                    selanjutnya.classList.add('btnsalah');
                }
                selanjutnya.style.display = 'flex';
            }

            pilihanElements.forEach((pilihan) => {
                pilihan.addEventListener("click", () => {
                    pilihanElements.forEach((pil) => pil.parentElement.classList.remove("terpilih"));
                    pilihan.parentElement.classList.add("terpilih");
                    localStorage.setItem("jawabanTerpilih", pilihan.value);
                    nextBtn.disabled = false;
                });
            });

            periksa.addEventListener('click', () => {
                const jawaban = '<?php echo $jawaban_benar; ?>';
                let jawabanBenar = false;
                pilihanElements.forEach((pil) => {
                    if (pil.checked) {
                        if (pil.value === jawaban) {
                            jawabanBenar = true;
                            bgBlocked.style.display = 'flex';
                            selanjutnya.classList.add('btnbenar');
                        }
                    }
                });

                if (!jawabanBenar) {
                    bgBlockedSalah.style.display = 'flex';
                    selanjutnya.classList.add('btnsalah');
                }
                
                selanjutnya.style.display = 'flex';
                localStorage.setItem("isPeriksaDitekan", "true");
            });
            nextBtn.addEventListener("click", () => {
                alert('Maju ke soal berikutnya!');
                localStorage.removeItem("jawabanTerpilih");
                localStorage.removeItem("isPeriksaDitekan");
            });
        });


        const kembalikesebelumnya = document.querySelector('.kembalikesebelumnya');
        kembalikesebelumnya.addEventListener('click', () => {
            const peringatan = document.querySelector('.peringatan');
            peringatan.style.display = 'flex';

            document.getElementById('lanjut').addEventListener('click', () => {
                peringatan.style.display = 'none';
            });

            document.getElementById('keluar').addEventListener('click', () => {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'masukkelas.php';

                const idKelasInput = document.createElement('input');
                idKelasInput.type = 'hidden';
                idKelasInput.name = 'id_kelas';
                idKelasInput.value = '<?php echo $id_kelas; ?>';
                form.appendChild(idKelasInput);

                const idUserInput = document.createElement('input');
                idUserInput.type = 'hidden';
                idUserInput.name = 'id';
                idUserInput.value = '<?php echo $userId; ?>';
                form.appendChild(idUserInput);

                document.body.appendChild(form);
                form.submit();
            });
        });
        
            

        
        window.onpopstate = function () {
            if (confirmation) {
                history.back(); 
            } else {
                window.history.pushState(null, null, window.location.href);
            }
        };

        

    </script>


   
    
</body>
</html>
