<!DOCTYPE html>
<html lang="fr">

<head>
    @include('layouts.partials.head.meta')

    @include('layouts.partials.head.stylesheet')

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="/css/style.css">
    @livewireStyles
    @yield('css')
</head>

<body>
    <div id="page-load">
        <div class="backdrop fade"></div>
        <div class="parent-modal">
            <div class="dialog dialog-centered">
                <div class="content-modal">
                    <div class="body">
                        <div class="d-flex align-items-center">
                            <div class="load-spiner">
                            </div>
                            <div class="text-star">
                                <h6 class="mb-0" style="color:var(--colorTitre)!important;">
                                    Veuillez patienter Svp
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <header class="sticky-top">
        @include('layouts.partials.header.header')
        @include('layouts.partials.header.navbar')
    </header>

    <div class="global-div">
        <div class="wrapper">
            <div class="loading">
                <div id="loader"></div>
            </div>
            <div class="back-drop"></div>

            <div class="full-menu">
                <div class="close-menu">
                    <span></span>
                    <span></span>
                </div>
                <div class="content">
                    <h1>Menu</h1>
                    <hr>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}" class="{{ session()->get('active') == '0' ? 'active' : '' }}">
                                Accueil
                            </a>
                            <a href="{{ route('about') }}"
                                class="{{ session()->get('active') == '1' ? 'active' : '' }}">
                                Qui sommes-nous
                            </a>
                            <a href="{{ route('produits') }}"
                                class="{{ session()->get('active') == '2' ? 'active' : '' }}">
                                Nos produits
                            </a>
                            <a href="{{ route('engagements') }}"
                                class="{{ session()->get('active') == '3' ? 'active' : '' }}">
                                Nos engagements
                            </a>
                            <a href="{{ route('contacts') }}"
                                class="{{ session()->get('active') == '4' ? 'active' : '' }}">
                                Contact
                            </a>
                            <a href="{{ route('admin.dashboard') }}"
                                class="{{ session()->get('active') == '5' ? 'active' : '' }}">
                                Connexion
                            </a>
                        </li>
                    </ul>
                    <h1>Contact info</h1>
                    <hr>
                    @php
                        use App\Models\SiteInfo;
                        $info = SiteInfo::first();
                    @endphp
                    <p>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:contact@pharmansdrc.com">
                            <span>{{ $info->email }}</span>
                        </a>
                    </p>
                    <p>
                        <i class="fas fa-phone"></i>
                        <a href="tel:+243852591175">
                            <span>{{ $info->phone }}</span>
                        </a>
                    </p>
                    <p>
                        <i class="fas fa-envelope"></i>
                        <span>{{ $info->addresse }}</span>
                    </p>
                    <div class="net-work d-flex mt-4">
                        <a href="https://www.facebook.com/Pharmans" target="_blank" style="color: #3b5998!important;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/pharmans/" target="_blank"
                            style="color: #0e76a8!important;">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            @yield('body')



        </div>
    </div>
    @include('layouts.partials.header.bottomNav')
    <div class="modal fade" id="modal-map" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header ">
                    <div class="text-center w-100">
                        <h5 class="modal-title ">
                            Vous souhaitez devenir revendeur ? <a href="#">Rejoignez-nous !</a>
                        </h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row g-lg-5 g-3 align-items-center">
                            <div class="col-lg-6">
                                <h2>Notre depôt</h2>
                                <p>Nous avons hâte de vous retrouver ! <br> Notre depôt est ouvert et vous accueille
                                    tous les jours dans
                                    le respect des mesures sanitaires .</p>
                                <p>
                                    40, croisement des av du Commerce et Bakongo <br> Kinshasa-Gombe
                                </p>
                                <p>
                                    contact@pharmans.com
                                </p>
                                <p>
                                    {{ $info->phone }}
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <div class="card card-map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3978.552175193601!2d15.312531114801837!3d-4.30676314759271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a6a3550af01175d%3A0x15fb8aee4dca8add!2sPharmans%20%2C%20D%C3%A9p%C3%B4t%20Pharmaceutique!5e0!3m2!1sfr!2scd!4v1645444011526!5m2!1sfr!2scd"
                                        width="600" height="250" style="border:0;" allowfullscreen=""
                                        loading="lazy" class="mb-5"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('admin-notifications')
    @if (session()->get('session') && json_decode(session()->get('session'))->name != '')
        {{-- Message flash --}}
        <div class="message-flash d-flex align-items-center">
            <div class="icon">
                @if (json_decode(session()->get('session'))->statut == 'success')
                    <i class="bi bi-check"></i>
                @endif
            </div>
            <div class="content-message">
                <h6>{{ json_decode(session()->get('session'))->name }}</h6>
                <p>{{ json_decode(session()->get('session'))->message }}</p>
            </div>
        </div>
        {{-- {{ session()->pull("session") }} --}}
    @endif

    @include('layouts.partials.head.script')
    <div class="modal fade" id="exampleModalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="block-user-lg">
                    <div class="avatar-lg">
                        <div class="user-logo">
                            <span>PK</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <h6>Pedrien Kinkani</h6>
                        <p>Nom de l'entreprise</p>
                    </div>
                </div>
                <div class="modal-body">
                    <h6 class="mb-3 mt-3">Infos société</h6>
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-4" style="border-right: 1px solid rgba(0,0,0,0.1);">
                                <div class="block-info-sm">
                                    <h6>N° NRCCM</h6>
                                    <span>000000000000</span>
                                </div>
                            </div>
                            <div class="col-4" style="border-right: 1px solid rgba(0,0,0,0.1);">
                                <div class="block-info-sm">
                                    <h6>ID National</h6>
                                    <span>000000</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="block-info-sm">
                                    <h6>N° Impôt</h6>
                                    <span>000000</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @yield('javascript')
    @livewireScripts
    <script>
        $(document).ready(function() {
            $('.message-flash').addClass('active')
            setTimeout(() => {
                $('.message-flash').removeClass('active')
            }, 5000);
            $('#page-load').addClass('d-none');
            if ($(window).width() < 992) { // Vérifie si l'utilisateur est sur un appareil mobile
                $('.nav-mobile .nav-link').on('click', function() {
                    var navWidth = $('.nav-mobile').outerWidth(); // Récupère la largeur de la navtab
                    var scrollOffset = $(this).offset().left - $('.nav-mobile').offset()
                        .left; // Calcule la position de l'élément cliqué par rapport à la gauche de la navtab
                    var scrollLeft = $('.nav-mobile')
                        .scrollLeft(); // Récupère la position actuelle de défilement horizontal de la navtab
                    var scrollPosition = scrollLeft + scrollOffset - (navWidth /
                        20); // Calcule la position de défilement cible en centrant l'élément cliqué
                    $('.nav-mobile').animate({
                        scrollLeft: scrollPosition
                    }, 300); // Fait défiler la navtab vers l'élément cliqué
                });
            }
        })
    </script>
</body>

</html>
