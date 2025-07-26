// Swiper.js initialization for testimonials cocoa product images
document.addEventListener('DOMContentLoaded', function() {
  new Swiper('.cocoa-swiper', {
      slidesPerView: 3,
      spaceBetween: 20,
      loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      700: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      }
    }
  });
});
// Example of expandable 'Read More' code:
// <p>
//   Short text here.
//   <span class="more-text" style="display:none;"> Full text here.</span>
//   <a href="#" class="read-more" onclick="toggleReadMore(this); return false;"> Read More</a>
// </p>
// <script>
//   function toggleReadMore(link) {
//     var moreText = link.previousElementSibling;
//     if (moreText.style.display === "none" || moreText.style.display === "") {
//       moreText.style.display = "inline";
//       link.textContent = " Read Less";
//     } else {
//       moreText.style.display = "none";
//       link.textContent = " Read More";
//     }
//   }
// </script>

function toggleReadMore(link) {
  var moreText = link.previousElementSibling;
  if (moreText.style.display === "none" || moreText.style.display === "") {
    moreText.style.display = "inline";
    link.textContent = " Read Less";
  } else {
    moreText.style.display = "none";
    link.textContent = " Read More";
  }
}

