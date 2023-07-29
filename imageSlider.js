
const wrapper = document.querySelector(".products-wrapper");
const productSlider = document.querySelector(".product-slider");
const arrowBtns = document.querySelectorAll(".products-wrapper .change")
const firstCardWidth = productSlider.querySelector(".product-card").offsetWidth;
const productSliderChildrens = [...productSlider.children];

let isDragging = false, startX, startScrollLeft, timeoutId;

// Fet the number of cards that can fit in the productSlider (carousel) at once
let cardPerView = Math.round(productSlider.offsetWidth/ firstCardWidth);


// Insert copies of the last few cards to the beginning of productSlider for infinite scrolling
productSliderChildrens.slice(-cardPerView).reverse().forEach(card => {
    productSlider.insertBefore(card.cloneNode(true), productSlider.firstChild);
  });
  
  // Insert copies of the first few cards to the end of productSlider for infinite scrolling
  productSliderChildrens.slice(0, cardPerView).forEach(card => {
    productSlider.appendChild(card.cloneNode(true));
  });

arrowBtns.forEach(btn => {
    btn.addEventListener('click',()=>{
        productSlider.scrollLeft += btn.id === "left" ? -firstCardWidth : firstCardWidth;
    })
})

const dragStart = (e)=>{
    isDragging = true;
    productSlider.classList.add('dragging');
    // Records the initial cursor and scroll position of the product slider (carousel)
    startX = e.pageX;
    startScrollLeft = productSlider.scrollLeft;
}

const dragging = (e) => {
    e.preventDefault();
    if(!isDragging) return; //if isDragging is false return from here
    // Updates the scroll position of the product slider based on the cursor movement
    productSlider.scrollLeft = startScrollLeft -  (e.pageX - startX);
  };

const dragStop = ()=>{
    isDragging = false;
    productSlider.classList.remove('dragging');
}  

const autoPlay = ()=>{
    if(window.innerWidth < 800) return; 
    // Autoplay the productSlider after every 2500 ms
    timeoutId = setTimeout(()=> productSlider.scrollLeft += firstCardWidth, 2000);
}

autoPlay();

const infiniteScroll = ()=>{
    // if the productSlider is at the beginning, scroll to the end
    if(productSlider.scrollLeft === 0){
        productSlider.classList.add("no-transition");
        productSlider.scrollLeft = productSlider.scrollWidth - (2*productSlider.offsetWidth);
        productSlider.classList.remove("no-transition");
    }
    // If the productSlider is at the end, scroll to the beginning
    else if(Math.ceil(productSlider.scrollLeft) === productSlider.scrollWidth - productSlider.offsetWidth){
        productSlider.classList.add("no-transition");
        productSlider.scrollLeft = productSlider.offsetWidth;
        productSlider.classList.remove("no-transition");
    }

// Clear existing timeout & start autoplay if mouse is not hovering over productSlider
    clearTimeout(timeoutId);
    if(!wrapper.matches(":hover")){
        autoPlay();
    } 
}
  
productSlider.addEventListener("mousedown", dragStart);
productSlider.addEventListener("mousemove", dragging);
document.addEventListener('mouseup', dragStop);
productSlider.addEventListener('scroll', infiniteScroll);
wrapper.addEventListener('mouseenter', ()=> clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);

