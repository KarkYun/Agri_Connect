document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".gallery-item").forEach(function (item) {
    item.addEventListener("click", function () {
      var target = this.getAttribute("data-target");
      // Highlight on click
      document.querySelectorAll(".gallery-item").forEach(function (el) {
        el.classList.remove("clicked-highlight");
      });
      this.classList.add("clicked-highlight");
      setTimeout(() => {
        this.classList.remove("clicked-highlight");
      }, 3000);
      // Highlight only the info section header and scroll so header is visible
      if (target) {
        var infoSection = document.getElementById(target);
        if (infoSection) {
          var header = infoSection.querySelector("h3");
          if (header) {
            header.classList.add("info-highlight-text");
            // Scroll so header is at the top of the viewport (with offset for navbar)
            var yOffset = -70; // adjust for fixed navbar height
            var y =
              header.getBoundingClientRect().top +
              window.pageYOffset +
              yOffset;
            window.scrollTo({ top: y, behavior: "smooth" });
            setTimeout(function () {
              header.classList.remove("info-highlight-text");
            }, 3000);
          }
        }
      }
    });
  });

  // Fade in gallery images on scroll
  function onScrollFadeIn() {
    document.querySelectorAll(".gallery-item").forEach(function (item) {
      var rect = item.getBoundingClientRect();
      if (rect.top < window.innerHeight - 60) {
        item.classList.add("visible");
      }
    });
    // Animate info sections
    document.querySelectorAll(".gallery-info").forEach(function (info) {
      var rect = info.getBoundingClientRect();
      if (rect.top < window.innerHeight - 60) {
        info.classList.add("visible-info");
      }
    });
  }

  // Animate intro section on scroll
  function animateIntroSection() {
    var intro = document.querySelector(".intro-section");
    if (intro) {
      var rect = intro.getBoundingClientRect();
      if (rect.top < window.innerHeight - 60) {
        intro.classList.add("intro-animate");
      }
    }
  }

  // Animate captions in gallery
  function animateCaptions() {
    document
      .querySelectorAll(".gallery-item .caption")
      .forEach(function (caption) {
        var rect = caption.parentElement.getBoundingClientRect();
        if (rect.top < window.innerHeight - 60) {
          caption.classList.add("caption-animate");
        }
      });
  }

  // Animate footer on scroll
  function animateFooter() {
    var footer = document.querySelector("footer, .footer");
    if (footer) {
      var rect = footer.getBoundingClientRect();
      if (rect.top < window.innerHeight - 60) {
        footer.classList.add("footer-animate");
      }
    }
  }

  function onScrollAllAnimations() {
    onScrollFadeIn();
    animateIntroSection();
    animateCaptions();
    animateFooter();
  }

  window.addEventListener("scroll", onScrollAllAnimations);
  onScrollAllAnimations();
});