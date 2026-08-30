document.addEventListener("DOMContentLoaded", function () {

    const tombol = document.getElementById("btnFasilitas");
    const daftar = document.getElementById("daftarFasilitas");

    tombol.addEventListener("click", function () {

        daftar.classList.toggle("show");

        if (daftar.classList.contains("show")) {

            tombol.innerHTML = "Sembunyikan Fasilitas";

            daftar.scrollIntoView({
                behavior: "smooth"
            });

        } else {

            tombol.innerHTML = "Jelajahi Fasilitas";

        }

    });

});

//========================
// TOMBOL VISI MISI
//========================

const btnVisi = document.getElementById("btnVisiMisi");
const visi = document.getElementById("visiMisi");

if(btnVisi && visi){

    btnVisi.addEventListener("click",function(){

        visi.classList.toggle("show");

        if(visi.classList.contains("show")){

            btnVisi.innerHTML="Sembunyikan Visi & Misi";

            visi.scrollIntoView({
                behavior:"smooth"
            });

        }else{

            btnVisi.innerHTML="Lihat Visi & Misi";

        }

    });

}
/*========================================
STANDAR PELAYANAN
========================================*/

const btnPelayanan = document.getElementById("btnPelayanan");
const standarPelayanan = document.getElementById("standarPelayanan");

if(btnPelayanan && standarPelayanan){

    btnPelayanan.addEventListener("click", function(){

        standarPelayanan.classList.toggle("show");

        if(standarPelayanan.classList.contains("show")){

            btnPelayanan.innerHTML = "Sembunyikan Standar Pelayanan";

            standarPelayanan.scrollIntoView({
                behavior:"smooth"
            });

        }else{

            btnPelayanan.innerHTML = "Jelajahi Standar Pelayanan";

        }

    });

}

/* =========================================================
   SLIDER GURU OTOMATIS + GESER JARI
   ========================================================= */

document.addEventListener("DOMContentLoaded", function(){

    const slider = document.querySelector(".guru-slider");

    if(!slider) return;

    let autoScroll;

    function mulaiSlider(){

        autoScroll = setInterval(function(){

            slider.scrollLeft += 1;

            if(slider.scrollLeft + slider.clientWidth >= slider.scrollWidth){

                slider.scrollLeft = 0;

            }

        }, 25);

    }

    function berhentiSlider(){

        clearInterval(autoScroll);

    }

    mulaiSlider();

    /* Berhenti sementara ketika disentuh */
    slider.addEventListener("touchstart", function(){
        berhentiSlider();
    });

    /* Jalankan lagi setelah jari dilepas */
    slider.addEventListener("touchend", function(){

        setTimeout(function(){
            mulaiSlider();
        }, 1000);

    });

});