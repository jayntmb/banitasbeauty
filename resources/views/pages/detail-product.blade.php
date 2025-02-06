@extends('layouts.master', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
<div class="banner-sm" id="home">
    <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
    <div class="container">
        <h1 class="fadeUp wow animate__animated animate__fadeIn">Detail produit</h1>
    </div>
</div>
<div class="block-detail-product">
    <a href="{{ route('detal-product', $previousProduit) }}" class="btn-page prev">
        <i class="bi bi-arrow-left"></i>
    </a>
    <a href="{{ route('detal-product', $nextProduit) }}" class="btn-page next">
        <i class="bi bi-arrow-right"></i>
    </a>
    <div class="container">
        <div class="row g-lg-5 g-3">
            <div class="col-lg-6">
                <div id="carouselExampleIndicators-1" class="carousel slide" data-bs-ride="true">
                    {{-- Ici tu vas afficher les produits equipéments --}}
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="block-img-prod">
                                <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}"
                                    alt="Photo de" class="img-product">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="block-img-prod">
                                <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}"
                                    alt="Photo de" class="img-product">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="block-img-prod">
                                <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}"
                                    alt="Photo de" class="img-product">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators-1" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1">
                            <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}" alt="Photo de"
                                class="img-product">
                        </button>
                        <button type="button" data-bs-target="#carouselExampleIndicators-1" data-bs-slide-to="1"
                            aria-label="Slide 2">
                            <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}" alt="Photo de"
                                class="img-product">
                        </button>
                        <button type="button" data-bs-target="#carouselExampleIndicators-1" data-bs-slide-to="2"
                            aria-label="Slide 3">
                            <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}" alt="Photo de"
                                class="img-product">
                        </button>
                    </div>
                    {{-- Ici tu vas afficher les produits médicament et autres --}}
                    {{-- <div class="block-img-prod">
                        <img src="{{ asset('storage/images/produits/'.$produit->first_image) }}" alt="Photo de"
                            class="img-product">
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <h2>{{ $produit->nom }}</h2>
                <h5>{{ $produit->categorie?->libelle }}</h5>
                <p>{{ substr($produit->description, 0, strlen($produit->description) / 3) }}...</p>
                {{-- <h4>Indications</h4>
                <p>{{ $produit->posologie }}</p>

                @if ($produit->fichier != null)
                <div>
                    <h4>Fichier joint</h4>
                    <a href="{{ asset('storage/images/produits/fichier/' . $produit->fichier) }}" target="_blanck"
                        type="application" download="">
                        Cliquez ici pour télecharger
                    </a>
                </div>
                @endif --}}
                <h6>Quantité</h6>
                <form method="post" action="{{ route('panier.store.product') }}">
                    @csrf
                    <input type="hidden" name="produit_id" class="form-control" value="{{ $produit->id }}">
                    <div class="block-quantity d-flex align-items-center">
                        <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id ?? '' }}">
                        <button type="button" class="btn btn_moins">-</button>
                        <input type="text" name="quantite" class="form-control" value="1" id="quantity"
                            onkeypress="isNumber(event)">
                        <button type="button" class="btn btn_plus">+</button>
                    </div>
                    <input type="submit" class="btn btn-cart" value="Ajouter au panier" />
                </form>
            </div>
            <div class="col-lg-12">
                <ul class="nav nav-tabs nav-switch mt-3  mt-md-5 mb-3 mb-md-4 p-0 nav-product justify-content-start"
                    id="myTab" role="tablist" style="background: none;">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane-1" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane-1" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">Posologie</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane-3" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">Vidéo
                            explicative</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane-4" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false" tabindex="-1">Notice</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane-1" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        <div class="block-info-user">
                            <div class="block-info-user">
                                <p> {{ $produit->description }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane-1" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <div class="block-info-user">
                            <p>{{ $produit->posologie }}</p>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane-3" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        @if ($produit->video)
                            <div class="block-video">
                                <video src="{{ asset('storage/images/produits/video/' . $produit->video) }}"
                                    controls></video>
                            </div>
                        @else
                            <p>Aucune vidéo pour ce Produit</p>
                        @endif
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane-4" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        @if ($produit->fichier)
                            <p>
                                Ci-joint, le document de la Notice du Produit
                            </p>
                            <a href="{{ asset('storage/images/produits/fichier/' . $produit->fichier) }}" target="_blanck"
                                class="link ">
                                <i class="bi bi-download me-1"></i>
                                Téléchager le Pdf
                            </a>
                        @else
                            <p>Aucun document</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{--
<script>
    const input_value = $('.form-control').attr('value');
    btnplus = document.querySelector(".btn-plus");
    btnplus = document.querySelector(".btn-moins");
    console.log(input_value);
    btnplus.addEventListener("click", () => {
        alert("coucou")
        input_value++
    })
</script> --}}
@endsection