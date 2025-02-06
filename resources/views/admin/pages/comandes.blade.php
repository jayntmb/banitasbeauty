@extends('admin.layouts.master')

@section('style')
@endsection

@section('body')
@include('admin.layouts.partials.header.sidebar')
<div class="banner-sm">
    <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-left text-white">
                    <h2>Commandes Clients</h2>
                    {{-- <p>You have 24 new messages and 5 new notifications.</p>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card wow mb-4 card-table">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-column flex-sm-row">
                                    <h4 class="mb-0">liste de commandes</h4>
                                    <div class="group-btn">
                                        {{-- <button class="btn btn-primary"><i
                                                class="fas fa-sort-alpha-up"></i></button>
                                        <button class="btn btn-primary"><i class="fas fa-sort-alpha-down"></i></button>
                                        --}}
                                    </div>
                                    <ul class="nav nav-tabs nav-switch mt-3 mt-sm-0" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                                aria-controls="home-tab-pane" aria-selected="true">Commande
                                                en cours</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#historiques" type="button" role="tab"
                                                aria-controls="profile-tab-pane"
                                                aria-selected="false">Historiques</button>
                                        </li>
                                    </ul>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane show active fade" id="home-tab-pane" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="row row-action">
                                                    <div class="col-lg-4">
                                                        <input required="" type="text"
                                                            class="form-control form-control-sm search-bar-table form-control-bg"
                                                            placeholder="Recherche">
                                                    </div>
                                                    {{-- <div class="col-lg-8 d-flex justify-content-end">
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fas fa-filter"></i> filtre
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="{{route('admin.devis.jour')}}">Jour</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{route('admin.devis.mois')}}">Mois</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{route('admin.devis.annee')}}">Année</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                @if ($users->count() == 0)
                                                    <div class="block-empty-table">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <h3>Aucune commande </h3>
                                                    </div>
                                                @else
                                                                                        <div class="table-responsive">
                                                                                            <table class="table table-devis-prog">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th scope="col">#</th>
                                                                                                        <th scope="col">Nom complet</th>
                                                                                                        <th scope="col">Entreprise</th>
                                                                                                        <th scope="col">Commande</th>
                                                                                                        <th scope="col">Etat</th>
                                                                                                        <th scope="col">Progression</th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>

                                                                                                    <h3>Aucun Client n'a passé de Commande</h3>

                                                                                                    @foreach ($users as $key => $user)
                                                                                                                                                        @if ($user->commandeclient->where('statut_id', 2)->count() > 0)
                                                                                                                                                                                                            <tr id="{{$user->id}}" data-bs-toggle="offcanvas"
                                                                                                                                                                                                                data-bs-target="#offcanvas-demande_{{ $user->id }}"
                                                                                                                                                                                                                aria-controls="offcanvasRight">
                                                                                                                                                                                                                {{-- <td><img
                                                                                                                                                                                                                        src="{{ asset('assets/images/users/'.$user->image) }}"
                                                                                                                                                                                                                        alt=""></td> --}}
                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    {{ $key + 1 }}
                                                                                                                                                                                                                </td>

                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    <div class="d-flex align-items-center">
                                                                                                                                                                                                                        {{-- <img
                                                                                                                                                                                                                            src="{{asset('assets/admin/images/avatar.jpg')}}"
                                                                                                                                                                                                                            alt=""> --}}
                                                                                                                                                                                                                        <div class="block-name">
                                                                                                                                                                                                                            {{ $user->nom != '' ? $user->nom[0] . Str::upper(substr($user->postnom, -1)) : Str::upper($user->nom[0]) }}
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                        <div class="name d-flex"
                                                                                                                                                                                                                            style="flex-direction: column">
                                                                                                                                                                                                                            <span>
                                                                                                                                                                                                                                {{ $user->nom . ' ' . $user->postnom . ' ' . $user->prenom }}</span>
                                                                                                                                                                                                                            <span class="email-user">
                                                                                                                                                                                                                                {{ $user->email }}
                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    {{ $user->clients->first()->societe }}
                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    {{ $user->commandeclient->where('statut_id', '2')->count() }}
                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    @if ($user->statut_id == '1')
                                                                                                                                                                                                                        <span class="badge normal">
                                                                                                                                                                                                                    @elseif ($user->statut_id == '2')
                                                                                                                                                                                                                        <span class="badge urgent">
                                                                                                                                                                                                                    @elseif($user->statut_id == '4')
                                                                                                                                                                                                                        <span class="badge normal">
                                                                                                                                                                                                                    @else
                                                                                                                                                                                                                        <span class="badge very-urgent">
                                                                                                                                                                                                                    @endif
                                                                                                                                                                                                                                    En cours
                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                </td>
                                                                                                                                                                                                                <td>
                                                                                                                                                                                                                    <div
                                                                                                                                                                                                                        class="d-flex justify-content-center align-items-center">
                                                                                                                                                                                                                        @php
                                                                                                                                                                                                                            $cmmd = App\Models\CommandeClient::where('user_id', $user->id)
                                                                                                                                                                                                                                ->get()
                                                                                                                                                                                                                                ->count();
                                                                                                                                                                                                                            $repCmmd = App\Models\CommandeClient::where('user_id', $user->id)
                                                                                                                                                                                                                                ->where('statut_id', 4)
                                                                                                                                                                                                                                ->get()
                                                                                                                                                                                                                                ->count();
                                                                                                                                                                                                                            $prd = ($repCmmd / $cmmd) * 100;
                                                                                                                                                                                                                        @endphp
                                                                                                                                                                                                                        <div class="circle">
                                                                                                                                                                                                                            <div class="circle-move"
                                                                                                                                                                                                                                style="background: conic-gradient( #20c997 {{ $prd }}%, transparent 0%);">
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                            <div class="circle-white">
                                                                                                                                                                                                                                <span>{{ $repCmmd }}</span>/<span>{{ $cmmd }}</span>
                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </td>
                                                                                                                                                                                                            </tr>

                                                                                                                                                        @endif
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
                                            <div class="tab-pane fade" id="historiques" role="tabpanel"
                                                aria-labelledby="home-tab" tabindex="0">
                                                <div class="row row-action">
                                                    <div class="col-lg-4">
                                                        <input required="" type="text"
                                                            class="form-control form-control-sm form-control-bg"
                                                            placeholder="Recherche">
                                                    </div>
                                                    {{-- <div class="col-lg-8 d-flex justify-content-end">
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fas fa-filter"></i> filtre
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="{{route('admin.devis.jour')}}">Jour</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{route('admin.devis.mois')}}">Mois</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{route('admin.devis.annee')}}">Année</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                @if ($commandes->count() == 0)
                                                    <div class="block-empty-table">
                                                        <i class="fas fa-shopping-cart"></i>
                                                        <h3>Aucune commande </h3>
                                                    </div>
                                                @else
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Nom</th>
                                                                    <th scope="col">Client</th>
                                                                    <th scope="col">Entreprise</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Etat</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($commandes as $key => $commande)
                                                                    @if ($commande->count() == 0)
                                                                        <div class="row w-100 justify-content-center">
                                                                            <h3>Aucun devis pour l'instant</h3>
                                                                        </div>
                                                                    @else
                                                                        <tr data-bs-toggle="offcanvas"
                                                                            data-bs-target="#offcanvas-commande_{{ $commande->id }}"
                                                                            aria-controls="offcanvasRight">
                                                                            {{-- <td><img
                                                                                    src="{{ asset('assets/images/users/'.$user->image) }}"
                                                                                    alt=""></td> --}}
                                                                            <td>
                                                                                {{ $key + 1 }}
                                                                            </td>

                                                                            <td>
                                                                                {{ $commande->title }}
                                                                            </td>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    {{-- <img
                                                                                        src="{{asset('assets/admin/images/avatar.jpg')}}"
                                                                                        alt=""> --}}
                                                                                    <div class="block-name">
                                                                                        {{ $commande->user->nom != '' ? $commande->user->nom[0] . Str::upper(substr($commande->user->postnom, -1)) : Str::upper($commande->user->nom[0]) }}
                                                                                    </div>
                                                                                    <div class="name d-flex"
                                                                                        style="flex-direction: column">
                                                                                        <span>
                                                                                            {{ $commande->user->nom . ' ' . $commande->user->postnom . ' ' . $commande->user->prenom }}</span>
                                                                                        <span class="email-user">
                                                                                            {{ $commande->user->email }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                {{ $commande->user->clients->first()->societe }}
                                                                            </td>
                                                                            <td class="date">
                                                                                {{ $commande->created_at->format('d-m-Y') ?? '-' }}
                                                                            </td>
                                                                            <td>

                                                                                <span class="badge normal">
                                                                                    Livré
                                                                                </span>
                                                                            </td>

                                                                        </tr>

                                                                    @endif

                                                                @endforeach
                                                            </tbody>
                                                        </table>
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
@foreach ($users as $key => $user)
    <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-demande_{{ $user->id }}"
        aria-labelledby="offcanvasRightLabel" style="width: 700px">
        <form action="{{ route('admin.commandeclient.update') }}" method="POST" class="devis">
            @csrf
            <div class="offcanvas-header px-md-4">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail commande</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body px-md-4">
                <div class="block-banner-custom mb-2 mb-md-4">
                    <div class="container-fluid px-0">
                        <div class="row align-items-center">
                            <input type="hidden" value="{{$user->id}}" name="user_id">
                            <div class="col-lg-2 pe-0">
                                <div class="block-name-custom">
                                    {{ $user->nom != '' ? $user->nom[0] . Str::upper(substr($user->nom, -1)) : $user->nom[0] }}
                                </div>
                            </div>
                            <div class="col-lg-8 ps-0">
                                <h5>{{ $user->nom }}</h5>
                                <div class="block-items d-flex aling-items-center">
                                    <div class="items">
                                        <i class="fas fa-envelope"></i>
                                        <span>{{ $user->email }}</span>
                                    </div>
                                    <div class="items">
                                        <i class="fas fa-phone"></i>
                                        <span>{{ $user->contacts?->first()?->telephone }}</span>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-md-4 px-3">
                    <h6>Liste commandes </h6>
                </div>
                <div class="px-md-4 px-3">
                    @if ($user->commandeclient->count() > 0)
                        @foreach ($user->commandeclient as $cc)
                            <input type="hidden" name="commandeclient_id" value="{{$cc->id}}">
                            <div class="col-6">
                                <h5>{{ $cc->title }}</h5>
                                <span>{{ $cc->created_at->diffForHumans() }}</span>
                            </div>

                            @foreach ($cc->devis->commandes as $commande)
                                <div class="bock-lits-demande">
                                    <div class="demande">
                                        <div class="row align-items-center">
                                            <div class="col-2 pe-0">
                                                <img src="{{ asset('storage/images/produits/' . $commande->produit?->image) }}" alt="">
                                            </div>
                                            <div class="col-6">
                                                <h5>{{ $commande->produit?->nom }}</h5>
                                                <p>{{ $commande->produit?->categorie->libelle }}</p>
                                                <p>Qté : {{ $commande->quantite }}</p>
                                                <p>{{ $commande->created_at->format('d-m-Y') }}</p>

                                            </div>
                                            <div class="col-3 ms-auto ps-0">
                                                <input type="hidden" value="{{ $commande->id }}">
                                                <div class="input-group">
                                                    <input type="text" class="form-control w-75" placeholder="Prix"
                                                        value="{{$commande->prix}} " readonly>
                                                    <p class="form-control w-25">{{$commande->devise->symbole}}</p>
                                                </div>
                                                <p>Total : {{ (int) $commande->prix * (int) $commande->quantite }}
                                                    {{$commande->devise->symbole}}</p>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if ($cc->statut_id == '2')
                                <div class="block-action-btn d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Livraison</button>
                                </div>
                            @else
                                <div class="block-action-btn d-flex justify-content-end">
                                    <p class="btn btn-secondary">Déjà livrée</p>
                                </div>
                            @endif

                        @endforeach
                    @else
                        <h3>Aucun commande</h3>
                    @endif
                </div>
            </div>



        </form>
    </div>
@endforeach
@foreach ($commandes as $key => $commande)
    <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-commande_{{ $commande->id }}"
        aria-labelledby="offcanvasRightLabel" style="width: 700px">

        <div class="offcanvas-header px-md-4">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail {{ $commande->title }} </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body px-md-4">
            <div class="block-banner-custom mb-2 mb-md-4">
                <div class="container-fluid px-0">
                    <div class="row align-items-center">
                        <input type="hidden" value="{{$commande->id}}" name="commande_id">
                        <div class="col-lg-8 ps-0">
                            <h5>{{ $commande->devis->user->nom }}</h5>
                            <div class="block-items d-flex aling-items-center">
                                <div class="items">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $commande->devis->user->email }}</span>
                                </div>
                                <div class="items">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $commande->devis->user->contacts?->first()->telephone }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <h6>
                                Date de livraison : {{$commande->updated_at}}
                            </h6>
                        </div>
                        @foreach ($commande->devis->commandes as $com)
                            <div class="bock-lits-demande">
                                <div class="demande">
                                    <div class="row align-items-center">
                                        <div class="col-2 pe-0">
                                            <img src="{{ asset('storage/images/produits/' . $com->produit?->image) }}" alt="">
                                        </div>
                                        <div class="col-6">
                                            <h5>{{ $com->produit?->nom }}</h5>
                                            <p>{{ $com->produit?->categorie->libelle }}</p>
                                            <p>Qté : {{ $com->quantite }}</p>
                                            <p>{{ $com->created_at->format('d-m-Y') }}</p>

                                        </div>
                                        <div class="col-3 ms-auto ps-0">
                                            <input type="hidden" name="id[]" value="{{ $com->id }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control w-75" placeholder="Prix" name="price[]"
                                                    value="{{$com->prix}} " readonly>
                                                <p class="form-control w-25">{{$com->devise->symbole}}</p>
                                            </div>
                                            <p>Total : {{ (int) $com->prix * (int) $com->quantite }} {{$com->devise->symbole}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
@endforeach
@endsection

@section('script')
@endsection
