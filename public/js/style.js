// // Navbar Fixed Top on Scroll
// $(function () {
//     // Check the initial Poistion of the Sticky Header
//     var stickyHeaderTop = $('#stickyheader').offset().top;
//     var checkWidth = $(window).width();
//     console.log(checkWidth);
//     $(window).scroll(function () {
//         if ($(window).scrollTop() > stickyHeaderTop && checkWidth > 977) {
//             $('#stickyheader').css({position: 'fixed', top: '0px', background: 'gray'});
//         } else {
//             $('#stickyheader').css({
//                 position: 'static',
//                 top: '0',
//                 background: 'linear-gradient(grey, transparent, transparent, transparent, transparent, transparent)'
//             });
//         }
//     });
// });
//

//dropdown toggle
$(document).ready(function () {
    $(".dropdown").hover(function () {
        $(this).children('div.dropdown-menu').fadeIn(100);
    }, function () {
        $(this).children('div.dropdown-menu').fadeOut(100);
    });
});

//Navbar search toggle
$('#searchToggle').click(function () {
    $('#search').slideToggle(500);
});

//Gallery modal view
function openModal(id) {
    document.getElementById('myModal' + id).style.display = "block";
}

function closeModal(id) {
    document.getElementById('myModal'+id).style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("demo");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    captionText.innerHTML = dots[slideIndex - 1].alt;
}
