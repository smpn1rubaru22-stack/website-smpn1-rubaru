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
   TOMBOL FASILITAS
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const tombol = document.getElementById("btnFasilitas");
    const daftar = document.getElementById("daftarFasilitas");

    if (tombol && daftar) {

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

    }

});


/* =========================================================
   TOMBOL VISI MISI
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const btnVisi = document.getElementById("btnVisiMisi");
    const visi = document.getElementById("visiMisi");

    if (btnVisi && visi) {

        btnVisi.addEventListener("click", function () {

            visi.classList.toggle("show");

            if (visi.classList.contains("show")) {

                btnVisi.innerHTML = "Sembunyikan Visi & Misi";

                visi.scrollIntoView({
                    behavior: "smooth"
                });

            } else {

                btnVisi.innerHTML = "Lihat Visi & Misi";

            }

        });

    }

});


/* =========================================================
   STANDAR PELAYANAN
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const btnPelayanan = document.getElementById("btnPelayanan");
    const standarPelayanan =
        document.getElementById("standarPelayanan");

    if (btnPelayanan && standarPelayanan) {

        btnPelayanan.addEventListener("click", function () {

            standarPelayanan.classList.toggle("show");

            if (standarPelayanan.classList.contains("show")) {

                btnPelayanan.innerHTML =
                    "Sembunyikan Standar Pelayanan";

                standarPelayanan.scrollIntoView({
                    behavior: "smooth"
                });

            } else {

                btnPelayanan.innerHTML =
                    "Jelajahi Standar Pelayanan";

            }

        });

    }

});


/* =========================================================
   SLIDER GURU
   AUTO SLIDE + GESER JARI DI HP
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const slider = document.querySelector(".guru-slider");

    if (!slider) return;

    let autoScroll = null;
    let sedangDisentuh = false;


    /* =========================
       AUTO SLIDE
    ========================= */

    function mulaiSlider() {

        clearInterval(autoScroll);

        autoScroll = setInterval(function () {

            if (sedangDisentuh) return;

            slider.scrollLeft += 1;

            if (
                slider.scrollLeft + slider.clientWidth
                >= slider.scrollWidth - 2
            ) {

                clearInterval(autoScroll);

            }

        }, 25);

    }


    /* =========================
       JARI MENYENTUH
    ========================= */

    slider.addEventListener("touchstart", function () {

        sedangDisentuh = true;

        clearInterval(autoScroll);

    }, {
        passive: true
    });


    /* =========================
       JARI DILEPAS
    ========================= */

    slider.addEventListener("touchend", function () {

        sedangDisentuh = false;

        setTimeout(function () {

            if (
                slider.scrollLeft + slider.clientWidth
                >= slider.scrollWidth - 2
            ) {

                slider.scrollLeft = 0;

            }

            mulaiSlider();

        }, 1500);

    }, {
        passive: true
    });


    /* =========================
       MULAI SLIDER
    ========================= */

    mulaiSlider();

});