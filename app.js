const sideMenu = document.querySelector(".side-menu");
const categoryLinks = [...document.getElementsByClassName("category-link")];
const productList = [...document.getElementsByClassName("explore-products")];
const imageList = [...document.getElementsByClassName("image-link")];
const mainImages = [...document.getElementsByClassName("main-image-link")];
const sideCategoryMenu = document.querySelector(".side-menu-category");



// For Navigation Menu (Small Screen);
function openMenu() {
  sideMenu.style.left = "0";
}

function closeMenu() {
  sideMenu.style.left = "-250px";
}

// For Category Menu
function openCategoryMenu() {
  sideCategoryMenu.style.right = "0";
}

function closeCategoryMenu() {
  sideCategoryMenu.style.right = "-250px";
}

// For product page to display each category
categoryLinks.forEach((list) => {
  list.addEventListener("click", () => {
    productList.forEach((product) => {
      if (list.textContent.toLowerCase() === product.id) {
        product.classList.add("active-tab");
        list.classList.add("active-link");

        categoryLinks.forEach((list) => {
          if (list.textContent.toLowerCase() !== product.id) {
            list.classList.remove("active-link");
          }
        });
      } else {
        product.classList.remove("active-tab");
      }
    });
  });
});

// For Product Description page to display each image
imageList.forEach((image) => {
  image.addEventListener("click", () => {
    mainImages.forEach((mainImage) => {
      if (image.src === mainImage.src) {
        mainImage.classList.add("active-main-image");
        image.classList.add("active-image");

        imageList.forEach((image) => {
          if (image.src !== mainImage.src) {
            image.classList.remove("active-image");
          }
        });
      } else {
        mainImage.classList.remove("active-main-image");
      }
    });
  });
});






