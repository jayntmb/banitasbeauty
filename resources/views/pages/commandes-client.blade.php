@extends('layouts.master-dash',['contentSearchBar' => true])

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
                                    <h2>Mes Commandes</h2>
                                </div>
                                <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
                            </div>
                            <div class="container-fluid container-dash px-2 px-lg-3">
                                <div class="row g-lg-3 g-2">
                                    <div class="col-12">
                                        <div class="card wow mb-4 card-table card-dash">
                                            <div class="card-body p-0 p-md-3">
                                                <div class="d-flex justify-content-between flex-md-row flex-column">
                                                    <h4 class="mb-0">liste de demandes</h4>
                                                    <ul class="nav nav-tabs nav-switch mt-3 mt-md-0 nav-mobile" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link {{$tab == 1 || $tab == null ? 'active' : ''}} " id="home-tab" data-bs-toggle="tab"
                                                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                                                aria-controls="home-tab-pane" aria-selected="true">Commandes
                                                                en attente</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link {{$tab == 2 ? 'active' : ''}}" id="profile-tab" data-bs-toggle="tab"
                                                                data-bs-target="#historiques" type="button" role="tab"
                                                                aria-controls="profile-tab-pane" aria-selected="false"
                                                                tabindex="-1">Commandes livrées</button>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane {{$tab == 1 || $tab == null? 'show active' : ''}} fade" id="home-tab-pane"
                                                                role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                            @if ($commandes->where('statut_id', 2)->count() == 0)
                                                                <div class="block-empty mt-3 mt-md-5">
                                                                    <h3>
                                                                        Vous n'avez aucune commande en attente
                                                                    </h3>
                                                                    <ul class="list">
                                                                        <li class="list-item"> Allez dans le
                                                                            menu demande de devis </li>
                                                                        <li class="list-item"> Puis l'onglet
                                                                            devis traité </li>
                                                                        <li class="list-item"> Selectionnez le
                                                                            devis et Cliquez sur Passer la
                                                                            Commande </li>
                                                                        <li class="list-item"> Ajuster votre
                                                                            commande et Cliquez sur Commande
                                                                        </li>
                                                                        <li class="list-item"> Passez à la
                                                                            caisse pour livraison</li>
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
                                                                                <th scope="col">N° commande</th>
                                                                                {{-- <th scope="col">Quantité</th> --}}
                                                                                <th scope="col">Total à payer</th>
                                                                                <th scope="col">Date</th>
                                                                                <th scope="col">Etat</th>
                                                                                {{-- <th scope="col">Progression</th> --}}
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                                @foreach ($commandes->where('statut_id', 2) as $key => $commande)
                                                                                    <tr data-bs-toggle="offcanvas"
                                                                                        data-bs-target="#offcanvas-demande-{{ $commande->id }}"
                                                                                        aria-controls="offcanvasRight">
                                                                                        <td> {{ $key + 1 }} </td>
                                                                                        <td>
                                                                                            {{ $commande->title }}
                                                                                        </td>
                                                                                        {{-- <td class="date">
                                                                                            {{$commande->created_at}}
                                                                                        </td> --}}
                                                                                        <td>
                                                                                            <span>
                                                                                                {{ $commande->devis->prix() }}
                                                                                            </span>
                                                                                        </td>
                                                                                        <td class="date">
                                                                                            {{ $commande->created_at }}
                                                                                        </td>

                                                                                        <td class="date">
                                                                                            <span class="badge urgent">
                                                                                                En attente
                                                                                            </span>
                                                                                        </td>
                                                                                        {{-- <td>
                                                                                            <div class="d-flex justify-content-center align-items-center">
                                                                                                <div class="circle">
                                                                                                    <div class="circle-move"
                                                                                                        style="background: conic-gradient( #20c997 66.666666666667%, transparent 0%);">
                                                                                                    </div>
                                                                                                    <div class="circle-white">
                                                                                                        <span>{{}}</span>/<span>6</span>
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
                                                            <div class="tab-pane {{$tab == 2 ? 'show active' : ''}} fade" id="historiques" role="tabpanel"
                                                                aria-labelledby="home-tab" tabindex="0">
                                                                @if ($commandes->where('statut_id', 4)->count() == 0)
                                                                    <div class="block-empty mt-3 mt-md-5">
                                                                        <h3 class="mb-3">
                                                                            Vous n'avez aucune commande livrée
                                                                        </h3>
                                                                        <ul class="list">
                                                                            <li class="list-item"> Allez dans le
                                                                                menu demande de devis </li>
                                                                            <li class="list-item"> Puis l'onglet
                                                                                devis traité </li>
                                                                            <li class="list-item"> Selectionnez le
                                                                                devis et Cliquez sur Passer la
                                                                                Commande </li>
                                                                            <li class="list-item"> Ajuster votre
                                                                                commande et Cliquez sur Commande
                                                                            </li>
                                                                            <li class="list-item"> Passez à la
                                                                                caisse pour livraison</li>
                                                                        </ul>
                                                                    </div>
                                                                @else
                                                                    <div class="row row-action">
                                                                        <div class="col-lg-4">
                                                                            <input required="" type="text"
                                                                                class="form-control form-control-sm form-control-bg"
                                                                                placeholder="Recherche">
                                                                        </div>

                                                                    </div>

                                                                    <div class="table-responsive">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-devis-prog">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">#</th>
                                                                                        <th scope="col">N° commande</th>
                                                                                        {{-- <th scope="col">Quantité</th> --}}
                                                                                        <th scope="col">Total payé</th>
                                                                                        <th scope="col">Date</th>
                                                                                        <th scope="col">Etat</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    @foreach ($commandes->where('statut_id', 4) as $key => $commande)
                                                                                        <tr data-bs-toggle="offcanvas"
                                                                                            data-bs-target="#offcanvas-demande-{{ $commande->id }}"
                                                                                            aria-controls="offcanvasRight">
                                                                                            <td> {{ $key + 1 }} </td>
                                                                                            <td>
                                                                                                {{ $commande->title }}
                                                                                            </td>
                                                                                            {{-- <td class="date">
                                                                                                {{$commande->created_at}}
                                                                                            </td> --}}
                                                                                            <td>
                                                                                                <span>
                                                                                                    {{ $commande->devis->prix() }}
                                                                                                </span>
                                                                                            </td>
                                                                                            <td class="date">
                                                                                                {{ $commande->created_at }}
                                                                                            </td>

                                                                                            <td class="date">
                                                                                                <span class="badge normal">
                                                                                                    Livré
                                                                                                </span>
                                                                                            </td>
                                                                                            {{-- <td>
                                                                                                <div class="d-flex justify-content-center align-items-center">
                                                                                                    <div class="circle">
                                                                                                        <div class="circle-move"
                                                                                                            style="background: conic-gradient( #20c997 66.666666666667%, transparent 0%);">
                                                                                                        </div>
                                                                                                        <div class="circle-white">
                                                                                                            <span>{{}}</span>/<span>6</span>
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
                                {{-- <div class="row g-lg-3 g-2">
                                    @foreach ($commandes as $commande)
                                    <div class="col-lg-4">
                                        <div class="card card-dash card-demande" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvas-demande-{{$commande->id}}"
                                        aria-controls="offcanvasRight">
                                            <div class="row align-items-center">
                                                <div class="col-lg-3 col-xxl-2 pe-0">
                                                    <i class="bi bi-cart-fill icon-lg"></i>
                                                </div>
                                                <div class="col-lg-9 col-xxl-10">
                                                    <h5>{{$commande->title}} <span class="badge {{ $commande->statut_id == 2 ? 'danger' : 'normal' }}">{{ $commande->statut_id == 2 ? 'Encours' : 'Traité' }}</span></h5>
                                                    <div class="row">


                                                    </div>
                                                </div>
                                                <p class="text-end"> {{$commande->created_at->format('d-m-Y')}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($commandes as $key=>$commande)
        <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-demande-{{ $commande->id }}"
            aria-labelledby="offcanvasRightLabel" style="width: 700px">
            <form action="" class="devis">
                <div class="offcanvas-header px-md-4">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">{{ $commande->title }} </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body px-md-4">
                    <div class="block-banner-custom mb-2 mb-md-4">
                        <div class="container-fluid px-0">
                            <div class="row align-items-center">
                                <div class="col-lg-2 pe-0">
                                    <div class="block-name-custom">
                                        {{ $commande->user->prenom[0] . $commande->user->nom[0] }}
                                    </div>
                                </div>
                                <div class="col-lg-8 ps-0">
                                    <h5>{{ $commande->user->prenom . ' ' . $commande->user->nom }}</h5>
                                    <div class="block-items d-flex aling-items-center">
                                        <div class="items">
                                            <i class="fas fa-envelope"></i>
                                            <span> {{ $commande->user->email }} </span>
                                        </div>
                                        <div class="items">
                                            <i class="fas fa-phone"></i>
                                            <span>{{ $commande->user->contacts?->first()->telephone ?? '---' }}</span>
                                        </div>
                                        <div class="items">
                                            <i class="fas fa-home"></i>
                                            <span>{{ $commande->user->clients->first()->societe ?? '---' }}</span>
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
                                                    href="{{ route('commandes.client.delete', $commande->id) }}">Supprimer</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-md-4 px-3">
                        <h6>Details</h6>
                    </div>
                    {{-- <div class="px-md-4 px-3">
                        <div class="bock-lits-demande">
                            <div class="demande demande-client">
                                <h4>
                                    <p>{{ $commande->detail }}</p>
                                </h4>
                            </div>
                        </div>
                    </div> --}}
                    <div class="px-3 px-md-4">
                        <table class="table table-devis-prog">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Nom du produit</th>
                                    <th scope="col">Qte</th>
                                    <th scope="col">PU</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (json_decode($commande->detail) as $key => $detail)
                                <tr>
                                    <td> {{$key+1}} </td>
                                    <td>
                                        {{$detail->nom}}
                                    </td>

                                    <td>
                                        <span> {{$detail->quantite}} </span>
                                    </td>
                                    <td class="date">
                                        {{$detail->prix}} {{$detail->symbole}}
                                    </td>
                                    <td class="date">
                                        {{$detail->prix_total}} {{$detail->symbole}}
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="block-action-btn d-flex justify-content-between align-items-center">
                        <div class="block-statut">
                            <h6>Statut</h6>
                            @if ($commande->statut_id == 4)
                                <span class="badge">
                                    Livré
                                </span>
                            @else
                                <span class="badge urgent">
                                    En attente
                                </span>
                            @endif
                        </div>
                    {{-- <p>Statut : <span class="btn btn-{{ $commande->statut_id == 2 ? 'danger' : 'success' }}">
                        {{ $commande->statut_id == 2 ? 'En attente' : 'Livré' }} </span> </p> --}}
                    <div class="block-total">
                        <h6>Total</h6>
                        <p>{{ $commande->devis->prix() }}</p>
                    </div>
                </div>
            </form>



        </div>
    @endforeach
@endsection

@section('script')
@endsection

{{-- @php
                    $detail = json_decode($commande->detail);
                @endphp
                <div class="px-md-4 px-3">
                    <div class="bock-lits-demande">
                        <div class="demande demande-client">
                            @foreach ($detail as $item)
                                <h4> <p>{{$item}}</p> </h4>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
