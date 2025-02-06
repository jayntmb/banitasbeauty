@extends('layouts.master-dash', ['contentSearchBar' => true])

@section('style')
@endsection

@section('body')
<div class="global-div">
    <div class="wrapper">
        <div class="loading">
            <div id="loader"></div>
        </div>
        <div class="block-dash">
            <div class="container">
                <div class="row">

                    @include('layouts.partials.header.sidebar')

                    <div class="col-lg-9">
                        <div class="banner-sm">
                            <div class="container-fluid">
                                <h2>Devis demandés</h2>
                            </div>
                            <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
                        </div>
                        <div class="container-fluid container-dash px-2 px-lg-3">
                            <div class="row g-lg-3 g-2">
                                <div class="col-12">
                                    <div class="card wow mb-4 card-table card-dash">
                                        <div class="card-body body-card">
                                            <div class="d-flex justify-content-between flex-column flex-sm-row">
                                                <h4 class="mb-0">liste de demandes</h4>
                                                <ul class="nav nav-tabs nav-switch mt-3 mt-sm-0 nav-mobile" id="myTab"
                                                    role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button
                                                            class="nav-link {{ $tab == 'home' || $tab == null ? 'active' : '' }}"
                                                            id="home-tab" data-bs-toggle="tab"
                                                            data-bs-target="#home-tab-pane" type="button" role="tab"
                                                            aria-controls="home-tab-pane" aria-selected="true">
                                                            Devis en cours
                                                        </button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button
                                                            class="nav-link {{ $tab == 'historiques' ? 'active' : '' }}"
                                                            id="profile-tab" data-bs-toggle="tab"
                                                            data-bs-target="#historiques" type="button" role="tab"
                                                            aria-controls="profile-tab-pane" aria-selected="false"
                                                            tabindex="-1">Devis traités</button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-12">
                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane {{ $tab == 'home' || $tab == null ? 'show active' : '' }} fade"
                                                            id="home-tab-pane" role="tabpanel"
                                                            aria-labelledby="home-tab" tabindex="0">
                                                            @if ($devis->where('state', 0)->count() == 0)
                                                                <div class="block-empty mt-3 mt-md-5">
                                                                    <h3>
                                                                        Vous n'avez aucun devis demandé
                                                                    </h3>
                                                                    <ul class="list">
                                                                        <li class="list-item"> Chercher les produits que
                                                                            vous voulez </li>
                                                                        <li class="list-item"> Ajoutez le au Panier </li>
                                                                        <li class="list-item"> Allez au Panier </li>
                                                                        <li class="list-item"> Ajuster le nombre que vous
                                                                            souhaitez </li>
                                                                        <li class="list-item"> Cliquez sur demandez devis
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            @else
                                                                <div class="row row-action">
                                                                    <div class="col-lg-4">
                                                                        <input required="" type="text"
                                                                            class="form-control form-control-sm search-bar-table form-control-bg"
                                                                            placeholder="Recherche">
                                                                    </div>

                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-devis-prog">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Numéro devis</th>
                                                                                <th scope="col">Nbe Produits </th>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Etat</th>
                                                                                <th scope="col">Progression</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @foreach ($devis->where('state', 0) as $key => $devi)
                                                                                <tr data-bs-toggle="offcanvas"
                                                                                    data-bs-target="#offcanvas-demande-{{ $devi->id }}"
                                                                                    aria-controls="offcanvasRight">
                                                                                    <td>{{$key + 1}}</td>
                                                                                    <td>
                                                                                        {{$devi->title}}
                                                                                    </td>
                                                                                    <td class="date">
                                                                                        {{$devi->commandes->count()}}
                                                                                    </td>
                                                                                    <td class="date">
                                                                                        {{$devi->created_at}}
                                                                                    </td>

                                                                                    <td class="date">
                                                                                        <span class="badge urgent">
                                                                                            En cours
                                                                                        </span>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div
                                                                                            class="d-flex justify-content-center align-items-center">
                                                                                            <div class="circle">
                                                                                                <div class="circle-move"
                                                                                                    style="background: conic-gradient( #20c997 66.666666666667%, transparent 0%);">
                                                                                                </div>
                                                                                                <div class="circle-white">
                                                                                                    <span>{{$devi->commandes->where('state', 0)->count()}}</span>/<span>{{$devis->count()}}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                    <div class="block-empty block-empty-table d-none">
                                                                        <i class="fas fa-search"></i>
                                                                        <p>Aucun trouvé pour votre recherche</p>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="tab-pane {{ $tab == 'historiques' ? 'show active' : '' }} fade"
                                                            id="historiques" role="tabpanel" aria-labelledby="home-tab"
                                                            tabindex="0">
                                                            @if ($devis->where('state', 1)->count() == 0)
                                                                <div class="block-empty mt-3 mt-md-5">
                                                                    <h3>
                                                                        Vous n'avez aucun devis traité
                                                                    </h3>
                                                                    <ul class="list">
                                                                        <li class="list-item"> Chercher les produits que
                                                                            vous voulez </li>
                                                                        <li class="list-item"> Ajoutez les au Panier </li>
                                                                        <li class="list-item"> Allez au Panier </li>
                                                                        <li class="list-item"> Cliquez sur demandez devis
                                                                        </li>
                                                                        <li class="list-item"> Attendez la reponse de
                                                                            PHARMANS</li>
                                                                    </ul>
                                                                </div>
                                                            @else
                                                                <div class="row row-action">
                                                                    <div class="col-lg-4">
                                                                        <input required="" type="text"
                                                                            class="form-control form-control-sm search-bar-table form-control-bg"
                                                                            placeholder="Recherche">
                                                                    </div>

                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-devis-prog">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">#</th>
                                                                                <th scope="col">Numéro devis</th>
                                                                                <th scope="col">Nbe Produits</th>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Etat</th>
                                                                                {{-- <th scope="col">Progression</th> --}}
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @foreach ($devis->where('state', 1) as $key => $devi)
                                                                                <tr data-bs-toggle="offcanvas"
                                                                                    data-bs-target="#offcanvas-demande-{{ $devi->id }}"
                                                                                    aria-controls="offcanvasRight">
                                                                                    <td>{{$key + 1}}</td>
                                                                                    <td>
                                                                                        {{$devi->title}}
                                                                                    </td>
                                                                                    <td class="date">
                                                                                        {{$devi->commandes->count()}}
                                                                                    </td>
                                                                                    <td class="date">
                                                                                        {{$devi->created_at}}
                                                                                    </td>

                                                                                    <td class="date">
                                                                                        <span class="badge normal">
                                                                                            Traité
                                                                                        </span>
                                                                                    </td>
                                                                                    {{-- <td>
                                                                                        <div
                                                                                            class="d-flex justify-content-center align-items-center">
                                                                                            <div class="circle">
                                                                                                <div class="circle-move"
                                                                                                    style="background: conic-gradient( #20c997 66.666666666667%, transparent 0%);">
                                                                                                </div>
                                                                                                <div class="circle-white">
                                                                                                    <span>{{$devi->commandes->where('state',1)->count()}}</span>/<span>{{$devis->count()}}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td> --}}
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="block-empty block-empty-table d-none">
                                                                        <i class="fas fa-search"></i>
                                                                        <p>Aucun trouvé pour votre recherche</p>
                                                                    </div>
                                                                </div>
                                                            @endif
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
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-devis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header ">
                <div class="text-center w-100">
                    <h5 class="modal-title ">
                        Demande de devis
                    </h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group row g-lg-4">
                        <div class="col-lg-6 col-12 col-md-6">
                            <input type="text" class="form-control" name="fill_name" placeholder="Nom complet">
                        </div>
                        <div class="col-lg-6 col-12 col-md-6">
                            <input type="text" class="form-control" name="entreprise" placeholder="Entreprise">
                        </div>
                        <div class="col-lg-6 col-12 col-md-6">
                            <input type="text" class="form-control" name="tel" placeholder="Téléphone">
                        </div>
                        <div class="col-lg-6 col-12 col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Mail">
                        </div>
                        <div class="col-lg-6 col-12 col-md-6">
                            <input type="tex" class="form-control" name="adress" placeholder="Adresse">
                        </div>
                        <div class="col-lg-6 col-12 col-md-6">
                            <input type="tex" class="form-control" name="city" placeholder="Ville">
                        </div>
                        <div class="col-lg-6 col-12 col-md-6">
                            <input type="tex" class="form-control" name="province" placeholder="Province">
                        </div>
                        <div class="col-lg-6 col-12 col-md-6">
                            <input type="tex" class="form-control" name="contry" placeholder="Pays">
                        </div>
                        <div class="col-lg-12 col-12 col-md-6">
                            <textarea name="Message" id="" cols="30" rows="5" class="form-control"
                                placeholder="Message"></textarea>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    J'ai lu et accepte la <a href="#">politique de confidentialité</a>
                                </label>
                            </div>
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
@foreach ($devis as $devi)
    <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-demande-{{ $devi->id }}"
        aria-labelledby="offcanvasRightLabel" style="width: 700px">
        {{-- <form action="{{route('commandes.passer')}}" class="devis"> --}}
            <div class="offcanvas-header px-md-4">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">
                    {{ $devi->title }}-{{ $devi->created_at->format('d-m-Y') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body px-md-4">
                <div class="block-banner-custom mb-2 mb-md-4">
                    <div class="container-fluid px-0">
                        <div class="row align-items-center">
                            <div class="col-lg-2 pe-0">
                                <div class="block-name-custom">
                                    {{ ($devi->user->prenom ? $devi->user->prenom[0] : '') . ($devi->user->nom ? $devi->user->nom[0] : '') }}
                                </div>
                            </div>
                            <div class="col-lg-8 ps-0">
                                <h5>{{ $devi->user->prenom . ' ' . $devi->user->nom }}</h5>
                                <div class="block-items d-flex aling-items-center">
                                    <div class="items">
                                        <i class="fas fa-envelope"></i>
                                        <span> {{ $devi->user->email }} </span>
                                    </div>
                                    <div class="items">
                                        <i class="fas fa-phone"></i>
                                        <span>{{ $devi->user->contacts?->first()->telephone ?? '---' }}</span>
                                    </div>
                                    <div class="items">
                                        <i class="fas fa-home"></i>
                                        <span>{{ $devi->user->clients->first()->societe ?? '---' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 d-flex justify-content-end">
                                <div class="dropdown">
                                    <button class="btn btn-option" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{route('commandes.devis.delete', $devi->id)}}">Supprimer</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-md-4 px-3">
                    <h6>Liste de produits</h6>
                </div>
                <div class="px-md-4 px-3">
                    <div class="bock-lits-demande">
                        <div class="demande demande-client">
                            @foreach ($devi->commandes as $commande)
                                <div class="demande">
                                    <div class="row align-items-center">
                                        <div class="col-2 pe-0">
                                            <img src="{{ asset('storage/images/produits/' . $commande->produit?->image) }}"
                                                alt="">
                                        </div>
                                        <div class="col-6">
                                            <h5>{{ $commande->produit?->nom }}</h5>
                                            <p>{{ $commande->produit?->categorie->libelle }}</p>
                                            <p>{{ $commande->quantite }}</p>
                                            <p>{{ $commande->created_at->format('d-m-Y') }}</p>

                                        </div>
                                        <div class="col-3 ms-auto ps-0">
                                            <input type="text" class="form-control" placeholder="Prix"
                                                value="{{ $commande->prix }} {{ $commande->devise->symbole }}" readonly>
                                            <p>
                                                Total : {{$commande->prix_total}} {{ $commande->devise->symbole }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn btn-delete">
                                    <i class="bi bi-x"></i>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="block-action-btn d-flex justify-content-between align-items-center">
                <div class="block-total">
                    <h6>Total</h6>
                    <p>{{$devi->prix() }} </p>
                </div>
                @if ($devi->state == 1)
                    <a href="{{route('commandes.passer', $devi->id)}}" class="btn btn-primary">Passer commande</a>
                @endif
            </div>
            {{--
        </form> --}}



    </div>
@endforeach
@endsection


@section('script')
@endsection
