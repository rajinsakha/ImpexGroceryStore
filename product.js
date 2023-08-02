// JavaScript code for the product page
const addToCartButton = document.querySelector('.addCart-btn');
let index = 0;
let data=[];


addToCartButton.addEventListener('click', () => {

  const productContainer = document.querySelector('.detailedProduct-desc');
  const productName = productContainer.querySelector('.product-name').textContent;
  const productPrice = productContainer.querySelector('.product-price').textContent;
  const productImage = document.querySelector('#product-image').src;



  const imagePath = productImage.substring(productImage.lastIndexOf('/'));
  const amount = productPrice.slice(2, productPrice.length );

  
  const productData = {
    index: index,
    name: productName,
    price: productPrice,
    image: imagePath,
    amount: amount
  };

    data.push(productData);
    localStorage.setItem(`cartProductData`, JSON.stringify(data));
    index++;



});
