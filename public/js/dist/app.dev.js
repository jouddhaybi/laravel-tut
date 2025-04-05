"use strict";

document.addEventListener("DOMContentLoaded", function () {
  var initSlider = function initSlider() {
    var slides = document.querySelectorAll(".hero-slide");
    var currentIndex = 0; // Track the current slide

    var totalSlides = slides.length;

    function moveToSlide(n) {
      slides.forEach(function (slide, index) {
        slide.style.transform = "translateX(".concat(-100 * n, "%)");

        if (n === index) {
          slide.classList.add("active");
        } else {
          slide.classList.remove("active");
        }
      });
      currentIndex = n;
    } // Function to go to the next slide


    function nextSlide() {
      if (currentIndex === totalSlides - 1) {
        moveToSlide(0); // Go to the first slide if we're at the last
      } else {
        moveToSlide(currentIndex + 1);
      }
    } // Function to go to the previous slide


    function prevSlide() {
      if (currentIndex === 0) {
        moveToSlide(totalSlides - 1); // Go to the last slide if we're at the first
      } else {
        moveToSlide(currentIndex - 1);
      }
    } // Example usage with buttons
    // Assuming you have buttons with classes `.next` and `.prev` for navigation


    var carouselNextButton = document.querySelector(".hero-slide-next");

    if (carouselNextButton) {
      carouselNextButton.addEventListener("click", nextSlide);
    }

    var carouselPrevButton = document.querySelector(".hero-slide-prev");

    if (carouselPrevButton) {
      carouselPrevButton.addEventListener("click", prevSlide);
    } // Initialize the slider


    moveToSlide(0);
  };

  var initImagePicker = function initImagePicker() {
    var fileInput = document.querySelector("#carFormImageUpload");
    var imagePreview = document.querySelector("#imagePreviews");

    if (!fileInput) {
      return;
    }

    fileInput.onchange = function (ev) {
      imagePreview.innerHTML = "";
      var files = ev.target.files;
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = files[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var file = _step.value;
          readFile(file).then(function (url) {
            var img = createImage(url);
            imagePreview.append(img);
          });
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator["return"] != null) {
            _iterator["return"]();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }
    };

    function readFile(file) {
      return new Promise(function (resolve, reject) {
        var reader = new FileReader();

        reader.onload = function (ev) {
          resolve(ev.target.result);
        };

        reader.onerror = function (ev) {
          reject(ev);
        };

        reader.readAsDataURL(file);
      });
    }

    function createImage(url) {
      var a = document.createElement("a");
      a.classList.add("car-form-image-preview");
      a.innerHTML = "\n        <img src=\"".concat(url, "\" />\n      ");
      return a;
    }
  }; // const initMobileNavbar = () => {
  //   const btnToggle = document.querySelector(".btn-navbar-toggle");
  //   btnToggle.onclick = () => {
  //     document.body.classList.toggle("navbar-opened");
  //   };
  // };


  var imageCarousel = function imageCarousel() {
    var carousel = document.querySelector(".car-images-carousel");

    if (!carousel) {
      return;
    }

    var thumbnails = document.querySelectorAll(".car-image-thumbnails img");
    var activeImage = document.getElementById("activeImage");
    var prevButton = document.getElementById("prevButton");
    var nextButton = document.getElementById("nextButton");
    var currentIndex = 0; // Initialize active thumbnail class

    thumbnails.forEach(function (thumbnail, index) {
      if (thumbnail.src === activeImage.src) {
        thumbnail.classList.add("active-thumbnail");
        currentIndex = index;
      }
    }); // Function to update the active image and thumbnail

    var updateActiveImage = function updateActiveImage(index) {
      activeImage.src = thumbnails[index].src;
      thumbnails.forEach(function (thumbnail) {
        return thumbnail.classList.remove("active-thumbnail");
      });
      thumbnails[index].classList.add("active-thumbnail");
    }; // Add click event listeners to thumbnails


    thumbnails.forEach(function (thumbnail, index) {
      thumbnail.addEventListener("click", function () {
        currentIndex = index;
        updateActiveImage(currentIndex);
      });
    }); // Add click event listener to the previous button

    prevButton.addEventListener("click", function () {
      currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
      updateActiveImage(currentIndex);
    }); // Add click event listener to the next button

    nextButton.addEventListener("click", function () {
      currentIndex = (currentIndex + 1) % thumbnails.length;
      updateActiveImage(currentIndex);
    });
  };

  var initMobileFilters = function initMobileFilters() {
    var filterButton = document.querySelector(".show-filters-button");
    var sidebar = document.querySelector(".search-cars-sidebar");
    var closeButton = document.querySelector(".close-filters-button");
    if (!filterButton) return;
    console.log(filterButton.classList);
    filterButton.addEventListener("click", function () {
      if (sidebar.classList.contains("opened")) {
        sidebar.classList.remove("opened");
      } else {
        sidebar.classList.add("opened");
      }
    });

    if (closeButton) {
      closeButton.addEventListener("click", function () {
        sidebar.classList.remove("opened");
      });
    }
  };

  var initCascadingDropdown = function initCascadingDropdown(parentSelector, childSelector) {
    var parentDropdown = document.querySelector(parentSelector);
    var childDropdown = document.querySelector(childSelector);
    if (!parentDropdown || !childDropdown) return;
    hideModelOptions(parentDropdown.value);
    parentDropdown.addEventListener("change", function (ev) {
      hideModelOptions(ev.target.value);
      childDropdown.value = "";
    });

    function hideModelOptions(parentValue) {
      var models = childDropdown.querySelectorAll("option");
      models.forEach(function (model) {
        if (model.dataset.parent === parentValue || model.value === "") {
          model.style.display = "block";
        } else {
          model.style.display = "none";
        }
      });
    }
  };

  var initSortingDropdown = function initSortingDropdown() {
    var sortingDropdown = document.querySelector(".sort-dropdown");
    if (!sortingDropdown) return; // Init sorting dropdown with the current value

    var url = new URL(window.location.href);
    var sortValue = url.searchParams.get("sort");

    if (sortValue) {
      sortingDropdown.value = sortValue;
    }

    sortingDropdown.addEventListener("change", function (ev) {
      var url = new URL(window.location.href);
      url.searchParams.set("sort", ev.target.value);
      window.location.href = url.toString();
    });
  };

  initSlider();
  initImagePicker(); // initMobileNavbar();

  imageCarousel();
  initMobileFilters();
  initCascadingDropdown("#makerSelect", "#modelSelect");
  initCascadingDropdown("#stateSelect", "#citySelect");
  initSortingDropdown();
  ScrollReveal().reveal(".hero-slide.active .hero-slider-title", {
    delay: 200,
    reset: true
  });
  ScrollReveal().reveal(".hero-slide.active .hero-slider-content", {
    delay: 200,
    origin: "bottom",
    distance: "50%"
  });
});