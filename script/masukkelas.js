

const tambah = document.getElementById('tambahqm');
const kontenqm = document.getElementById('kontenqm');
const tombolQ= document.getElementById('tombolq');
const tombolM= document.getElementById('tombolm');
const tambahanq = document.getElementById('tambahanq');
const tambahanm = document.getElementById('tambahanm');
const qmkonten = document.getElementById('qmkonten');

tombolQ.addEventListener('click', function() {
    tambahanq.style.display = 'flex';
    tambahanm.style.display = 'none';
    qmkonten.style.display = 'none';

});

tombolM.addEventListener('click', function() {
    
    tambahanm.style.display = 'flex';
    qmkonten.style.display = 'none';
    tambahanq.style.display = 'none';
});

tambah.addEventListener('click', function() {

    kontenqm.style.display = 'flex';

    kontenqm.addEventListener('click', (event) => {
        if (event.target === kontenqm) {
            kontenqm.style.display = 'none';
            tambahanm.style.display = 'none';
            tambahanq.style.display = 'none';
            qmkonten.style.display = 'flex';
        }
    });

});


