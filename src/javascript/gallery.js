jQuery(document).ready(function($) {
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 5,
        loop: false,
        freeMode: true,
        freeModeSticky: true,
        loopedSlides: 1, //looped slides should be the same
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        slidesPerView: 1,
        loop:true,
        loopedSlides: 1, //looped slides should be the same
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
        thumbs: {
        swiper: galleryThumbs,
        },
    });
});