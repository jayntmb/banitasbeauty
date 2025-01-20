<script src="{{ asset('assets/admin/js/app.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.loader').addClass('complete')
    })

    $(window).scroll(function() {

        if ($(this).scrollTop() > 40) {
            $(".navbar").addClass('bg-white');

        } else {
            $(".navbar").removeClass('bg-white');
        }
    });
    // const menu = document.querySelector('.menu');
    // let touchStartX = null;

    // document.addEventListener('touchstart', function(event) {
    //     touchStartX = event.touches[0].clientX;
    // });

    // document.addEventListener('touchmove', function(event) {
    //     if (touchStartX && event.touches[0].clientX > touchStartX + 50) {
    //         $(menu).addClass('show')
    //         $('.backdrop').addClass('zIndex')
    //         $('.menu .btn-menu').addClass('close')
    //     }
    // });

    // document.addEventListener('touchend', function(event) {
    //     touchStartX = null;
    //     if (!menu.classList.contains('show')) {
    //         return;
    //     }
    //     if (event.changedTouches[0].clientX < menu.offsetWidth) {
    //         $(menu).removeClass('show');
    //         $('.backdrop').removeClass('zIndex')
    //         $('.menu .btn-menu').removeClass('close')
    //     }
    // });
    //     const menu = document.querySelector('.menu');
    // let touchStartX = null;

    // document.addEventListener('touchstart', function(event) {
    //     touchStartX = event.touches[0].clientX;
    // });

    // document.addEventListener('touchmove', function(event) {
    //     if (touchStartX && event.touches[0].clientX > touchStartX + 50) {
    //         if (!menu.contains(event.target)) { // Vérifier si l'utilisateur glisse sur le menu ou non
    //             $(menu).addClass('show')
    //             $('.backdrop').addClass('zIndex')
    //             $('.menu .btn-menu').addClass('close')
    //         }
    //     }
    // });

    // document.addEventListener('touchend', function(event) {
    //     touchStartX = null;
    //     if (!menu.classList.contains('show')) {
    //         return;
    //     }
    //     if (event.changedTouches[0].clientX < menu.offsetWidth) {
    //         $(menu).removeClass('show');
    //         $('.backdrop').removeClass('zIndex')
    //         $('.menu .btn-menu').removeClass('close')
    //     }
    // });

    // const menu = document.querySelector('.menu');
    // let touchStartX = null;
    // let touchStartY = null;

    // document.addEventListener('touchstart', function(event) {
    //     touchStartX = event.touches[0].clientX;
    //     touchStartY = event.touches[0].clientY;
    // });

    // document.addEventListener('touchmove', function(event) {
    //     if (!touchStartX || !touchStartY) {
    //         return;
    //     }

    //     const touchEndX = event.changedTouches[0].clientX;
    //     const touchEndY = event.changedTouches[0].clientY;
    //     const dx = touchEndX - touchStartX;
    //     const dy = touchEndY - touchStartY;

    //     if (Math.abs(dx) > Math.abs(dy) && dx > 50) {
    //         $(menu).addClass('show');
    //         $('.backdrop').addClass('zIndex');
    //         $('.menu .btn-menu').addClass('close');
    //         touchStartX = null;
    //         touchStartY = null;
    //     }
    // });

    // document.addEventListener('touchend', function(event) {
    //     touchStartX = null;
    //     touchStartY = null;

    //     if (!menu.classList.contains('show')) {
    //         return;
    //     }

    //     if (event.changedTouches[0].clientX < menu.offsetWidth) {
    //         $(menu).removeClass('show');
    //         $('.backdrop').removeClass('zIndex');
    //         $('.menu .btn-menu').removeClass('close');
    //     }
    // });
    // const menu = document.querySelector('.menu');
    // let touchStartX = null;

    // document.addEventListener('touchstart', function(event) {
    //   touchStartX = event.touches[0].clientX;
    // });

    // document.addEventListener('touchmove', function(event) {
    //   const table = document.querySelector('.table-responsive');
    //   const scrollLeft = table.scrollLeft;
    //   const scrollWidth = table.scrollWidth;

    //   if (touchStartX && event.touches[0].clientX > touchStartX + 50 && scrollLeft <= 0) {
    //     $(menu).addClass('show');
    //     $('.backdrop').addClass('zIndex');
    //     $('.menu .btn-menu').addClass('close');
    //   }
    // });

    // document.addEventListener('touchend', function(event) {
    //   touchStartX = null;
    //   if (!menu.classList.contains('show')) {
    //     return;
    //   }
    //   if (event.changedTouches[0].clientX < menu.offsetWidth) {
    //     $(menu).removeClass('show');
    //     $('.backdrop').removeClass('zIndex');
    //     $('.menu .btn-menu').removeClass('close');
    //   }
    // });

    // const menu = document.querySelector('.menu');
    // let touchStartX = null;

    // document.addEventListener('touchstart', function(event) {
    //     touchStartX = event.touches[0].clientX;
    // });

    // document.addEventListener('touchend', function(event) {
    //     if (touchStartX && event.changedTouches[0].clientX > touchStartX + 50) {
    //         menu.classList.add('show');
    //         document.querySelector('.backdrop').classList.add('zIndex');
    //         document.querySelector('.menu .btn-menu').classList.add('close');
    //     }
    //     touchStartX = null;
    // });
    $('.delete-message').click(function() {
        alert('coucou')
        $(this).parent().addClass('scaleOut')
    })
    const menu = document.querySelector('.menu');
    let touchStartX = null;

    document.addEventListener('touchstart', function(event) {
        // Vérifier si le point de départ est sur le bord gauche de l'écran
        if (event.touches[0].clientX < 50) {
            touchStartX = event.touches[0].clientX;
        }
    });

    document.addEventListener('touchend', function(event) {
        if (touchStartX && event.changedTouches[0].clientX > touchStartX + 50) {
            menu.classList.add('show');
            $('.backdrop').addClass('zIndex');
            document.querySelector('.menu .btn-menu').classList.add('close');
        }
        touchStartX = null;
    });

    const contentNotif = document.querySelectorAll('.content-notif');
    let touchStartX1 = null;
    contentNotif.forEach(contentSweep => {
        contentSweep.addEventListener('touchstart', function(event) {
            touchStartX1 = event.touches[0].clientX;
        });
        contentSweep.addEventListener('touchmove', function(event) {
            if (touchStartX1 && event.touches[0].clientX < touchStartX1 - 50) {
                contentSweep.classList.add('sm');
                $(contentSweep).parent().parent().find('.close-card-notif').addClass('show')
            }
        });
        contentSweep.addEventListener('touchend', function(event) {
            touchStartX1 = null;
            if (contentSweep.classList.contains('sm')) {
                if (event.changedTouches[0].clientX > contentSweep.offsetWidth) {
                    contentSweep.classList.remove('sm');
                    $(contentSweep).parent().parent().find('.close-card-notif').removeClass('show')
                }
            }
        });
    });

    const compteNotif = document.querySelectorAll('.card-notif')
    const numCompteNotif = compteNotif.length;
    $('.NumNotif').text("(" + numCompteNotif + ")")

    $('.btn-menu').click(function() {
        $(this).toggleClass('close')
        $('.menu').toggleClass('show')
        $('.wrapper').toggleClass('show')
        $('header').toggleClass('show')
        $('.menu').removeClass('lg')
        $('.backdrop').toggleClass('zIndex')
    })
    $('body').on('mouseenter', '.menu.show', function() {
        $(this).addClass('lg')
    })
    $('body').on('mouseleave', '.menu.show', function() {
        $(this).removeClass('lg')
    })
    $(".btn-chatbot").click(function() {
        $('.chat-box').toggleClass('show')
        $('.backdrop').toggleClass('show')
    })
    $('.nav-item').click(function() {
        $('.drop-menu', this).toggleClass('show')
    })
    $('.list-menu').click(function() {
        $('.drop-menu', this).toggleClass('show')
    })
    $('.link').click(function() {
        $('.link').removeClass('active')
        $(this).addClass('active')
    })
    $('.btn-plus').click(function() {
        if ($('.btn-plus .fas').hasClass('fa-plus')) {
            $('.btn-plus .fas').removeClass('fa-list')
        } else {
            $('.btn-plus .fas').addClass('fa-list')
        }
        $('.btn-plus .fas').toggleClass('fa-times')
        $('.menu-sm').toggleClass('show')
    })
    $('.block-coversation .message-sm a').click(function(e) {
        e.preventDefault()
        $('.block-chat-custom').addClass('show')
        $('.block-coversation').addClass('hide')
    })
    $('.block-chat-custom .btn-back').click(function(e) {
        e.preventDefault()
        $('.block-chat-custom').removeClass('show')
        $('.block-coversation').removeClass('hide')
    })
    $('.btn-close-chat-box').click(function(e) {
        e.preventDefault()
        $('.block-chat-custom').removeClass('show')
        $('.block-coversation').removeClass('hide')
        $('.chat-box').removeClass('show')
        $('.block-empty').addClass('d-none')
        $('.message-sm').show()
        $('.chat-box .block-coversation .header .block-search .form-control').val("");
        $('.backdrop').removeClass('show')
    })
    $('.backdrop').click(function() {
        $(this).removeClass('show zIndex')
        $('.block-chat-custom').removeClass('show')
        $('.block-coversation').removeClass('hide')
        $('.chat-box').removeClass('show')
        $('.menu').removeClass('show')
        $('.block-empty').addClass('d-none')
        $('.message-sm').show()
        $('.chat-box .block-coversation .header .block-search .form-control').val("");
        $('.menu .btn-menu').removeClass('close');
    })
    // $(".table-responsive").mouseenter(function(){
    //     $(this).css('overflowX', 'visible')
    // })
    // $(".table-responsive").mouseleave(function(){
    //     $(this).css('overflowX', 'auto')
    // })
    const imageFile = document.querySelector('.chat-box #file-image');
    const pdfFile = document.querySelector('.chat-box #file-doc');
    console.log(imageFile);
    imageFile.addEventListener('change', function() {
        const fichier = this.files[0];
        if (fichier) {
            /// Ici que tu placeras la requête pour envoyer les images dans le chat-box
        }
    })
    pdfFile.addEventListener('change', function() {
        const fichier = this.files[0];
        console.log("hello");
        if (fichier) {
            /// Ici que tu placeras la requête pour envoyer les fichiers PDF dans le chat-box
        }
    })

    /// Lire un son lors de l'envoi d'un message

    function beep() {
        var beep = document.querySelector('audio');
        beep.play();
    }
</script>
