window.addEventListener("DOMContentLoaded", () => {
  
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
    
    let totalAmt = calculatePrice(cartProductData);
    totalPrice.textContent = `Total Price: Rs ${totalAmt}`;

  });

