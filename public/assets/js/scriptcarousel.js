$(document).ready(function() {
    // slide Teams
    var owl = $("#slider-carousel");
    owl.owlCarousel({
      items: 5,
      itemsDesktop: [1000, 1],
      itemsDesktopSmall: [900, 2],
      itemsTablet: [600, 1],
      itemsMobile: false,
      pagination: false,
      autoplay: true
    });
    $(".next").click(function() {
      owl.trigger('owl.next');
    })
    $(".prev").click(function() {
      owl.trigger('owl.prev');
    })

    // slide Partenaire

    // slide Teams
    var owl = $("#slider-carousel1");
    owl.owlCarousel({
      items: 5,
      itemsDesktop: [1000, 1],
      itemsDesktopSmall: [900, 2],
      itemsTablet: [600, 2],
      itemsMobile: false,
      pagination: true,
      autoplay: true
    });

});
