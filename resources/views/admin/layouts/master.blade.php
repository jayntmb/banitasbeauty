@php
    use App\Models\Chat;
    use App\Models\Categorie;
    use App\Models\Panier;
    use App\Models\Client;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    $users = Chat::where('statut_id', '1')->orderBy('id', 'desc')->get();
    foreach ($users as $user) {
        $utilisateurs = Client::where('id', $user->client?->id)->get();
        $chat = Chat::where('client_id', $user->client?->id)
            ->orderby('id', 'DESC')
            ->first();
        $allchats = Chat::where('client_id', $user->client?->id)->get();
    }
    $users = User::whereHas('commandes')->orderBy('id', 'desc')->get();
    $categories = Categorie::where('statut_id', '1')->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.head.meta')

    @include('admin.layouts.partials.head.stylesheet')
    <link rel="stylesheet" href="/css/style.css">
    @livewireStyles
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
    <div class="section-global">
        <div class="wrapper">
            @include('admin.layouts.partials.header.header')
            @yield('body')
        </div>
        @include('admin.layouts.partials.header.tabBar')
        @livewire('admin-chat')

        <audio src="{{ asset('songs/song.mp3') }}"></audio>
    </div>
    <div class="backdrop"></div>

    @livewire('admin-notifications')

    @include('admin.layouts.partials.head.script')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <script>
        const nvFichier = document.querySelectorAll('.file-input');
        nvFichier.forEach(element => {
            element.addEventListener('change', function () {
                const fichier = this.files[0];
                const parent = $(this).parent();
                if (fichier) {
                    let namefile = fichier.name;
                    if (namefile.length >= 12) {

                        let splitName = namefile.split('.');
                        namefile = splitName[0].substring(0, 12) + "... ." + splitName[1];

                    }
                    const analyseur = new FileReader();
                    analyseur.readAsDataURL(fichier);
                    analyseur.addEventListener('load', function () {
                        $(parent).addClass('selected')
                        $(parent).find('span').text(namefile);
                    })
                }
            })
        });

        // Upload more Files

        // const tableFichier1 = document.querySelectorAll('.file-input-multiselect');
        // console.log(tableFichier1);

        // tableFichier1.forEach(element => {
        //     element.addEventListener('change', function() {
        //         const fichiers = this.files;
        //         const parent = $(this).parent();

        //         if (fichiers) {
        //             for (let i = 0; i < fichiers.length; i++) {
        //                 const fichier = fichiers[i];
        //                 let namefile = fichier.name;
        //                 let numbfile = fichiers.length;

        //                 if (namefile.length >= 12) {
        //                     let splitName = namefile.split('.');
        //                     namefile = splitName[0].substring(0, 12) + "... ." + splitName[1];
        //                 }

        //                 const analyseur = new FileReader();
        //                 analyseur.readAsDataURL(fichier);

        //                 analyseur.addEventListener('load', function() {
        //                     $(parent).addClass('selected');

        //                     if (fichiers.length > 1) {
        //                         $(parent).find('span').html(" Fichiers uploadés" + "<b>" + " " +
        //                             "(" + numbfile + ")" + "</b>");
        //                     } else {
        //                         $(parent).find('span').html(" Fichiers uploadé" + "<b>" + " " +
        //                             "(" + numbfile + ")" + "</b>");
        //                     }
        //                 })
        //             }
        //         }
        //     })
        // });
        const tableFichier1 = document.querySelectorAll('.file-input-multiselect');
        console.log(tableFichier1);

        tableFichier1.forEach(element => {
            element.addEventListener('change', function () {
                const fichiers = this.files;
                const parent = $(this).parent();
                const maxFiles = 5;

                if (fichiers) {
                    let filesUploaded = 0;
                    for (let i = 0; i < fichiers.length; i++) {
                        const fichier = fichiers[i];
                        let namefile = fichier.name;
                        let numbfile = fichiers.length;
                        if (namefile.length >= 12) {
                            let splitName = namefile.split('.');
                            namefile = splitName[0].substring(0, 12) + "... ." + splitName[1];
                        }
                        const analyseur = new FileReader();
                        analyseur.readAsDataURL(fichier);
                        analyseur.addEventListener('load', function () {
                            if (filesUploaded <= maxFiles) {
                                $(parent).removeClass('error');
                                $(parent).addClass('selected');
                                filesUploaded++;
                                if (fichiers.length > 1) {
                                    $(parent).find('span').html(" Fichiers uploadés" + "<b>" + " " +
                                        "(" + numbfile + ")" + "</b>");
                                } else {
                                    $(parent).find('span').html(" Fichiers uploadé" + "<b>" + " " +
                                        "(" + numbfile + ")" + "</b>");
                                }
                            } else {
                                $(parent).find('span').text(
                                    "Vous ne pouvez pas télécharger plus de " + maxFiles +
                                    " fichiers.");
                                $(parent).addClass('error');
                                $(parent).removeClass('selected');
                                $(element).val('');
                            }

                        });
                    }
                }
            })
        });
    </script>
    @if (session('success'))
        <div class="message-flash d-flex align-items-center show">
            <div class="icon">
                <i class="bi bi-check"></i>
            </div>
            <div class="content-message">
                <h6>{{ session('success') }}</h6>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="message-flash d-flex border border-3 border-danger align-items-center show">
            <div class="icon">
                <i class="bi bi-x-circle"></i>
            </div>
            <div class="content-message">
                <h6>Erreur(s) de validation :</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @yield('javascript')
    @stack('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = $('.search-input');
            const initialContent = $('.initialProductsContainer').html();

            $('.search-input').on('keyup', function () {
                const value = $(this).val().trim();

                if (value === '') {
                    $('.initialProductsContainer').html(initialContent);
                } else {
                    $.ajax({
                        type: "get",
                        url: "{{ route('products.search') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            value: value
                        },
                        dataType: "json",
                        success: function (response) {
                            const html = response.html;

                            if (html.trim() === '') {
                                $('.initialProductsContainer').html(`
                                    <div class="p-4 my-4 flex flex-col gap-6 text-center justify-center w-full text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                                        <div class="">
                                            <span class="font-medium">Oups désolé !</span> Aucun produit correspondant à votre recherche n'est disponible pour le moment.
                                        </div>
                                        <div class="">
                                            <a href="{{ route('admin.produits') }}" class="px-6 py-2 btn btn-dark hover:text-white hover:bg-[#e38407] font-semibold rounded-md text-center transition-all duration-300 whitespace-nowrap align-middle touch-manipulation shadow-md">Afficher tous les produits.</a>
                                        </div>
                                    </div>
                                `);
                            } else {
                                $('.initialProductsContainer').html(`
                                    ${html}
                                `);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error fetching products:", error);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $('#page-load').addClass('d-none');
        var objDiv = document.querySelector(".content-chat");
        //  objDiv.scrollTo(0,objDiv.scrollHeight)
        objDiv.scrollTop = objDiv.scrollHeight;

        var input_file_chat = document.querySelectorAll('.file-uploard')
        var img_file = document.querySelector('.img-upload img')
        var icon_file = document.querySelector('.img-upload .fas')
        var name_file = document.querySelector('.block-file-header .name-file')
        var size_file = document.querySelector('.block-file-body .size')
        var format_file = document.querySelector('.block-file-body .format')
        var input_file_name = document.querySelector('.input-name-file')

        input_file_chat.forEach(element => {
            element.addEventListener('change', function () {
                $('.chat-box .block-file-upload').addClass('show')
                const fichier = this.files[0];
                if (fichier) {
                    var namefile = fichier.name;
                    $(input_file_name).val(namefile)
                    var splitName = namefile.split('.');
                    if (namefile.length >= 12) {
                        namefile = splitName[0].substring(0, 12) + "... ." + splitName[1];
                    }
                    if (fichier.type.match('image.*')) {
                        const analyseur = new FileReader();
                        analyseur.readAsDataURL(fichier);
                        analyseur.addEventListener('load', function () {
                            $('.chat-box .img-upload').removeClass('d-none')
                            $(img_file).removeClass('d-none')
                            img_file.setAttribute('src', this.result);
                            name_file.innerHTML = namefile;
                            size_file.innerHTML = getSizeFile(fichier.size);
                            format_file.innerHTML = splitName[1];
                        })
                    } else {
                        $('.chat-box .img-upload').removeClass('d-none')
                        $(icon_file).removeClass('d-none')
                        name_file.innerHTML = namefile;
                        size_file.innerHTML = getSizeFile(fichier.size);
                        format_file.innerHTML = splitName[1];
                    }


                }
            })
        });
        $('.btn-close-block-file').click(function () {
            $('.chat-box .block-file-upload').removeClass('show')
            $(img_file).addClass('d-none')
            $(icon_file).addClass('d-none')
            $(".file-uploard").val("")
        })
        $('.message-flash').addClass('active')
        setTimeout(() => {
            $('.message-flash').removeClass('active')
        }, 5000);

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

        $(".chat-box .block-coversation .form-control").keyup(function () {

            var value = $(this).val().toLowerCase()

            $(".chat-box .block-all-message-sm .message-sm").each(function () {
                var searc = $(this).text().toLowerCase();
                if (searc.indexOf(value) > -1) {
                    $(this).show()
                    $(this).removeClass('none')

                } else {
                    $(this).hide()

                    $(this).addClass('none')
                }
                if ($(".chat-box .block-all-message-sm .message-sm").length == $(
                    ".chat-box .block-all-message-sm .message-sm.none").length) {
                    $('.block-empty').addClass('show')
                } else {
                    $('.block-empty').removeClass('show')
                }
            })
        })

        $(".search-bar-table").keyup(function () {

            var value = $(this).val().toLowerCase()

            $(".table-devis-prog tbody tr").each(function () {
                var searc = $(this).text().toLowerCase();
                if (searc.indexOf(value) > -1) {
                    $(this).show()
                    $(this).removeClass('none')

                } else {
                    $(this).hide()
                    $(this).addClass('none')
                }
                if ($(".table-devis-prog tbody tr").length == $(
                    ".table-devis-prog tbody tr.none").length) {
                    $('.block-empty-table').removeClass('d-none')
                } else {
                    $('.block-empty-table').addClass('d-none')
                }
            })
        })
        var text_zone = document.querySelectorAll('.text-zone')
        text_zone.forEach(new_input_zone => {
            $(new_input_zone).keyup(function (e) {
                $(this).css('height', '40px');
                let scHeight = e.target.scrollHeight;
                $(this).css('height', scHeight + 'px');
            })

        });
        $('#submit').click(function () {
            var formData = new FormData();
            formData.append('file-image', $('#file-image')[0].files[0]);

            $.ajax({
                url: '/messages/envoyer',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                },
                // error: function(xhr, status, error) {
                //     console.log(xhr.responseText);
                // }
            });
        });
        // console.log($('.chat-box .block-all-message-sm .message-sm'));
    </script>
    @livewireScripts
</body>

</html>
