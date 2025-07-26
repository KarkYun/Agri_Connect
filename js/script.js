let navbar = document.querySelector('.header .navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.add('active');
}

document.querySelector('#nav-close').onclick = () => {
    navbar.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.add('active');
}

document.querySelector('#close-search').onclick = () => {
    searchForm.classList.remove('active');
}

//Header appear box-shadow starts here
window.onscroll = () => {
    navbar.classList.remove('active');

    if(window.scrollY > 0){
        document.querySelector('.header').classList.add('active')
    }else{
        document.querySelector('.header').classList.remove('active')
    }
};

window.onload = () => {

    if(window.scrollY > 0){
        document.querySelector('.header').classList.add('active')
    }else{
        document.querySelector('.header').classList.remove('active')
    }
};

//Header appear box-shadow end here

var swiper = new Swiper(" .home-slider", {
    loop:true,
    grabCursor:true,
    navigation: {
        nextEl: ".home-slider .swiper-button-next",
        prevEl: ".home-slider .swiper-button-prev",
      },

      //makes the images swipe automatically
      autoplay: {
        delay: 5000, // duration in milliseconds (5000ms = 5 seconds)
        disableOnInteraction: false, // keeps autoplay running after user interaction
    },
    });

    var swiper = new Swiper(" .product-slider", {
    loop:true,
    grabCursor:true,
    spaceBetween: 20,
    navigation: {
        nextEl: ".product-slider .swiper-button-next",
        prevEl: ".product-slider .swiper-button-prev",
      },

      //makes the images swipe automatically
      autoplay: {
        delay: 5000, // duration in milliseconds (5000ms = 5 seconds)
        disableOnInteraction: false, // keeps autoplay running after user interaction
    },
  

      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
         
        },
        1024: {
          slidesPerView: 4,
        
        },
      },

    });

const aboutImages = [
  "images/ww.jpg",
  "images/farmer.jpg",
  "images/wout.jpg",
  "images/shaking.jpg",
  "images/typing.jpg"

];

let currentIndex = 0;
const aboutImage = document.getElementById("about-image");

function changeImage() {
  aboutImage.classList.add('fade-out');

  setTimeout(() => {
    currentIndex = (currentIndex + 1) % aboutImages.length;
    aboutImage.src = aboutImages[currentIndex];
    aboutImage.classList.remove('fade-out');
    aboutImage.classList.add('fade-in');

    // Remove fade-in after it's done
    setTimeout(() => {
      aboutImage.classList.remove('fade-in');
    }, 1000);
  }, 1000); // match transition duration
}

aboutImages.forEach(src => {
  const img = new Image();
  img.src = src;
});

setInterval(changeImage, 9000);



    