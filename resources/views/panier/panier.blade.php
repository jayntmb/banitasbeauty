@php
$showNavPage = true;
@endphp

@extends('layouts.master')
@section('content')
<div class="block-cart">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card card-cart">
                    <div class="d-flex align-items-center mb-lg-3 mb-3">
                        <h1 class="text-lg mb-0">Panier</h1>
                        <a href="{{ route('empty.cart') }}" class="ms-auto link">
                            <span>Vider le panier</span>
                            <span>Vider le panier</span>
                            <span>Vider le panier</span>
                        </a>
                    </div>
                    <div class="row">
                        <div class="card no-items-in-cart" style="display: none">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <p>Votre panier est vide pour l'instant !</p>
                                </div>
                            </div>
                        </div>
                        @if (count($cart) == 0)
                            <div class="card card-product-cart">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <p>Votre panier est vide pour l'instant !</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            @foreach ($cart as $item)
                                <div class="col-12 cart-item" data-id="{{ $item['id'] }}">
                                    <div class="card item-cart">
                                        <div class="row g-lg-4 g-xl-5 g-2 align-items-center">
                                            <div class="col-lg-2 col-4">
                                                @if ($item['details']['first_image'])
                                                    <div class="img-article">
                                                        <img src="{{ asset('storage/images/produits/' . $item['details']['first_image']) }}"
                                                            class="w-100 h-100 object-fit-cover"
                                                            alt="{{ $item['details']['nom'] }}">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-5 col-8">
                                                <h3 class="name-article">
                                                    {{ $item['details']['nom'] }}
                                                </h3>
                                                <div class="price">{{ $item['details']['prix'] }}$</div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="d-flex">
                                                    <div class="d-flex align-items-center block-content-quantity sm">
                                                        <button class="btn decrement-btn">
                                                            <i class="bi bi-dash"></i>
                                                        </button>
                                                        <input type="text" class="form-control quantity-input" minlength="1"
                                                            value="{{ $item['quantite'] }}" data-id="{{ $item['id'] }}">
                                                        <button class="btn increment-btn">
                                                            <i class="bi bi-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="d-flex align-items-lg-center justify-content-lg-center">
                                                    <a href="#" class="btn-trash ms-auto tooltip-hover remove-btn" data-position-tooltip="right"
                                                        data-id="{{ $item['id'] }}">
                                                        <i class="bi bi-trash"></i>
                                                        <span class="tooltip-indicator sm">Retirer</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12">
                                <div class="card item-cart">
                                    <div class="row align-items-center g-2">
                                        <div class="col-lg-8">
                                            <div class="d-flex align-items-center justify-content-start gap-2">
                                                <p class="paragraph mb-0">Total:</p>
                                                <div class="price total-price lg">
                                                    {{ session('cart_total_amount') }}$
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="d-flex justify-content-end">
                                                <a href="{{ route('panier.valide') }}"
                                                    class="btn btn-primary btn-lg">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="block-black">
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
</div> --}}
{{-- <div class="newsletter">
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
</div> --}}

<div class="block-card-descrip">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-lg-5">
                    <h2 class="title">Pourquoi choisir nos produits ?</h2>
                    <p class="paragraph">Découvrez les avantages qui font la différence</p>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-3">
                <div class="card">
                    <div class="icon mb-3">
                        <i class="bi bi-gem"></i>
                    </div>
                    <h5 class="mb-2">Qualité Premium</h5>
                    <p>Nos produits sont fabriqués selon les plus hauts standards de l'industrie cosmétique, avec des
                        matières premières rigoureusement sélectionnées pour leur excellence.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="icon mb-3">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <h5 class="mb-2">Ingrédients Naturels</h5>
                    <p>Chaque formule contient un minimum de 95% d'ingrédients d'origine naturelle, soigneusement
                        choisis pour leurs propriétés bienfaisantes et leur efficacité prouvée.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="icon mb-3">
                        <i class="bi bi-patch-check"></i>
                    </div>
                    <h5 class="mb-2">Sécurité Garantie</h5>
                    <p>Tous nos produits subissent des tests dermatologiques rigoureux dans des laboratoires certifiés,
                        garantissant une tolérance optimale pour tous les types de peau.</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="icon mb-3">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h5 class="mb-2">Résultats Prouvés</h5>
                    <p>Les études cliniques démontrent l'efficacité de nos produits, avec des résultats visibles dès les
                        premières utilisations et une satisfaction client supérieure à 95%.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
