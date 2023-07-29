window.addEventListener("DOMContentLoaded", () => {
  const cartItemsContainer = document.querySelector(".cart-items-container");
  const itemNum = document.getElementById("itemNum");
  let totalPrice = document.getElementById("totalPrice");

  let cartProductData = JSON.parse(localStorage.getItem("cartProductData"));
  let price = 0;

  const updateIndex = (data) => {
    for (let i = 0; i < data.length; i++) {
      data[i].index = i;
    }
  };

  const calculatePrice = (data) => {
    for (let i = 0; i < data.length; i++) {
      let parsedPrice = parseFloat(data[i].amount);
      price += parsedPrice;
    }
    return price;
  };

  let totalItems = cartProductData.length;
  itemNum.textContent = `ITEMS: ${totalItems}`;

  if (cartProductData.length <= 0) {
    const noItems = document.createElement("h1");
    noItems.classList.add("no-items");
    noItems.textContent = "There are no items in the cart.";
    cartItemsContainer.appendChild(noItems);
    itemNum.textContent = `ITEMS: 0`;
  } else {
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

      const deleteBtn = document.createElement("button");
      deleteBtn.textContent = "Delete";
      deleteBtn.classList.add("delete-btn");

      deleteBtn.addEventListener("click", () => {
        const index = parseInt(cartItemDiv.getAttribute("id"));
        cartProductData.splice(index, 1);
        updateIndex(cartProductData);

        console.log(cartProductData);
        cartItemDiv.remove(); // Remove the parent div when delete button is clicked

        localStorage.setItem(
          "cartProductData",
          JSON.stringify(cartProductData)
        );
        location.reload();
      });

      cartItemsContainer.appendChild(cartItemDiv);
      cartItemDiv.appendChild(cartItemImage);
      cartItemDiv.appendChild(cartItemTitle);
      cartItemDiv.appendChild(cartItemPrice);
      cartItemDiv.appendChild(deleteBtn);
    }

    let totalAmt = calculatePrice(cartProductData);
    totalPrice.textContent = `Total Price: ${totalAmt}`;
  }
});
