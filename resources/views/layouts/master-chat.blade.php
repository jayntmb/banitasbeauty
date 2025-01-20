<!DOCTYPE html>
<html lang="fr">

<head>
    @include('layouts.partials.head.meta')

    @include('layouts.partials.head.stylesheet')

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @livewireStyles
    @yield('css')
</head>

<body>
    <header class="sticky-top header-chat">
        @include('layouts.partials.header.header')
        @include('layouts.partials.header.navbar-chat')
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
    <audio src="{{ asset('songs/song.mp3') }}"></audio>
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
        {{ session()->pull('session') }}
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
        var input_file_chat = document.querySelectorAll('.file-uploard')
        var img_file = document.querySelector('.img-upload img')
        var icon_file = document.querySelector('.img-upload .fas')
        var name_file = document.querySelector('.block-file-header .name-file')
        var size_file = document.querySelector('.block-file-body .size')
        var format_file = document.querySelector('.block-file-body .format')
        var input_file_name = document.querySelector('.input-name-file')

        input_file_chat.forEach(element => {
            element.addEventListener('change', function() {
                $('.file-uploard').parent().addClass('d-none')
                $('.col-textarea textarea').addClass('lg')
                $('.card-chat .block-file-upload').addClass('show')
                const fichier = this.files[0];
                if (fichier) {
                    console.log(fichier);
                    var namefile = fichier.name;
                    $(input_file_name).val(namefile)
                    console.log($(input_file_name).val());
                    var splitName = namefile.split('.');
                    if (namefile.length >= 12) {
                        namefile = splitName[0].substring(0, 12) + "... ." + splitName[1];
                    }
                    if (fichier.type.match('image.*')) {
                        const analyseur = new FileReader();
                        analyseur.readAsDataURL(fichier);
                        analyseur.addEventListener('load', function() {
                            $('.card-chat .img-upload').removeClass('d-none')
                            $(icon_file).addClass('d-none')
                            $(img_file).removeClass('d-none')
                            img_file.setAttribute('src', this.result);
                            name_file.innerHTML = namefile;
                            size_file.innerHTML = getSizeFile(fichier.size);
                            format_file.innerHTML = splitName[1];
                        })
                    } else {
                        $('.card-chat .img-upload').removeClass('d-none')
                        $(icon_file).removeClass('d-none')
                        $(img_file).addClass('d-none')
                        name_file.innerHTML = namefile;
                        size_file.innerHTML = getSizeFile(fichier.size);
                        format_file.innerHTML = splitName[1];
                    }


                }
            })
        });
        $('.btn-close-block-file').click(function() {
            $('.card-chat .block-file-upload').removeClass('show')
            $(img_file).addClass('d-none')
            $(icon_file).addClass('d-none')
            $(".file-uploard").val("")
            $('.file-uploard').parent().removeClass('d-none')
            $('.col-textarea textarea').removeClass('lg')
        })

        function getSizeFile(size) {

            const fileSize = size;
            const units = ['B', 'KB', 'MB', 'GB', 'TB'];

            let newSize = fileSize;
            let unitIndex = 0;

            while (newSize > 1024 && unitIndex < units.length - 1) {
                newSize /= 1024;
                unitIndex++;
            }

            const formattedSize = `${Math.round(newSize * 100) / 100} ${units[unitIndex]}`;

            return formattedSize

        }
        /// Lire un son lors de l'envoi d'un message

        function beep() {
            var beep = document.querySelector('audio');
            beep.play();
        }
        $('.message-flash').addClass('active')
        setTimeout(() => {
            $('.message-flash').removeClass('active')
        }, 5000);
    </script>
</body>

</html>
