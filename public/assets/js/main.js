$(window).ready(() => {
    $('.preload').fadeOut('slow');
});

$('.topbar-collapse').click(() => {
    $('body').toggleClass('navbar-show');
});