// swipper
var swiper = new Swiper(".mySwiper", {
    // effect: "coverflow",
    // grabCursor: true,
    // centeredSlides: true,
    // slidesPerView: "auto",
    // coverflowEffect: {
    //     rotate: 50,
    //     stretch: 0,
    //     depth: 100,
    //     modifier: 1,
    //     slideShadows: true,
    // },
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    // navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev",
    // },
});

// Path: script.js


const navItem = document.querySelectorAll('.nav-item');

function linkAction() {
    /*Active link*/
    navItem.forEach((n) => n.classList.remove("active")); // arrow function
    this.classList.add("active"); // this ini berguna untuk men select semua yang ada di function
}
navItem.forEach(el1 => {
    el1.addEventListener('click', linkAction)

    el1.addEventListener('mouseenter', function () {
        el1.style.fontFamily = 'Algerian';
        el1.style.backgroundColor = 'yellow';
    })
    
    el1.addEventListener('mouseleave', function () {
        el1.style.fontFamily = 'normal';
        el1.style.backgroundColor = '#e3f2fd';
    })
});


const navBrand = document.querySelector('.navbar-brand');
navBrand.addEventListener('click', function () {
    navItem.forEach((n) => n.classList.remove("active")); // arrow function
})