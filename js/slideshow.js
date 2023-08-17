
var slideIndex = 0;
showSlides();

function showSlides() {
    var slides = document.getElementsByClassName("slideshowInAboutUs")[0].getElementsByTagName("img");
    var dots = document.getElementsByClassName("dot");

    // Hide all slides
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // Remove active class from all dots
    for (var i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    // Show the current slide and add active class to the corresponding dot
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";

    // Change slide every 2 seconds
    setTimeout(showSlides, 3000);
}