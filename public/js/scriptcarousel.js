$(document).ready(function() {
    var owl = $('.carousel-news');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 20,
        autoplay: true,
        pagination: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
            }
        }
    });
    var owl = $('.carousel-network');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 20,
        autoplay: true,
        pagination: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1000: {
                items: 4,
                nav: true,
            }
        }
    });
    var owl2 = $('.carousel-news-sm');
    owl2.owlCarousel({
        items: 1,
        loop: true,
        margin: 50,
        autoplay: true,
        pagination: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: false,
            }
        }
    });
    var owl2 = $('.carousel-article-promo');
    owl2.owlCarousel({
        items: 5,
        loop: true,
        margin: 10,
        autoplay: true,
        pagination: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 4,
                nav: true
            },
            1000: {
                items: 5,
                nav: true,
            }
        }
    });

});