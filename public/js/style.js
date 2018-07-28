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