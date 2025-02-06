@php
    $showNavPage = true;
@endphp

@extends('layouts.master')
@section('content')
<div class="block-detail-product">
    <div class="container-fluid px-lg-5">
        <div class="row g-lg-3 g-3">
            <div class="col-lg-6">
                <div class="block-sticky-carousel">
                    <div id="carouselExampleIndicators" data-bs-ride="carousel"
                        class="carousel slide carousel-img-article">
                        <div class="carousel-indicators gap-lg-2 gap-2">
                            @if ($produit->first_image)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1">
                                    <div class="img-sm">
                                        <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}"
                                            class="w-100" alt="{{ $produit->nom }}">
                                    </div>
                                </button>
                            @endif
                            @if ($produit->second_image)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2">
                                    <div class="img-sm">
                                        <img src="{{ asset('storage/images/produits/' . $produit->second_image) }}"
                                            class="w-100" alt="{{ $produit->nom }}">
                                    </div>
                                </button>
                            @endif
                            @if ($produit->third_image)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3">
                                    <div class="img-sm">
                                        <img src="{{ asset('storage/images/produits/' . $produit->third_image) }}"
                                            class="w-100" alt="{{ $produit->nom }}">
                                    </div>
                                </button>
                            @endif
                            @if ($produit->video)
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                    aria-label="Slide 4">
                                    <div class="img-sm">
                                        <i class="bi bi-play-circle-fill fs-1"></i>
                                    </div>
                                </button>
                            @endif
                        </div>

                        <div class="carousel-inner">
                            @if ($produit->first_image)
                                <div class="carousel-item active">
                                    <div class="img-article">
                                        <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}"
                                            class="w-100" alt="{{ $produit->nom }}">
                                    </div>
                                </div>
                            @endif
                            @if ($produit->second_image)
                                <div class="carousel-item">
                                    <div class="img-article">
                                        <img src="{{ asset('storage/images/produits/' . $produit->second_image) }}"
                                            class="w-100" alt="{{ $produit->nom }}">
                                    </div>
                                </div>
                            @endif
                            @if ($produit->third_image)
                                <div class="carousel-item">
                                    <div class="img-article">
                                        <img src="{{ asset('storage/images/produits/' . $produit->third_image) }}"
                                            class="w-100" alt="{{ $produit->nom }}">
                                    </div>
                                </div>
                            @endif
                            @if ($produit->video)
                                <div class="carousel-item">
                                    <div class="img-article">
                                        <video class="w-100" controls>
                                            <source src="{{ asset('storage/images/produits/video/' . $produit->video) }}"
                                                type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <button class="carousel-control-prev btn-carousel" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <button class="carousel-control-next btn-carousel" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-detail-article card">
                    <h1 class="mb-lg-4">
                        BANITA’S BEAUTY
                    </h1>
                    <div class="row g-lg-4 g-3">
                        <div class="col-lg-8">
                            <div class="name-product fw-bold" style="font-family: monospace">
                                {{ $produit->nom }}
                            </div>
                            <div class="price">
                                {{ $produit->prix }}$
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <a href="#" class="like-lg ms-lg-auto tooltip-hover" data-position-tooltip="right">
                                <svg viewBox="0 0 24 24" width="512" height="512">
                                    <path
                                        d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z" />
                                </svg>
                                <span class="tooltip-indicator">Ajouter aux favoris</span>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center gap-2">
                                <div class="label">
                                    Couleurs :
                                </div>
                                <div class="block-colors d-flex align-items-center gap-2">
                                    <div class="bubble-color" style="--data-bg: #d47755">
                                        <input type="radio" name="radio-color-1">
                                        <div class="circle-active"></div>
                                    </div>
                                    <div class="bubble-color" style="--data-bg: #ff96b5">
                                        <input type="radio" name="radio-color-1">
                                        <div class="circle-active"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Evaluation des produits -->
                        @livewire('product-rating', ['productId' => $produit->id])

                        <div class="col-12">
                            <p class="paragraph sm mb-0">
                                Taxes incluses. Frais d'expédition calculés à l'étape de paiement.
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="mb-1">Quantité</p>
                            <div class="d-flex">
                                <div class="block-content-quantity d-flex align-items-center">
                                    <button class="btn btnQte" onclick="updateQuantity(this, -1)">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="text" id="quantityInput" class="form-control" value="1" minlength="1"
                                        min="1">
                                    <button class="btn btnQte" onclick="updateQuantity(this, 1)">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="#" id="addToCartLink" class="btn btn-lg btn-primary w-100" onclick="addToCart()">
                                Ajouter au panier
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="accordion accordion-detail" id="accordionExample">
                                <div class="accordion-produit">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button d-flex align-items-center collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="true" aria-controls="collapseTwo">
                                            Description
                                            <span class="icon">
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-2 pt-0">
                                            <p class="paragraph sm">
                                                {{ $produit->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-produit">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button d-flex align-items-center" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Usages
                                            <span class="icon">
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-2 pt-0">
                                            <ul class="ps-3 list">
                                                <li>
                                                    Sublimez votre regard avec Sleepy Eye Glow et redonnez vie à
                                                    votre regard en une seule application
                                                </li>
                                                <li>
                                                    Avec des produits qui vont vous aider à illuminer votre regard.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-produit">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button d-flex align-items-center collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Informations additionnelles
                                            <span class="icon">
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body p-2 pt-0">
                                            <p class="paragraph sm">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate
                                                cumque rem beatae, delectus ratione commodi quam accusantium sit.
                                                Tenetur molestiae omnis voluptas, porro ratione fugit fuga magnam
                                                voluptates labore recusandae.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row g-lg-2 g-2">
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center gap-lg-2 gap-2 produit">
                                        <div class="icon">
                                            <i class="bi bi-credit-card"></i>
                                        </div>
                                        <span>Paiement sécurisé</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center gap-lg-2 gap-2 produit">
                                        <div class="icon">
                                            <i class="bi bi-truck"></i>
                                        </div>
                                        <span>Livraison gratuite </span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="d-flex align-items-center gap-lg-2 gap-2 produit">
                                        <div class="icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                        <span>100% Bio</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-article-slide bg-light">
    <div class="container-fluid px-lg-0">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <h2 class="title mb-lg-5 mb-4">
                    Produits similaires
                </h2>
            </div>
            <div class="col-lg-12 px-lg-0">
                <div class="content-card-articles d-flex align-items-center">
                    @foreach ($productsInSameCategory as $produit)
                        <div class="card card-article">
                            <div class="card-img">
                                <div class="bundel">
                                    Meilleure vente
                                </div>
                                <a href="" class="like tooltip-hover" data-position-tooltip="right">
                                    <svg viewBox="0 0 24 24" width="512" height="512">
                                        <path
                                            d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z" />
                                    </svg>
                                    <span class="tooltip-indicator sm">Ajouter aux favoris</span>
                                </a>
                                <a href="{{ route('produit.show', $produit->id) }}">
                                    <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}"
                                        alt="{{ $produit->nom }}">
                                </a>
                            </div>
                            <div class="content-text mt-lg-2">
                                <div class="face">
                                    <a href="{{ route('produit.show', $produit->id) }}">
                                        <h3 class="mb-lg-2">{{ $produit->nom }}</h3>
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
                                            {{ $produit->prix }}$
                                        </div>
                                        <a href="{{ route('panier.store', ['id' => $produit->id, 'quantite' => 1]) }}"
                                            class="btn btn-primary btn-default ms-auto disabled opacity-0">
                                            Ajouter au panier
                                        </a>
                                    </div>
                                </div>
                                <div class="back">
                                    <a href="{{ route('produit.show', $produit->id) }}">
                                        <h3 class="mb-lg-2">{{ $produit->nom }}</h3>
                                    </a>
                                    <div class="d-flex align-items-center mb-lg-2">
                                        <div class="block-colors d-flex align-items-center gap-2">
                                            <div class="bubble-color" style="--data-bg: #d47755">
                                                <input type="radio" name="radio-color-1">
                                                <div class="circle-active"></div>
                                            </div>
                                            <div class="bubble-color" style="--data-bg: #ff96b5">
                                                <input type="radio" name="radio-color-1">
                                                <div class="circle-active"></div>
                                            </div>
                                        </div>
                                        <div class="price ms-auto">
                                            {{ $produit->prix }}$
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <a href="{{ route('panier.store', ['id' => $produit->id, 'quantite' => 1]) }}"
                                            class="btn btn-primary btn-default">
                                            Ajouter au panier
                                        </a>
                                        <div class="d-flex block-rate align-items-center gap-2 ms-auto">
                                            <i class="bi bi-star-fill active"></i>
                                            <i class="bi bi-star-fill active"></i>
                                            <i class="bi bi-star-fill active"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12">
                <div class="text-center mt-lg-5 mt-4">
                    <a href="/boutique" class="btn btn-lg btn-primary">
                        Voir plus
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-black">
    <div class="container-fluid">
        @livewire('block-black-display')
    </div>
</div>
<div class="newsletter">
    <div class="container">
        <div class="col-lg-6">
            <h3 class="text-white">
                Abonnez-vous a notre Newsletter
            </h3>
            <p class="paragraph text-white mb-lg-4">Pour tout savoir de l’actualité Banita’s Beauty et ses promotions ?
            </p>
            <form action="#">
                <div class="content-form d-flex align-items-center">
                    <input type="text" class="form-control" placeholder="Votre adresse e-mail">
                    <button class="btn btn-primary btn-default">
                        S'abonner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function updateQuantity(button, change) {
        const input = button.parentElement.querySelector('.form-control');
        const newValue = Math.max(1, parseInt(input.value) + change); // Minimum value is 1
        input.value = newValue;
        updateCartLink(); // Mettre à jour le lien après chaque changement de quantité
    }

    function updateCartLink() {
        const quantityInput = document.getElementById('quantityInput');
        const addToCartLink = document.getElementById('addToCartLink');
        const baseUrl = "{{ route('panier.store', ['id' => $produit->id, 'quantite' => 'QUANTITY_PLACEHOLDER']) }}";
        const newUrl = baseUrl.replace('QUANTITY_PLACEHOLDER', quantityInput.value);
        addToCartLink.href = newUrl;
    }

    function addToCart() {
        updateCartLink(); // S'assurer que le lien est à jour avant la redirection
        window.location.href = document.getElementById('addToCartLink').href;
    }

    // Initialiser le lien au chargement de la page
    document.addEventListener('DOMContentLoaded', function () {
        updateCartLink();
    });
</script>
@endsection
