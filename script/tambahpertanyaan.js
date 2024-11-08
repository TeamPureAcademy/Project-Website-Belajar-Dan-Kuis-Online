let questionCount = 1;

function hapusPertanyaan(buttonElement) {
    var pertanyaanContainer = buttonElement.closest('.pertanyaan');

    pertanyaanContainer.remove();
    questionCount --;
}


function tambahPertanyaan() {
    questionCount++;
    const container = document.querySelector('.container');
    const newPertanyaan = document.createElement('div');
    newPertanyaan.classList.add('pertanyaan');

    const selectID = `jenis-${questionCount}`;

    newPertanyaan.innerHTML = `
        <div class="navitem">
            <p>Pertanyaan ${questionCount}</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question-fill" viewBox="0 0 16 16">
                <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0m1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.7 1.7 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627"/>
            </svg>
            <div id="${selectID}" name="jenis${questionCount}" class="jenis" >
                <p>Pilihan Ganda</p>
            </div>
            
            <div class="delete" onclick="hapusPertanyaan(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                </svg>

            </div>
        </div>
        <div class="pertanyaanganda" id="ganda-${questionCount}" style="display: block;">
            <input type="hidden" name="no-ganda${questionCount}" value="${questionCount}">
            <input type="text" placeholder="Masukkan Soal" class="input-soal" name="soal-pilihanganda${questionCount}">
            <input type="text" placeholder="Masukkan Jawaban" class="input-soal" name="jawaban-pilihanganda${questionCount}">
            <input type="text" placeholder="Masukkan Jumlah Point" class="input-soal" name="Point-ganda${questionCount}">
           
            <div class="jawaban">
                <input type="text" placeholder="Jawaban A" class="input-jawaban" name="a-pilihanganda${questionCount}">
                <input type="text" placeholder="Jawaban B" class="input-jawaban" name="b-pilihanganda${questionCount}">
                <input type="text" placeholder="Jawaban C" class="input-jawaban" name="c-pilihanganda${questionCount}">
                <input type="text" placeholder="Jawaban D" class="input-jawaban" name="d-pilihanganda${questionCount}">
                <input type="text" placeholder="Jawaban E" class="input-jawaban" name="e-pilihanganda${questionCount}">

            </div>
            
        
        </div>
       
    `;

    container.appendChild(newPertanyaan);
}
