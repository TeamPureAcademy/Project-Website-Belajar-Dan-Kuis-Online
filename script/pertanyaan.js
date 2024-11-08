const pilihanElements = document.querySelectorAll(".pilihan");
const nextBtn = document.querySelector(".nextBtn");

pilihanElements.forEach((pilihan) => {
  pilihan.addEventListener("click", () => {
    if (pilihan.classList.contains("terpilih")) {
      pilihan.classList.remove("terpilih");
      nextBtn.disabled = true;  
    } else {
      pilihanElements.forEach((pil) => pil.classList.remove("terpilih"));
      pilihan.classList.add("terpilih");
      nextBtn.disabled = false;
    }
  });
});


nextBtn.addEventListener("click", () => {
  alert('Maju ke soal berikutnya!');

});
