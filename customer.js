window.addEventListener("DOMContentLoaded", () => {
    const cartInfo = document.querySelector('.cart-info')
    const cartItemsContainer = document.querySelector(".cart-items-container");
    const noItems = document.querySelector('.noItems');
  
    let cartProductData = JSON.parse(localStorage.getItem("cartProductData"));


  
    if (cartProductData.length <= 0) {
      noItems.style.display = "initial";
    }
    
     else {
      for (let i = 0; i < cartProductData.length; i++) {
        noItems.style.display= "none";
        const cartItemDiv = document.createElement("div");
        cartItemDiv.classList.add("cart-div");
        cartItemDiv.setAttribute("id", `${cartProductData[i].index}`);
  
        const cartItemTitle = document.createElement("p");
        cartItemTitle.classList.add("cart-title");
        cartItemTitle.textContent = cartProductData[i].name;
  
        cartItemPrice = document.createElement("p");
        cartItemPrice.classList.add("cart-price");
        cartItemPrice.textContent = cartProductData[i].price;
  
        const cartItemImage = document.createElement("img");
        cartItemImage.src = `./assets${cartProductData[i].image}`;
        cartItemImage.classList.add("cart-image");
  
     

  
        cartItemsContainer.appendChild(cartItemDiv);
        cartItemDiv.appendChild(cartItemImage);
        cartItemDiv.appendChild(cartItemTitle);
        cartItemDiv.appendChild(cartItemPrice);
        
      }
  
   
    }
  });
  