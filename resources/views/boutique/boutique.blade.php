@php
    $showNavPage = true;
@endphp

@extends('layouts.master')
@section('content')
    <div class="block-article-slide lg">
        <div class="container-fluid px-lg-4">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <h2 class="title mb-lg-4 mb-3">
                        Nos produits
                    </h2>
                    <div class="row g-2 mb-lg-5 mb-3 align-items-center">
                        <div class="col-lg-6">
                            <div class="d-flex">
                                <div class="filter-gategory d-flex align-items-center gap-2">
                                    <a href="#" class="link-filter active">Tous</a>
                                    <a href="#" class="link-filter">Lèvres</a>
                                    <a href="#" class="link-filter">Yeux</a>
                                    <a href="#" class="link-filter">Bonus</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 ms-auto">
                            <div class="d-flex justify-content-lg-end">
                                <div class="block-search d-flex align-items-center">
                                    <input type="search" class="search-input form-control" placeholder="Recherche">
                                    <div class="icon">
                                        <a href="">
                                            <i class="bi bi-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-lg-2 g-xl-4 g-3 products-section">
                        @foreach ($produits as $produit)
                            <div class="col-lg-4 col-xl-3">
                                <div class="card card-article">
                                    <div class="card-img">
                                        <a href="" onclick="addToWishList(event, {{ $produit->id }})" class="like tooltip-hover" data-position-tooltip="right">
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
                            </div>
                        @endforeach
                    </div>
                    <nav aria-label="Page navigation example" class="mt-lg-5 mt-5 flex items-center justifce">
                        <ul class="pagination flex justify-center items-center gap-5">
                            {{ $produits->links('pagination::bootstrap-5') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="block-article-slide pt-0">
        <div class="container-fluid px-lg-0">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <h2 class="title">
                        Découvrez nos arrivages
                    </h2>
                    <p class="pargraph mb-lg-4 mb-3">
                        Découvrez ici nos nouveaux produits
                    </p>
                </div>
                <div class="col-lg-11">
                    <ul class="nav nav-tabs tab-indicator gap-lg-4 gap-2 mb-lg-4 mb-4" id="myTab" role="tablist">
                        @php
                            $firstCategorie = $categories->first();
                        @endphp
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-1" data-bs-toggle="tab" data-bs-target="#tab-pane-1"
                                type="button" role="tab" aria-controls="tab-pane-2" aria-selected="true">
                                {{ $firstCategorie->libelle }}
                            </button>
                        </li>
                        @foreach ($categories->skip(1) as $category)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tab-2" data-bs-toggle="tab"
                                    data-bs-target="#tab-pane-2" type="button" role="tab"
                                    aria-controls="tab-pane-2" aria-selected="false">
                                    {{ $category->libelle }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-12 px-lg-0">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="tab-pane-1" role="tabpanel" aria-labelledby="tab-1"
                            tabindex="0">
                            <div class="content-card-articles d-flex align-items-center">
                                @if ($arrivages->isEmpty())
                                    <div class="alert alert-info w-100">
                                        Aucun arrivage disponible
                                    </div>
                                @else
                                    @foreach ($arrivages as $arrivage)
                                        <div class="card card-article">
                                            <div class="card-img">
                                                <img src="{{ asset($arrivage->image) }}" alt="{{ $arrivage->nom }}">
                                            </div>
                                            <div class="content-text mt-2 mt-lg-2">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('panier.store', ['id' => $arrivage->id, 'quantite' => 1]) }}"
                                                        class="btn btn-primary btn-default">
                                                        Ajouter au panier
                                                    </a>
                                                    <a href="#" class="link ms-auto">
                                                        <span>Aperçu rapide</span>
                                                        <span>Aperçu rapide</span>
                                                        <span>Aperçu rapide</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @foreach ($categories->skip(1) as $categorie)
                            <div class="tab-pane" id="tab-pane-2" role="tabpanel" aria-labelledby="tab-2"
                                tabindex="0">
                                <div class="content-card-articles d-flex align-items-center">
                                    @if ($arrivages->isEmpty())
                                        <div class="alert alert-info w-100">
                                            Aucun arrivage disponible
                                        </div>
                                    @else
                                        @foreach ($arrivages as $arrivage)
                                            <div class="card card-article">
                                                <div class="card-img">
                                                    <img src="{{ asset($arrivage->image) }}" alt="{{ $arrivage->nom }}">
                                                </div>
                                                <div class="content-text mt-2 mt-lg-2">
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ route('panier.store', ['id' => $arrivage->id, 'quantite' => 1]) }}"
                                                            class="btn btn-primary btn-default">
                                                            Ajouter au panier
                                                        </a>
                                                        <a href="#" class="link ms-auto">
                                                            <span>Aperçu rapide</span>
                                                            <span>Aperçu rapide</span>
                                                            <span>Aperçu rapide</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-promo-lg pb-0 reverse">
        <div class="container-fluid px-lg-0">
            <div class="row g-lg-0 g-3">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="content-text h-100 d-flex flex-column">
                        <div class="my-auto">
                            <h2 class="text-lg mb-lg-4 mb-3">
                                Sleepy Eye Glow
                            </h2>
                            <p class="paragraph-lg mb-lg-5 mb-4">
                                Sublimez votre regard avec <span>Sleepy Eye
                                    Glow </span> et redonnez vie à votre regard en une
                                seule application avec des produits qui
                                vont vous aider à illuminer votre regard.
                            </p>
                            <a href="#" class="btn btn-lg btn-primary mb-4">
                                Ajouter au panier
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 order-1 order-lg-2">
                    <div class="card card-img">
                        <img src="{{ asset('images/promotions/7.jpg') }}" alt="image de promotion"
                            class="w-100 h-100 object-fit-cover">
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
