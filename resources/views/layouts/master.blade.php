<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banitas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/order-summary.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .bi-trash:hover {
            color: red;
        }

        .stock-status {
            display: inline-block;
            font-size: 0.85em;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .in-stock {
            background-color: green;
        }

        .out-of-stock {
            background-color: red;
        }
    </style>
    @stack('styles')
    @livewireStyles
</head>

<body>
    <div class="global-div">
        @include('common.navbar')
        @yield('content')
        @include('common.footer')
        <div class="back-drop"></div>
    </div>

    {{-- MODAL --}}

    @livewire('cart')
    <div id="offcanvasAlert" class="offcanvas offcanvas-top" style="height: 75px" tabindex="-1">
        <div class="offcanvas-body">
            <!-- Content will be dynamically updated here -->
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    @if (session('session'))
        @php
            $message = json_decode(session('session'), true);
        @endphp
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                Toast.fire({
                    icon: "{{ $message['statut'] }}",
                    title: "{{ $message['message'] }}"
                });
            });
        </script>
    @endif

    <!-- Script pour la recherche des produits -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = $('.search-input');
            const container = $('.products-section');
            const initialProducts = container.html();
            $('.search-input').on('keyup', function() {
                const value = $(this).val().trim();

                if (value === '') {
                    container.html(initialProducts);
                    $('.pagination').show()
                } else {
                    $.ajax({
                        type: "get",
                        url: "{{ route('produits.recherche') }}",
                        data: {
                            value: value
                        },
                        dataType: "json",
                        success: function(response) {
                            var container = $('.products-section');
                            container.empty();
                            $('.pagination').hide()
                            if (response.data.length === 0) {
                                container.append('<p>Aucun produit trouvé.</p>');
                            } else {
                                response.data.forEach(function(produit) {
                                    container.append(`
                            <div class="col-lg-4 col-xl-3">
                                <div class="card card-article">
                                    <div class="card-img">
                                        <a href="" class="like tooltip-hover" data-position-tooltip="right">
                                            <svg viewBox="0 0 24 24" width="512" height="512">
                                                <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z" />
                                            </svg>
                                            <span class="tooltip-indicator sm">Ajouter aux favoris</span>
                                        </a>
                                        <a href="/produit/${produit.id}">
                                            <img src="storage/images/produits/${produit.first_image}" alt="${produit.nom}">
                                        </a>
                                    </div>
                                    <div class="content-text mt-2 mt-lg-2">
                                        <div class="face">
                                            <a href="/produit/${produit.id}">
                                                <h3 class="mb-lg-2">${produit.nom}</h3>
                                            </a>
                                            <div class="d-flex align-items-center gap-2 block-rate mb-lg-2 mb-1">
                                                <i class="bi bi-star-fill active"></i>
                                                <i class="bi bi-star-fill active"></i>
                                                <i class="bi bi-star-fill active"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="price">
                                                    ${produit.prix}$
                                                </div>
                                                <a href="/panier/${produit.id}/1"
                                                   class="btn btn-primary btn-default ms-auto">
                                                   Ajouter au panier
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Erreur lors de la recherche :", error);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('cartUpdated', (event) => {
                // Get the offcanvas element
                const offcanvasElement = document.getElementById('offcanvasAlert');
                const offcanvas = new bootstrap.Offcanvas(offcanvasElement);

                // Set the message or content for the offcanvas
                const offcanvasBody = offcanvasElement.querySelector('.offcanvas-body');
                offcanvasBody.textContent = 'Panier mis à jour avec succès !';

                // Show the offcanvas
                offcanvas.show();

                setTimeout(() => {
                    offcanvas.hide();
                }, 800)
            });
        });
    </script>

    <!-- Script pour la mise a jour du panier de l'utilisateur -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        // Utilisation de la délégation d'événements
        $(document).on('click', '.increment-btn', function () {
            const input = $(this).parent().find('.quantity-input');
            const produitId = input.data('id');
            updateQuantity(produitId, 'increment');
        });

        $(document).on('click', '.decrement-btn', function () {
            const input = $(this).parent().find('.quantity-input');
            const produitId = input.data('id');
            updateQuantity(produitId, 'decrement');
        });

        $(document).on('click', '.remove-btn', function (event) {
            event.preventDefault();
            const produitId = $(this).data('id');
            removeFromCart(produitId);
        });

        function updateQuantity(produitId, action) {
            $.ajax({
                url: `/panier/update-quantity/${produitId}`,
                type: 'POST',
                data: {
                    action: action,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.success) {
                        const input = $(`.quantity-input[data-id="${produitId}"]`);
                        input.val(data.newQuantity);
                        $('.total-price').text(data.newTotal + '$');
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                    }
                }
            });
        }

        function removeFromCart(produitId) {
            $.ajax({
                url: `/panier/supprimer/${produitId}`,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    if (data.success) {
                        // Supprimer l'élément du DOM
                        const cartItem = $(`.cart-item[data-id="${produitId}"]`);
                        if (cartItem.length) {
                            cartItem.remove();
                        }

                        // Mettre à jour le total
                        $('.total-price').text(data.newTotal + '$');

                        // Mettre à jour le nombre d'articles dans le panier (si affiché)
                        const cartCount = $('.cart-count');
                        if (cartCount.length) {
                            $('.icon-cart-count').text(data.cartCount);
                            cartCount.text(data.cartCount + ' produit(s)');

                            if(data.cartCount < 1){
                                $('.item-cart').hide();
                                $('.no-items-in-cart').show()
                            }
                        }

                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                    }
                }
            });
        }
    </script>

    <!-- Script pour le changement de style lors du scroll -->
    <script>
        $(document).ready(function() {
            $(this).scroll(function() {
                if ($(this).scrollTop() > 40) {
                    $(".header-nav").addClass("bg-white");
                } else {
                    $(".header-nav").removeClass("bg-white");
                }
            });
        });
    </script>

    <!-- Script pour la suppression d'un produit de la wishlist -->
    <script>
        function removeFromWishlist(wish_id) {
            event.preventDefault()
            var urlWishlistDestroy = "{{ route('wishlist.remove', ':wishlistId') }}".replace(':wishlistId', wish_id)

            Swal.fire({
                title: 'Wishlist',
                text: 'Etes-vous sûr de vouloir supprimer ce produit de votre liste de souhaits?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Oui, je suis sûr',
                cancelButtonText: 'Non, annuler',
                customClass: {
                    popup: 'bg-gray-200 dark:bg-gray-800 text-black dark:text-white rounded-lg shadow-lg', // Classes Tailwind pour le popup
                    confirmButton: 'bg-[#e38407] hover:bg-[#e38407] text-white font-bold py-2 px-4 rounded', // Bouton de confirmation
                    cancelButton: 'bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded' // Bouton d'annulation
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: urlWishlistDestroy,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(
                                'Wishlist deleted successfully');
                            Swal.fire({
                                title: 'Succès!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000,
                                timerProgressBar: true,
                                customClass: {
                                    popup: 'bg-gray-200 dark:bg-gray-800 text-black dark:text-white rounded-lg shadow-lg', // Classes Tailwind pour le popup
                                    confirmButton: 'bg-[#e38407] hover:bg-[#e38407] text-white font-bold py-2 px-4 rounded', // Bouton de confirmation
                                    cancelButton: 'bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded' // Bouton d'annulation
                                },
                            }).then(() => {
                                location.reload()
                            });
                        },
                        error: function(error) {
                            console.error('Error deleting the product:',
                                error);
                        }
                    });
                }
            });
        }
    </script>

    <!-- Fonction js pour l'ajout d'un produit a la wishlist -->
    <script>
        function addToWishList(event, productId) {
            event.preventDefault();
            let isAuthenticated = @auth true
        @else
            false
        @endauth ;
        if (isAuthenticated) {
            $.ajax({
                type: "post",
                url: "{{ route('wishlist.add') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    productId: productId
                },
                dataType: "json",
                success: function(response) {
                    if (response.count) {
                        $('.wishcount').text(response.count)
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: response.success
                        });
                    }

                    if (response.exists) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: response.exists
                        });
                    }
                }
            });
        } else {
            window.location.href = "{{ route('login') }}"
        }
        }
    </script>

    @yield('scripts')
</body>

</html>
