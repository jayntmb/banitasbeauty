@extends('layouts.master', ['contentSearchBar' => false])

@section('style')
@endsection

@section('body')
    <div class="global-div">
        <div class="wrapper">
            <div class="loading">
                <div id="loader"></div>
            </div>

            <div class="banner-sm" id="home">
                <div class="content-img">
                    <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
                </div>
                <div class="container">
                    <h1 class="fadeUp wow animate__animated animate__fadeIn">Nos produits</h1>
                </div>

            </div>
            <div class="block_1 all-products" id="service">
                <div class="container">
                    <div class="col-12 col-md-12 col-lg-12 me-auto ms-auto">
                        <h2 class="text-center mb-5 fadeUp wow animate__animated animate__fadeIn">
                            Matériel de diagnostic, équipement médical et accessoires
                        </h2>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <div class="row g-lg-5 g-3">
                                @foreach ($produits as $produit)
                                    <div class="col-lg-3 col-md-6 col-6">
                                        <div class="card fadeUp wow animate__animated animate__fadeIn">
                                            {{-- @if (Auth::user() &&
    Auth::user()->paniers->where('produit_id', $produit->id)->count() != 0)
                                        <a href="{{ route('panier.store', [$produit->id, 1]) }}" class="in-cart">
                                            <i class="bi bi-bag"></i>
                                            {{ $produit->paniers->where('user_id', Auth::user()->id)->first()->quantite }}
                                        </a>
                                    @endif --}}
                                            {{-- <a href="{{ route('panier.store', [$produit->id, '1']) }}" class="card-sm">
                                        <i class="fas fa-plus"></i>
                                    </a> --}}
                                            <a href="{{ route('detal-product', [$produit->id]) }}">
                                                <div class="img-article">
                                                    <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}"
                                                        alt="">
                                                </div>
                                                <div class="text-center">
                                                    <h4>{{ $produit->nom }}</h4>
                                                    <span>{{ $produit->categorie->libelle }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row justify-content-between mt-4">
                                    <div class="col-5  me-auto ms-auto ">

                                    </div>
                                    <style>
                                        .page-item.active .page-link {
                                            z-index: 3;
                                            color: #fff;
                                            background-color: #16562a;
                                            border-color: #0d6efd;
                                        }
                                    </style>
                                    <div class="col-5  2 me-auto ms-auto  ">
                                        <h2 class="text-center mb-5 fadeUp wow animate__animated animate__fadeIn">
                                            {{ $produits->links() }}
                                        </h2>
                                    </div>
                                    <div class="col-2  me-auto ms-auto ">

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!--  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">-->
                    <!--      <div class="row g-lg-5 g-3">-->
                    <!--        @foreach ($produits as $produit)
    -->
                    <!--        <div class="col-lg-3 col-md-6 col-6">-->
                    <!--            <div class="card fadeUp wow animate__animated animate__fadeIn">-->
                    <!--                {{-- @if (Auth::user() &&
    Auth::user()->paniers->where('produit_id', $produit->id)->count() != 0)-->
                    <!--                    <a href="{{ route('panier.store', [$produit->id, 1]) }}" class="in-cart">-->
                    <!--                        <i class="bi bi-bag"></i>-->
                    <!--                        {{ $produit->paniers->where('user_id', Auth::user()->id)->first()->quantite }}-->
                    <!--                    </a>-->
                    <!--                @endif --}}-->
                    <!--                {{-- <a href="{{ route('panier.store', [$produit->id, '1']) }}" class="card-sm">-->
                    <!--                    <i class="fas fa-plus"></i>-->
                    <!--                </a> --}}-->
                    <!--                <a href="{{ route('detal-product', [$produit->id]) }}">-->
                    <!--                    <div class="img-article">-->
                    <!--                        <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}" alt="">-->
                    <!--                    </div>-->
                    <!--                    <div class="text-center">-->
                    <!--                        <h4>{{ $produit->nom }}</h4>-->
                    <!--                        <span>{{ $produit->categorie->libelle }}</span>-->
                    <!--                    </div>-->
                    <!--                </a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--
    @endforeach-->
                    <!--</div>-->
                    <!--  </div>-->
                    <!--  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">-->
                    <!--      <div class="row g-lg-5 g-3">-->
                    <!--    @foreach ($produits as $produit)
    -->
                    <!--        <div class="col-lg-3 col-md-6 col-6">-->
                    <!--            <div class="card fadeUp wow animate__animated animate__fadeIn">-->
                    <!--                {{-- @if (Auth::user() &&
    Auth::user()->paniers->where('produit_id', $produit->id)->count() != 0)-->
                    <!--                    <a href="{{ route('panier.store', [$produit->id, 1]) }}" class="in-cart">-->
                    <!--                        <i class="bi bi-bag"></i>-->
                    <!--                        {{ $produit->paniers->where('user_id', Auth::user()->id)->first()->quantite }}-->
                    <!--                    </a>-->
                    <!--                @endif --}}-->
                    <!--                {{-- <a href="{{ route('panier.store', [$produit->id, '1']) }}" class="card-sm">-->
                    <!--                    <i class="fas fa-plus"></i>-->
                    <!--                </a> --}}-->
                    <!--                <a href="{{ route('detal-product', [$produit->id]) }}">-->
                    <!--                    <div class="img-article">-->
                    <!--                        <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}" alt="">-->
                    <!--                    </div>-->
                    <!--                    <div class="text-center">-->
                    <!--                        <h4>{{ $produit->nom }}</h4>-->
                    <!--                        <span>{{ $produit->categorie->libelle }}</span>-->
                    <!--                    </div>-->
                    <!--                </a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--
    @endforeach-->
                    <!--</div>-->
                    <!--  </div>-->
                    <!--  <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">-->
                    <!--      <div class="row g-lg-5 g-3">-->
                    <!--    @foreach ($produits as $produit)
    -->
                    <!--        <div class="col-lg-3 col-md-6 col-6">-->
                    <!--            <div class="card fadeUp wow animate__animated animate__fadeIn">-->
                    <!--                {{-- @if (Auth::user() &&
    Auth::user()->paniers->where('produit_id', $produit->id)->count() != 0)-->
                    <!--                    <a href="{{ route('panier.store', [$produit->id, 1]) }}" class="in-cart">-->
                    <!--                        <i class="bi bi-bag"></i>-->
                    <!--                        {{ $produit->paniers->where('user_id', Auth::user()->id)->first()->quantite }}-->
                    <!--                    </a>-->
                    <!--                @endif --}}-->
                    <!--                {{-- <a href="{{ route('panier.store', [$produit->id, '1']) }}" class="card-sm">-->
                    <!--                    <i class="fas fa-plus"></i>-->
                    <!--                </a> --}}-->
                    <!--                <a href="{{ route('detal-product', [$produit->id]) }}">-->
                    <!--                    <div class="img-article">-->
                    <!--                        <img src="{{ asset('assets/images/produits/' . $produit->first_image) }}" alt="">-->
                    <!--                    </div>-->
                    <!--                    <div class="text-center">-->
                    <!--                        <h4>{{ $produit->nom }}</h4>-->
                    <!--                        <span>{{ $produit->categorie->libelle }}</span>-->
                    <!--                    </div>-->
                    <!--                </a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--
    @endforeach-->
                    <!--</div>-->
                    <!--  </div>-->
                </div>

                <!--<ul class="nav nav-tabs justify-content-center nav_switch mt-5" id="myTab" role="tablist">-->
                <!--  <li class="nav-item" role="presentation">-->
                <!--    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>-->
                <!--  </li>-->
                <!--  <li class="nav-item" role="presentation">-->
                <!--    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>-->
                <!--  </li>-->
                <!--  <li class="nav-item" role="presentation">-->
                <!--    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>-->
                <!--  </li>-->
                <!--  <li class="nav-item" role="presentation">-->
                <!--    <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>-->
                <!--  </li>-->
                <!--</ul>-->



            </div>
        </div>

        <div class="block-devis">
            <div class="container">
                <div class="text-center">
                    <p style="color: var(--colorTitle);" class="fadeUp wow animate__animated animate__fadeIn">
                        Ces listes de matériel médical sont non-exhaustives. Pour toute autre demande, nous sommes
                        à votre disposition pour vous apporter des solutions adaptées.
                    </p>
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#modal-devis">Demande de
                        devis</button>
                </div>
            </div>
        </div>
    </div>
    <div class="block-search">
        <form method="get" action="{{ route('produits.recherche') }}">
            @csrf
            <div class="input-group">
                <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                    <i class="fas fa-search"></i>
                </button>
                <input type="text" class="form-control" name="nom" placeholder="Trouvez un produit"
                    aria-label="Example text with button addon" aria-describedby="button-addon1" required>
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="bi bi-filter"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                    @foreach ($categories as $categorie)
                        <li><a class="dropdown-item {{ $active == $categorie->id ? 'produit' : '' }}"
                                href="{{ route('produits.categorie', [$categorie->libelle, $categorie->id]) }}">{{ $categorie->libelle }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </form>
    </div>
    </div>
    <div class="modal fade" id="modal-devis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header ">
                    <div class="text-center w-100">
                        <h5 class="modal-title">
                            Demande de devis
                        </h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('devis.store') }}">
                        @csrf
                        <div class="form-group row g-lg-4 g-2">
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="text" class="form-control" name="nom" placeholder="Nom complet"
                                    value="{{ Auth::user() ? Auth::user()->nom . ' ' . Auth::user()->postnom . ' ' . Auth::user()->prenom : '' }}"
                                    required>
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="text" class="form-control" name="societe" placeholder="Entreprise"
                                    value="">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="text" class="form-control" name="telephone" placeholder="Téléphone"
                                    value="{{ Auth::user() ? Auth::user()->contacts->first()->telephone : '' }}" required>
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Mail"
                                    value="{{ Auth::user() ? Auth::user()->email : '' }}">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="tex" class="form-control" name="adresse" placeholder="Adresse"
                                    value="{{ Auth::user() ? Auth::user()->contacts->first()->adresse : '' }}">
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="tex" class="form-control" name="ville" placeholder="Ville"
                                    value="{{ Auth::user() ? Auth::user()->contacts->first()->ville : '' }}" required>
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="tex" class="form-control" name="province" placeholder="Province"
                                    value="{{ Auth::user() ? Auth::user()->contacts->first()->province : '' }}" required>
                            </div>
                            <div class="col-lg-6 col-12 col-md-6">
                                <input type="tex" class="form-control" name="pays" placeholder="Pays"
                                    value="{{ Auth::user() ? Auth::user()->contacts->first()->pays : '' }}" required>
                            </div>
                            <div class="col-lg-12 col-12 col-md-6">
                                <textarea name="message" id="" cols="30" rows="3" class="form-control" placeholder="Message"
                                    required style="resize: none"></textarea>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                                        required>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        J'ai lu et accepte la <a href="#">politique de confidentialité</a>
                                    </label>
                                </div>
                                <div class="g-recaptcha" data-sitekey="6Ldy-owfAAAAAM0gBGWQResVOhxrdwlb-M7IB4l6"></div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 text-end">
                                <button class="btn">Envoyez</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- $2y$10$N.aeoeeT45H/baDU70dOSe8aERs2OYYH66cjDeDSLZsInsRc3EWNy --}}
@section('script')
@endsection
