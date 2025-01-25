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

    @auth
        {{-- OFFCANVAS PANIER --}}
        <div class="offcanvas offcanvas-end offcanvas-cart" tabindex="-1" id="offcanvasCart"
            aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="mb-0">VOTRE PANIER</h5>
                <span style="font-size: 0.85em">(2 produits)</span>
                <button type="button" class="btn-close tooltip-hover" data-bs-dismiss="offcanvas"
                    data-position-tooltip="right" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                    <span class="tooltip-indicator sm">Fermer</span>
                </button>
            </div>
            <div class="offcanvas-body">
                <div class="all-article-cart-sm">
                    <div class="card card-article-card-sm">
                        <div class="content-card">
                            <div class="row g-2 g-lg-3">
                                <div class="col-3">
                                    <div class="img-article">
                                        <img src="{{ asset('images/produits/5.jpg') }}" class="w-100"
                                            alt="image d'article">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="info-article-cart d-flex flex-column gap-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <h6 class="mb-0 name-article">
                                                Glow lips 60 Capsules
                                            </h6>
                                            <span class="stock-status in-stock">En Stock <i class="bi bi-check"></i></span>
                                            <a href="#" class="btn-trash ms-auto tooltip-hover"
                                                data-position-tooltip="right">
                                                <i class="bi bi-trash"></i>
                                                <span class="tooltip-indicator sm">Retirer</span>
                                            </a>
                                        </div>
                                        <div class="d-flex">
                                            <div class="block-content-quantity sm d-flex align-items-center">
                                                <button class="btn">
                                                    <i class="bi bi-dash"></i>
                                                </button>
                                                <input type="text" class="form-control" value="1" minlength="1">
                                                <button class="btn">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="price">
                                            8.00$
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer">
                <div class="d-flex align-items-center block-total">
                    <h6>Total:</h6>
                    <div class="total-price ms-auto">
                        8.00$
                    </div>
                </div>
                <div class="d-flex">
                    <a href="/panier" class="btn w-50 btn-default d-flex align-items-center justify-content-center">
                        Voir le panier
                    </a>
                    <a href="#" class="btn w-50 btn-default d-flex align-items-center justify-content-center">
                        Check out
                    </a>
                </div>
            </div>
        </div>
    @endauth

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
                    timer: 3000,
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
                                            <img src="${produit.image}" alt="${produit.nom}">
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
        loadCart();

        function loadCart() {
            fetch('/api/panier')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur lors du chargement du panier');
                    }
                    return response.json();
                })
                .then(data => {
                    updateCartUI(data.cartCount, data.cartItems, data.totalPrice);
                })
                .catch(error => {
                    console.error(error.message);
                });
        }

        function updateCartUI(cartCount, cartItems, totalPrice) {
            // Mettre à jour le nombre de produits
            document.querySelector('#offcanvasCart .offcanvas-header span').textContent = `(${cartCount} produits)`;

            // Mettre à jour la liste des produits
            const cartContainer = document.querySelector('.all-article-cart-sm');
            cartContainer.innerHTML = ''; // Réinitialise la liste

            cartItems.forEach(item => {
                const productHTML = `
            <div class="card card-article-card-sm">
                <div class="content-card">
                    <div class="row g-2 g-lg-3">
                        <div class="col-3">
                            <div class="img-article">
                                <img src="assets/images/produits/${item.produit.first_image}" class="w-100" alt="${item.produit.nom}">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="info-article-cart d-flex flex-column gap-2">
                                <div class="d-flex align-items-center gap-2">
                                    <h6 class="mb-0 name-article">${item.produit.nom}</h6>
                                    <span class="stock-status ${item.produit.stock > 0 ? 'in-stock' : 'out-of-stock'}">
                                        ${item.produit.stock > 0 ? 'En Stock' : 'Rupture de Stock'}
                                        <i class="bi ${item.produit.stock > 0 ? 'bi-check' : 'bi-exclamation-triangle'}"></i>
                                    </span>
                                    <a href="/panier/supprimer/${item.produit.id}" class="btn-trash ms-auto tooltip-hover" data-id="${item.id}">
                                        <i class="bi bi-trash"></i>
                                        <span class="tooltip-indicator sm">Retirer</span>
                                    </a>
                                </div>
                                <div class="d-flex">
                                    <div class="block-content-quantity sm d-flex align-items-center">
                                        <button class="btn btn-decrement" data-id="${item.id}">
                                            <i class="bi bi-dash"></i>
                                        </button>
                                        <input type="number" class="form-control quantity-input" data-id="${item.id}" value="${item.quantite}" minlength="1">
                                        <button class="btn btn-increment" data-id="${item.id}">
                                            <i class="bi bi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="price">${item.produit.prix}$</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
                cartContainer.insertAdjacentHTML('beforeend', productHTML);
            });

            // Mettre à jour le total
            document.querySelector('.total-price').textContent = `${totalPrice.toFixed(2)}$`;
            document.querySelector('.indice span').textContent = `${cartCount}`;
        }
    </script>
    <script>
        document.body.addEventListener('click', function(event) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            // Check if the clicked element is a btn-increment
            if (event.target.closest('.btn-increment')) {
                const button = event.target.closest('.btn-increment');
                updateQuantity(button.dataset.id, 1);
            }

            // Check if the clicked element is a btn-decrement
            if (event.target.closest('.btn-decrement')) {
                const button = event.target.closest('.btn-decrement');
                updateQuantity(button.dataset.id, -1);
            }

            function updateQuantity(id, change) {
                const input = $(`.quantity-input[data-id="${id}"]`);
                const newQuantity = parseInt(input.val()) + change;

                if (newQuantity < 1) {
                    Toast.fire({
                        icon: 'error',
                        title: 'La quantité ne peut pas être inférieure à 1.'
                    });
                    return;
                }

                // Requête AJAX
                $.ajax({
                    url: '/panier/update-quantity',
                    method: 'POST',
                    data: {
                        id: id,
                        quantite: newQuantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            input.val(newQuantity); // Met à jour la valeur dans l'input
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });

                            const totalPriceElement = $('.total-price');
                            if (totalPriceElement.length) {
                                totalPriceElement.text(`${data.new_total}$`);
                            }
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.message
                            });
                        }
                    },
                    error: function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Une erreur est survenue.'
                        });
                    }
                });
            }
        });
    </script>
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
    @livewireScripts
    @yield('scripts')
</body>

</html>
