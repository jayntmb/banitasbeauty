@php
    $showNavPage = true;
@endphp

@extends('layouts.master')
@section('content')
<div class="block-about">
    <div class="container">
        <div class="row g-lg-4 g-xl-5 align-items-center">
            <div class="col-lg-6">
                <div class="card card-about">
                    <img src="{{ asset('images/autres/pikaso.jpeg') }}" alt="image illustrative"
                        class="w-100 h-100 object-fit-cover">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-text pe-lg-5 pe-0">
                    <h2 class="text-lg mb-lg-4 mb-3">
                        Bienvenue chez Banita's Beauty
                    </h2>
                    <p class="paragraph-lg">
                        Découvrez Banita's Beauty, votre nouvelle destination beauté de confiance pour des cosmétiques
                        naturels de qualité.
                        Fondée en 2022, Banita's Beauty est une jeune marque qui souhaite sublimer votre beauté
                        naturelle tout en
                        respectant votre peau et l'environnement. Nos produits, développés par des experts en
                        cosmétologie, allient tradition et innovation pour des résultats visibles dès
                        la première utilisation.
                    </p>
                    <p class="paragraph-lg">
                        Animés par notre passion pour une beauté authentique, nous créons des soins premium
                        composés d'ingrédients biologiques minutieusement sélectionnés. Notre collection signature
                        <span>Sleepy Eye Glow</span> propose un soin contour des yeux aux formules enrichies
                        d'actifs végétaux précieux. Faites confiance à Banita's Beauty pour révéler votre éclat naturel
                        avec des soins efficaces, éthiques et adaptés à toutes les carnations.
                    </p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-card-descrip">
    <div class="container">
        <h2 class="text-lg mb-lg-4 mb-3 text-center">
            Pourquoi choisir nos produits ?
        </h2>
        <div class="row g-lg-4 g-xl-5">
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="icon mb-lg-3 mb-2">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <h5>Paiement 100% Sécurisé</h5>
                    <p>
                        Effectuez vos achats en toute tranquillité grâce à notre système de paiement crypté et sécurisé.
                        Nous acceptons plusieurs modes de paiement pour votre confort, avec une protection maximale de
                        vos données bancaires.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="icon mb-lg-3 mb-2">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h5>Livraison Express Gratuite</h5>
                    <p>
                        Profitez de notre service de livraison rapide et gratuite partout en RDC. Nous garantissons une
                        expédition soignée de vos produits cosmétiques avec un suivi en temps réel de votre commande.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="icon mb-lg-3 mb-2">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5>Formules 100% Naturelles</h5>
                    <p>
                        Nos produits sont formulés exclusivement avec des ingrédients naturels et biologiques certifiés.
                        Sans parabens, sans sulfates et non testés sur les animaux, ils respectent votre peau et
                        l'environnement.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-article-slide">
    <div class="container-fluid px-lg-0 ">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <h2 class="title mb-lg-3">
                    Nos bons plans
                </h2>
                <p class="paragraph mb-lg-5">
                    Découvrez nos offres exclusives et promotions spéciales pour prendre soin de vous à petits prix
                </p>
            </div>
            <div class="col-lg-12 px-lg-0">
                <div class="content-card-articles d-flex align-items-center">
                    @if ($promoProduits->isEmpty())
                        <div class="alert alert-warning w-100" role="alert">
                            Aucun produit en promotion pour le moment.
                        </div>
                    @else
                        @foreach ($promoProduits as $produit)
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
                                    <a href="detail-product.html">
                                        <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}"
                                            alt="{{ $produit->nom }}">
                                    </a>
                                </div>
                                <div class="content-text mt-2 mt-lg-2">
                                    <div class="face">
                                        <a href="detail-product.html">
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
                                        <a href="detail-product.html">
                                            <h3 class="mb-lg-2">{{ $produit->nom }}</h3>
                                        </a>
                                        <div class="d-flex align-items-center mb-2 mb-lg-2">
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
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="text-center mt-lg-5 mt-4">
                    <a href="/boutique" class="btn btn-lg btn-primary">
                        Voir tous nos produits
                    </a>
                </div>
            </div>
        </div>
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
