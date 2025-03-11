


var faf = document.querySelector(".navbar-toggler");
var blurr = document.querySelector(".blur");
var form = document.querySelector(".formcont")
var formm = document.querySelector(".form-cont")
var remove = document.querySelector(".bg-blur")
var removee = document.querySelector(".bg-blurr")
faf.addEventListener("click", ()=>{
    faf.querySelector("i").classList.toggle("fa-bars");
    faf.querySelector("i").classList.toggle("fa-times");

})
function openn(){
    form.style.display = ("initial")
    remove.style.display =("initial")
    }

function opennn(){
    removee.style.display =("initial")
    formm.style.display = ("initial")
    document.querySelector(".navbar-collapse").classList.remove("show");
    faf.querySelector("i").classList.toggle("fa-bars");
    faf.querySelector("i").classList.toggle("fa-times");
    


    }


    remove.addEventListener("click", ()=>{
        form.style.display = ("none")
        remove.style.display =("none")
        
    })
    removee.addEventListener("click", ()=>{
        formm.style.display = ("none")
        removee.style.display =("none")
        
    })







function next(){
   
        right.style.display="block"
     
     
}


 var images = document.querySelectorAll('.slider-image');
    var currentImageIndex = 0;

    function showImage(index) {
      if (index < 0) {
        index = images.length - 1;
      } else if (index >= images.length) {
        index = 0;
      }

      for (var i = 0; i < images.length; i++) {
        images[i].classList.remove('acctive');
      }

      images[index].classList.add('acctive');
      currentImageIndex = index;
    }

    function previousImage() {
      showImage(currentImageIndex - 1);
    }

    function nextImage() {
      showImage(currentImageIndex + 1);
    }


    
    