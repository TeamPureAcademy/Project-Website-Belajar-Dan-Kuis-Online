document.addEventListener('DOMContentLoaded', () => {
    all.style.backgroundColor = 'black';
    all.style.color = 'white';
    home.style.backgroundColor = 'black';
    home.style.color = 'white';
});

let currentIndex = 0;
const totalItems = document.querySelectorAll('.kategori-kelas').length;
const itemsToShow = 3; 
const itemWidth = 160; 
const kategori = document.querySelector('.kategoris');

document.getElementById('nextBtn').addEventListener('click', () => {
    if (currentIndex < totalItems - itemsToShow) {
        currentIndex++;
    } else {
        currentIndex = 0;
    }
    kategori.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
});

const profile = document.getElementById('box-profile');

const home = document.getElementById('home');

const kontenHome = document.getElementById('kontenHome');
const kontensetting = document.getElementById('setting-konten');
const kontenulasan = document.getElementById('ulasan-konten');

const setting = document.getElementById('setting');
const ulasan = document.getElementById('ulasan');

const buatkelas = document.getElementById('buatkelas');
const kelasbaru = document.getElementById('kelasbaru');
const masukkelas = document.getElementById('masukkelas');
const masuk = document.getElementById('masuk');
const buttongantinama = document.getElementById('buttongantinama');
const gantinama = document.getElementById('gantinama');

buttongantinama.addEventListener('click', () => {
    gantinama.style.display = 'flex';
    gantinama.addEventListener('click', (event) => {
        if (event.target === gantinama) {
            gantinama.style.display = 'none';
        }
    });
});
const buttongantipass = document.getElementById('buttongantipass');
const gantipass = document.getElementById('gantipass');
buttongantipass.addEventListener('click', () => {
    gantipass.style.display = 'flex';
    gantipass.addEventListener('click', (event) => {
        if (event.target === gantipass) {
            gantipass.style.display = 'none';
        }
    });
});

masuk.addEventListener('click', () => {
    masukkelas.style.display = 'flex';
    kontenHome.style.display = 'flex';
    kontensetting.style.display = 'none';
    
    kontenulasan.style.display = 'none';
    home.style.backgroundColor = 'black';
    home.style.color = 'white';

    setting.style.backgroundColor = '';
    setting.style.color = '';
    ulasan.style.backgroundColor = '';
    ulasan.style.color = '';

    masukkelas.addEventListener('click', (event) => {
        if (event.target === masukkelas) {
            masukkelas.style.display = 'none';
        }
    });
});

buatkelas.addEventListener('click', () => {
    kelasbaru.style.display = 'flex';
    kontenHome.style.display = 'flex';
    kontensetting.style.display = 'none';
    
    kontenulasan.style.display = 'none';
    home.style.backgroundColor = 'black';
    home.style.color = 'white';

    setting.style.backgroundColor = '';
    setting.style.color = '';
    ulasan.style.backgroundColor = '';
    ulasan.style.color = '';

    // Add event listener to hide kelasbaru when clicked
    kelasbaru.addEventListener('click', (event) => {
        if (event.target === kelasbaru) {
            kelasbaru.style.display = 'none';
        }
    });
});

setting.addEventListener('click', () => {
    kontenHome.style.display = 'none';
    kontenulasan.style.display = 'none';
    profile.style.display = 'flex'; // Set profile to flex
    kelasbaru.style.display = 'none';

    kontensetting.style.display = 'flex';
    setting.style.backgroundColor = 'black';
    setting.style.color = 'white';

    home.style.backgroundColor = '';
    home.style.color = '';
    ulasan.style.backgroundColor = '';
    ulasan.style.color = '';
});

home.addEventListener('click', () => {
    kontenHome.style.display = 'flex';
    kontensetting.style.display = 'none';
    kelasbaru.style.display = 'none';
    profile.style.display = 'flex'; // Set profile to flex
    
    kontenulasan.style.display = 'none';
    home.style.backgroundColor = 'black';
    home.style.color = 'white';
    setting.style.backgroundColor = '';
    setting.style.color = '';
    ulasan.style.backgroundColor = '';
    ulasan.style.color = '';
});

ulasan.addEventListener('click', () => {
    kontenHome.style.display = 'none';
    kontensetting.style.display = 'none';
    kelasbaru.style.display = 'none';
    profile.style.display = 'none'; // Set profile to none
    
    kontenulasan.style.display = 'flex';
    ulasan.style.backgroundColor = 'black';
    ulasan.style.color = 'white';
    home.style.backgroundColor = '';
    home.style.color = '';
    setting.style.backgroundColor = '';
    setting.style.color = '';
});

const engginer = document.getElementById('engginer');
const dkv = document.getElementById('dkv');
const bisnis = document.getElementById('bisnis');
const bahasa = document.getElementById('bahasa');
const matematika = document.getElementById('matematika');
const sains = document.getElementById('sains');
const all = document.getElementById('all');

const kelasEngginer = document.getElementById('kelas-engginer');
const kelasDkv = document.getElementById('kelas-dkv');
const kelasBisnis = document.getElementById('kelas-bisnis');
const kelasBahasa = document.getElementById('kelas-bahasa');
const kelasMtk = document.getElementById('kelas-matematika');
const kelasSains = document.getElementById('kelas-sains');

const nextBtn = document.getElementById('nextBtns');
const nextBtn2 = document.getElementById('nextBtns2');
const kelasContainer = document.getElementById('kelasContainer');

const svg0 = document.getElementById('svg0');
const svg1 = document.getElementById('svg1');
const svg2 = document.getElementById('svg2');
const svg3 = document.getElementById('svg3');
const svg4 = document.getElementById('svg4');
const svg5 = document.getElementById('svg5');
const svg6 = document.getElementById('svg6');

let currentIndexs = 0; 
let currentCategory = 'all'; 
let filteredBoxes = Array.from(kelasContainer.children); 

function updateDisplay() {
    const boxes = filteredBoxes.slice(currentIndexs, currentIndexs + 4); 
    
    for (let box of kelasContainer.children) {
        box.style.display = 'none';
    }

    for (let box of boxes) {
        box.style.display = 'flex';
    }

    currentIndexs += 4;
    if (currentIndexs >= filteredBoxes.length) {
        currentIndexs = 0; 
    }
}

function setCategory(category) {
    currentCategory = category;
    currentIndexs = 0;
   
    if (currentCategory === 'all') {
        filteredBoxes = Array.from(kelasContainer.children); 
    } else {
        filteredBoxes = Array.from(kelasContainer.children).filter(box => box.classList.contains(currentCategory)); // Filter berdasarkan kategori
    }
    updateDisplay();
}

nextBtn.addEventListener('click', () => {
    updateDisplay();
});
nextBtn2.addEventListener('click', () => {
    updateDisplay();
});

engginer.addEventListener('click', () => {
    setCategory('kategori-engginer');
    engginer.style.backgroundColor = 'black';
    engginer.style.color = 'white';
    svg1.style.fill= 'black';
    dkv.style.backgroundColor = '';
    dkv.style.color = '';
    bisnis.style.backgroundColor = '';
    bisnis.style.color = '';
    bahasa.style.backgroundColor = '';
    bahasa.style.color = '';
    matematika.style.backgroundColor = '';
    matematika.style.color = '';
    sains.style.backgroundColor = '';
    sains.style.color = '';
    all.style.backgroundColor = '';
    all.style.color = '';
});

dkv.addEventListener('click', () => {
    setCategory('kategori-dkv');
    svg2.style.fill= 'black';
    engginer.style.backgroundColor = '';
    engginer.style.color = '';
    dkv.style.backgroundColor = 'black';
    dkv.style.color = 'white';
    bisnis.style.backgroundColor = '';
    bisnis.style.color = '';
    bahasa.style.backgroundColor = '';
    bahasa.style.color = '';
    matematika.style.backgroundColor = '';
    matematika.style.color = '';
    sains.style.backgroundColor = '';
    sains.style.color = '';
    all.style.backgroundColor = '';
    all.style.color = '';
});

bisnis.addEventListener('click', () => {
    setCategory('kategori-bisnis');
    svg3.style.fill= 'black';
    engginer.style.backgroundColor = '';
    engginer.style.color = '';
    dkv.style.backgroundColor = '';
    dkv.style.color = '';
    bisnis.style.backgroundColor = 'black';
    bisnis.style.color = 'white';
    bahasa.style.backgroundColor = '';
    bahasa.style.color = '';
    matematika.style.backgroundColor = '';
    matematika.style.color = '';
    sains.style.backgroundColor = '';
    sains.style.color = '';
    all.style.backgroundColor = '';
    all.style.color = '';
});

bahasa.addEventListener('click', () => {
    setCategory('kategori-bahasa');
    svg4.style.fill= 'black';
    engginer.style.backgroundColor = '';
    engginer.style.color = '';
    dkv.style.backgroundColor = '';
    dkv.style.color = '';
    bisnis.style.backgroundColor = '';
    bisnis.style.color = '';
    bahasa.style.backgroundColor = 'black';
    bahasa.style.color = 'white';
    matematika.style.backgroundColor = '';
    matematika.style.color = '';
    sains.style.backgroundColor = '';
    sains.style.color = '';
    all.style.backgroundColor = '';
    all.style.color = '';
});

matematika.addEventListener('click', () => {
    setCategory('kategori-matematika');
    svg5.style.fill= 'black';
    engginer.style.backgroundColor = '';
    engginer.style.color = '';
    dkv.style.backgroundColor = '';
    dkv.style.color = '';
    bisnis.style.backgroundColor = '';
    bisnis.style.color = '';
    bahasa.style.backgroundColor = '';
    bahasa.style.color = '';
    matematika.style.backgroundColor = 'black';
    matematika.style.color = 'white';
    sains.style.backgroundColor = '';
    sains.style.color = '';
    all.style.backgroundColor = '';
    all.style.color = '';
});

sains.addEventListener('click', () => {
    setCategory('kategori-sains');
    svg6.style.fill= 'black';
    engginer.style.backgroundColor = '';
    engginer.style.color = '';
    dkv.style.backgroundColor = '';
    dkv.style.color = '';
    bisnis.style.backgroundColor = '';
    bisnis.style.color = '';
    bahasa.style.backgroundColor = '';
    bahasa.style.color = '';
    matematika.style.backgroundColor = '';
    matematika.style.color = '';
    sains.style.backgroundColor = 'black';
    sains.style.color = 'white';
    all.style.backgroundColor = '';
    all.style.color = '';
});

all.addEventListener('click', () => {
    setCategory('all');
    svg0.style.fill= 'black';
    engginer.style.backgroundColor = '';
    engginer.style.color = '';
    dkv.style.backgroundColor = '';
    dkv.style.color = '';
    bisnis.style.backgroundColor = '';
    bisnis.style.color = '';
    bahasa.style.backgroundColor = '';
    bahasa.style.color = '';
    matematika.style.backgroundColor = '';
    matematika.style.color = '';
    sains.style.backgroundColor = '';
    sains.style.color = '';
    all.style.backgroundColor = 'black';
    all.style.color = 'white';
});

setCategory('all');

const pass = document.getElementById('pass');
const svglihat = document.getElementById('svglihat');
const svghide = document.getElementById('svghide');
const lihatPass= document.getElementById('lihat-pass');

lihatPass.addEventListener("click", function () {
    if (svglihat.style.display === 'flex') {
        svglihat.style.display = 'none'; 
        svghide.style.display = 'flex';  
    } else {
        svglihat.style.display = 'flex'; 
        svghide.style.display = 'none';   
    }

    const type = pass.getAttribute("type") === "password" ? "text" : "password";
    pass.setAttribute("type", type);
});

const nextButt = document.getElementById('nextButt');
const konten = document.querySelector('.wrapkelasmu-konten');
const boxes = document.querySelectorAll('.wrapkelasmu-box');

let index = 0;

nextButt.addEventListener('click', () => {
    index = (index + 1) % boxes.length;
    konten.style.transform = `translateX(-${index * 300}px)`;
});
