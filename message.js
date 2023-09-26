let close = document.getElementsByClassName("closebtn");
let i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    let div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}

let alertContainer = document.getElementById("alertContainer");
if (alertContainer) {
  setTimeout(function() {
    alertContainer.style.opacity = "0";
    setTimeout(function() {
      alertContainer.style.display = "none";
    }, 600);
  }, 3000); // 3000 milliseconds = 3 seconds
}