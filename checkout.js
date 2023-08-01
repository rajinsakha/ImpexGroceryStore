window.addEventListener("DOMContentLoaded", () => {
  
    const cartItemsContainer = document.querySelector(".cart-items-container");
    const itemNum = document.getElementById("itemNum");
    let totalPrice = document.getElementById("totalPrice");
  
    let cartProductData = JSON.parse(localStorage.getItem("cartProductData"));
    let price = 0;
  
    const calculatePrice = (data) => {
      for (let i = 0; i < data.length; i++) {
        let parsedPrice = parseFloat(data[i].amount);
        price += parsedPrice;
      }
      return price;
    };
  
    let totalItems = cartProductData.length;
    itemNum.textContent = `ITEMS: ${totalItems}`;
  
      for (let i = 0; i < cartProductData.length; i++) {
      
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
  
      let totalAmt = calculatePrice(cartProductData);
      totalPrice.textContent = `Total Price: Rs ${totalAmt}`;
  });
  