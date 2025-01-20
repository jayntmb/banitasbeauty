@php
    $showNavPage = false;
@endphp

@extends('layouts.master')
@section('content')
    <style>
        .text-lg:hover {
            color: #3a2a1e;
            cursor: pointer;
        }
    </style>

    <div class="banner">
        <div class="content-banner flex-column">
            <div class="img-banner">
                <img src="{{ asset('images/banners/b1.jpg') }}" alt="Bannière" class="w-100 h-100 object-fit-cover" />
            </div>
            <div class="content-text w-100 my-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-xxl-4">
                            <div class="text-start">
                                <h2 class="mb-lg-3 d-flex flex-column mt-lg-5 mt-4">
                                    <span>Glow</span>
                                    <span>Everyday</span>
                                </h2>
                                <p class="mb-lg-5">
                                    Découvrez notre nouvelle gamme de produits, spécialement formulée pour révéler votre
                                    beauté naturelle et vous faire rayonner jour après jour.
                                </p>
                                <a href="/boutique" class="btn btn-lg btn-white">Découvrir nos produits</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="move-bundel">
        <div class="content-div d-flex align-items-center">
            <div class="move-block">
                <h2 class="d-flex align-items-center mb-0">
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                </h2>
            </div>
            <div class="move-block">
                <h2 class="d-flex align-items-center mb-0">
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                    <span> Wonderful skin </span>
                    <span> * </span>
                </h2>
            </div>
        </div>
    </div>
    <div class="block-intro">
        <div class="container-fluid px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xxl-8">
                    <h3 class="text-center">
                        Des produits premium pour un maquillage professionnel
                        <div class="avatar">
                            <img src="{{ asset('images/avatars/a.jpg') }}" alt="Produits de maquillage premium Banitas">
                            <div class="video">
                                <video src="{{ asset('videos/makeup1.mp4') }}" autoplay muted playisline loop></video>
                            </div>
                        </div>
                        Découvrez notre collection exclusive qui répond à toutes vos attentes beauté
                        <div class="avatar">
                            <img src="{{ asset('images/avatars/a1.jpg') }}" alt="Soins visage naturels et efficaces">
                            <div class="video">
                                <video src="{{ asset('videos/makeup2.mp4') }}" autoplay muted playisline loop></video>
                            </div>
                        </div>
                        avec des résultats cliniquement prouvés
                        <div class="avatar">
                            <img src="{{ asset('images/avatars/a2.jpg') }}" alt="Résultats beauté prouvés">
                            <div class="video">
                                <video src="{{ asset('videos/makeup3.mp4') }}" autoplay muted playisline loop></video>
                            </div>
                        </div>
                        pour une beauté qui vous ressemble
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="block-promo-lg">
        @php
            $popularProduct = $produits->first();
        @endphp
        <div class="container-fluid px-lg-0">
            <div class="row g-lg-0 g-3">
                <div class="col-lg-6 ps-lg-0">
                    <div class="card card-img">
                        <div class="bundel">
                            Les nouveautés
                        </div>
                        <img src="{{ asset('assets/images/produits/' . $popularProduct->first_image) }}" alt="image de promotion"
                            class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-text h-100 d-flex flex-column">
                        <div class="my-auto">
                            <a href="{{ route('produit.show', $popularProduct->id) }}">
                                <h2 class="text-lg mb-lg-4 mb-3">
                                    {{ $popularProduct->nom }}
                                </h2>
                            </a>
                            <p class="paragraph-lg mb-lg-5 mb-4">
                                Découvrez la magie de <span>{{ $popularProduct->nom }} </span> notre liner sourcils
                                waterproof haute précision. Sa formule longue tenue et
                                son applicateur ultra-fin vous permettent de dessiner et structurer vos sourcils avec une
                                précision professionnelle. Résistant à l'eau et à la transpiration, il reste impeccable
                                toute la journée pour un regard parfaitement défini. Sublimez vos sourcils en toute
                                simplicité !.
                            </p>
                            <a href="{{ route('panier.store', ['id' => $popularProduct->id, 'quantite' => 1]) }}"
                                class="btn btn-lg btn-primary" onmouseover="this.style.backgroundColor='white'"
                                onmouseout="this.style.backgroundColor=''">
                                Ajouter au panier
                            </a>
                        </div>
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
                        Nos meilleures ventes
                    </h2>
                    <p class="paragraph mb-lg-5">
                        Nos best-sellers sont là pour vous offrir le meilleur de Banila's Beauty
                    </p>
                </div>
                <div class="col-lg-12 px-lg-0">
                    <div class="content-card-articles d-flex align-items-center">
                        @if ($produits->count() == 0)
                            <div class="alert alert-warning">
                                Aucun produit n'est disponible pour le moment
                            </div>
                        @else
                            @foreach ($produits->take(4) as $produit)
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
                                            <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}"
                                                alt="{{ $produit->nom }}">
                                        </a>
                                    </div>
                                    <div class="content-text mt-2 mt-lg-2">
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
                                                <a href="{{ route('panier.store', ['id' => $popularProduct->id, 'quantite' => 1]) }}"
                                                    class="btn btn-primary btn-default ms-auto disabled opacity-0">
                                                    Ajouter au panier
                                                </a>
                                            </div>
                                        </div>
                                        <div class="back">
                                            <a href="{{ route('produit.show', $produit->id) }}">
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
                                                <a href="{{ route('panier.store', ['id' => $popularProduct->id, 'quantite' => 1]) }}"
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
                            Voir plus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-black">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xxl-6">
                    <div class="text-center">
                        <h2 class="text-xxl text-white mb-lg-4 mb-3">
                            Soin de beauté <br> amour de soi
                        </h2>
                        <p class="paragraph text-white mx-auto mb-lg-4 mb-3">
                            Offrez-vous le luxe d'une peau radieuse avec nos cosmétiques. Chaque
                            application est une promesse de bien-être et de confiance. Ne laissez pas
                            passer cette chance, commandez maintenant et faites un pas vers l'amour de
                            vous-même !
                        </p>
                        <a href="#" class="btn btn-white btn-default">
                            Commander
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
                <p class="paragraph text-white mb-lg-4">Pour tout savoir de l'actualité Banita's Beauty et ses promotions ?
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
