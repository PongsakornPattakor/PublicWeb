// Add faded effect to elements when scroll
window.addEventListener("scroll", function () {
  const fadeItem_left = document.querySelectorAll("[data-faded-left]");
  const fadeItem_right = document.querySelectorAll("[data-faded-right]");
  const fadeItem_top = document.querySelectorAll("[data-faded-top]");
  const fadeItem_bottom = document.querySelectorAll("[data-faded-bottom]");

  // Fade from left
  fadeItem_left.forEach((element) => {
    if (
      element.getBoundingClientRect().top < this.window.innerHeight &&
      element.getBoundingClientRect().bottom > 0
    ) {
      if (!element.classList.contains("opacity-100")) {
        setTimeout(() => {
          element.classList.remove("opacity-0");
          element.classList.add("opacity-100", "animate-moveFromLeft");
        }, 200);
      }
    } else {
      element.classList.remove("opacity-100", "animate-moveFromLeft");
      element.classList.add("opacity-0");
    }
  });

  // Fade from right
  fadeItem_right.forEach((element) => {
    if (
      element.getBoundingClientRect().top < this.window.innerHeight &&
      element.getBoundingClientRect().bottom > 0
    ) {
      if (!element.classList.contains("opacity-100")) {
        setTimeout(() => {
          element.classList.remove("opacity-0");
          element.classList.add("opacity-100", "animate-moveFromRight");
        }, 200);
      }
    } else {
      element.classList.remove("opacity-100", "animate-moveFromRight");
      element.classList.add("opacity-0");
    }
  });

  // Fade from top
  fadeItem_top.forEach((element) => {
    if (
      element.getBoundingClientRect().top < window.innerHeight &&
      element.getBoundingClientRect().bottom > 0
    ) {
      if (!element.classList.contains("opacity-100")) {
        setTimeout(() => {
          element.classList.remove("opacity-0");
          element.classList.add("opacity-100", "animate-moveFromTop");
        }, 200);
      }
    } else {
      element.classList.remove("opacity-100", "animate-moveFromTop");
      element.classList.add("opacity-0");
    }
  });

  // Fade from bottom
  fadeItem_bottom.forEach((element) => {
    if (
      element.getBoundingClientRect().top < window.innerHeight &&
      element.getBoundingClientRect().bottom > 0
    ) {
      if (!element.classList.contains("opacity-100")) {
        setTimeout(() => {
          element.classList.remove("opacity-0");
          element.classList.add("opacity-100", "animate-moveFromBottom");
        }, 200);
      }
    } else {
      element.classList.remove("opacity-100", "animate-moveFromBottom");
      element.classList.add("opacity-0");
    }
  });
});

// Menu toggle
function menuToggle() {
  const mobileMenu = document.getElementById("mobile-menu");

  mobileMenu.classList.toggle("hidden");
  mobileMenu.classList.toggle("flex");
}

// Modal
const modalBtn = document.getElementById("modal-btn");
// Show modal
function showModal() {
  const modalItem1 = document.getElementById("modal-toeic");
  const closeModal = document.getElementById("close-modal");

  modalItem1.classList.remove("hidden");

  // Show modal when press
  setTimeout(() => {
    modalItem1.classList.remove("opacity-0");
    modalItem1.classList.add("flex", "opacity-100");
  }, 10);

  // Hide modal when press close btn
  closeModal.addEventListener("click", () => {
    modalItem1.classList.remove("opacity-100");
    modalItem1.classList.add("opacity-0");

    setTimeout(() => {
      modalItem1.classList.remove("flex");
      modalItem1.classList.add("hidden");
    }, 600);
  });
}

// Carousel
const prevButton = document.querySelector("[data-carousel-prev]");
const nextButton = document.querySelector("[data-carousel-next]");
const slides = document.querySelectorAll("[data-carousel-item]"); // 6 index

let currentIndex = 0;

// Update current slide
function updateCarousel() {
  slides.forEach((slide, index) => {
    if (index === currentIndex) {
      // Shows selected slide
      slide.classList.remove("opacity-0");
      slide.classList.add("opacity-100");
    } else {
      // Hide unselected slides
      slide.classList.remove("opacity-100");
      slide.classList.add("opacity-0");
    }
  });
}

// Start shows default slide
updateCarousel();

// Previous btn
prevButton.addEventListener("click", function () {
  currentIndex = currentIndex === 0 ? slides.length - 1 : currentIndex - 1;
  updateCarousel();
});

// Next btn
nextButton.addEventListener("click", function () {
  currentIndex = currentIndex === slides.length - 1 ? 0 : currentIndex + 1;
  updateCarousel();
});
