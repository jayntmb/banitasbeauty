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
                    Favoris
                </h2>
                <div class="row g-lg-2 g-xl-4">
                    @if ($wishlists->count() > 0)
                        @foreach ($wishlists as $item)
                            <div class="col-lg-4 col-xl-3">
                                <div class="card card-article">
                                    <div class="card-img">
                                        <a href="" onclick="removeFromWishlist({{ $item->id }})"
                                            class="like tooltip-hover liked" data-position-tooltip="right">
                                            <svg viewBox="0 0 24 24" width="512" height="512">
                                                <path
                                                    d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z" />
                                            </svg>
                                            <span class="tooltip-indicator sm">Retirer de favoris</span>
                                        </a>
                                        <a href="{{ route('produit.show', $item->produit->id) }}">
                                            <img src="{{ asset('/storage/images/produits/' . $item->produit->first_image) }}"
                                                alt="image d'article">
                                        </a>
                                    </div>
                                    <div class="content-text mt-2 mt-lg-2">
                                        <div class="face">
                                            <a href="/detail-produit">
                                                <h3 class="mb-lg-2">{{ $item->produit->nom }}</h3>
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
                                                    ${{ $item->produit->prix }}
                                                </div>
                                                <a href="#" class="btn btn-primary btn-default ms-auto disabled opacity-0">
                                                    Ajouter au panier
                                                </a>
                                            </div>
                                        </div>
                                        <div class="back">
                                            <a href="/detail-produit">
                                                <h3 class="mb-lg-2">{{ $item->produit->nom }}</h3>
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
                                                    ${{ $item->produit->prix }}
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center ">
                                                <a href="#" class="btn btn-primary btn-default">
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
                    @else
                        <div class="text-center">
                            <p>
                                Vous n'avez ajouté aucun produit dans votre liste de favoris pour l'instant.
                            </p>
                            <a href="{{ route('produits') }}" class="btn btn-dark p-4 text-center">Explorer les
                                produits</a>
                        </div>
                    @endif
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
