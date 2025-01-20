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
                        <h2>Demandes de devis</h2>
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
                                        <h4 class="mb-0">liste de demandes</h4>
                                        <div class="group-btn">
                                            {{-- <button class="btn btn-primary"><i class="fas fa-sort-alpha-up"></i></button>
                                            <button class="btn btn-primary"><i class="fas fa-sort-alpha-down"></i></button> --}}
                                        </div>
                                        <ul class="nav nav-tabs nav-switch mt-3 mt-sm-0" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                                    aria-controls="home-tab-pane" aria-selected="true">Devis
                                                    en cours</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#historiques" type="button" role="tab"
                                                    aria-controls="profile-tab-pane"
                                                    aria-selected="false">Devis traités</button>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane show active fade" id="home-tab-pane" role="tabpanel"
                                                    aria-labelledby="home-tab" tabindex="0">
                                                    @if ($users->count()==0)
                                                        <h3>Aucun Client n'a demandé de Devis</h3>
                                                    @else
                                                        <div class="row row-action">
                                                            <div class="col-lg-4">
                                                                <input required="" type="text" class="form-control form-control-sm search-bar-table form-control-bg"  placeholder="Recherche">
                                                            </div>
                                                            {{-- <div class="col-lg-8 d-flex justify-content-end">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-filter"></i> filtre
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="{{route('admin.devis.jour')}}">Jour</a></li>
                                                                        <li><a class="dropdown-item" href="{{route('admin.devis.mois')}}">Mois</a></li>
                                                                        <li><a class="dropdown-item" href="{{route('admin.devis.annee')}}">Année</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-devis-prog">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Nom complet</th>
                                                                        <th scope="col">Enntreprise</th>
                                                                        <th scope="col">Devis</th>
                                                                        <th scope="col">Etat</th>
                                                                        <th scope="col">Progression</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($users as $key => $user)
                                                                        @if ($user->devisclient->where('state',0)->count() > 0)
                                                                            <tr id="{{$user->id}}" data-bs-toggle="offcanvas"
                                                                                data-bs-target="#offcanvas-demande_{{ $user->id }}"
                                                                                aria-controls="offcanvasRight">
                                                                                {{-- <td><img src="{{ asset('assets/images/users/'.$user->image) }}" alt=""></td> --}}
                                                                                <td>
                                                                                    {{ $key + 1 }}
                                                                                </td>

                                                                                <td>
                                                                                    <div class="d-flex align-items-center">
                                                                                        {{-- <img src="{{asset('assets/admin/images/avatar.jpg')}}" alt=""> --}}
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
                                                                                <td >
                                                                                    {{ $user->clients->first()->societe }}
                                                                                </td>
                                                                                <td >
                                                                                    {{ $user->devisclient->where('state', '0')->count() }}
                                                                                </td>
                                                                                <td >
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
                                                                                <td >
                                                                                    <div
                                                                                        class="d-flex justify-content-center align-items-center">
                                                                                        @php
                                                                                            $cmmd = App\Models\DevisClient::where('user_id', $user->id)
                                                                                                ->get()
                                                                                                ->count();
                                                                                            $repCmmd = App\Models\DevisClient::where('user_id', $user->id)
                                                                                                ->where('state', 1)
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
                                                    @if ($devis->count() == 0)
                                                        <h3>
                                                            Vous n'avez traité aucun devis
                                                        </h3>
                                                    @else
                                                        <div class="row row-action">
                                                            <div class="col-lg-4">
                                                                <input required="" type="text" class="form-control form-control-sm form-control-bg" placeholder="Recherche">
                                                            </div>
                                                            {{-- <div class="col-lg-8 d-flex justify-content-end">
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fas fa-filter"></i> filtre
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="{{route('admin.devis.jour')}}">Jour</a></li>
                                                                        <li><a class="dropdown-item" href="{{route('admin.devis.mois')}}">Mois</a></li>
                                                                        <li><a class="dropdown-item" href="{{route('admin.devis.annee')}}">Année</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div> --}}
                                                        </div>
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

                                                                        @foreach ($devis as $key=>$devi)
                                                                            @if ($devi->id != null)
                                                                                <tr data-bs-toggle="offcanvas"
                                                                                    data-bs-target="#offcanvas-devis_{{ $key }}"
                                                                                    aria-controls="offcanvasRight">
                                                                                    {{-- <td><img src="{{ asset('assets/images/users/'.$user->image) }}" alt=""></td> --}}
                                                                                    <td >
                                                                                        {{ $key + 1 }}
                                                                                    </td>

                                                                                    <td >
                                                                                        {{ $devi->title }}
                                                                                    </td>
                                                                                    <td >
                                                                                        <div class="d-flex align-items-center">
                                                                                            {{-- <img src="{{asset('assets/admin/images/avatar.jpg')}}" alt=""> --}}
                                                                                            <div class="block-name">
                                                                                                {{ $devi->user->nom != '' ? $devi->user->nom[0] . Str::upper(substr($devi->user->postnom, -1)) : Str::upper($devi->user->nom[0]) }}
                                                                                            </div>
                                                                                            <div class="name d-flex"
                                                                                                style="flex-direction: column">
                                                                                                <span>
                                                                                                    {{ $devi->user->nom . ' ' . $devi->user->postnom . ' ' . $devi->user->prenom }}</span>
                                                                                                <span class="email-user">
                                                                                                {{ $devi->user->email }}
                                                                                            </span>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td >
                                                                                    {{ $devi->user->clients->first()->societe }}
                                                                                </td>
                                                                                <td class="date" >
                                                                                    {{ $devi->created_at->format('d-m-Y') ?? '-' }}
                                                                                </td>
                                                                                <td >
                                                                                    @if ($devi->state == 1)
                                                                                        <span class="badge normal">
                                                                                    @else
                                                                                        <span class="badge very-urgent">
                                                                                    @endif
                                                                                    {{ $devi->state == 0 ? 'Non Traité' : 'Traité' }}
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
            <form action="{{ route('admin.devis.update') }}" method="POST" class="devis">
                @csrf
                <div class="offcanvas-header px-md-4">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail devis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body px-md-4">
                    <div class="block-banner-custom mb-2 mb-md-4">
                        <div class="container-fluid px-0">
                            <div class="row align-items-center">
                                <input type="hidden" value="{{$user->id}}" name="user_id">
                                <div class="col-lg-2 pe-0 col-4">
                                    <div class="block-name-custom">
                                        {{ $user->nom != '' ? $user->nom[0] . Str::upper(substr($user->nom, -1)) : $user->nom[0] }}
                                    </div>
                                </div>
                                <div class="col-lg-8 ps-0 col-8">
                                    <h5>{{ $user->nom }}</h5>
                                    <div class="block-items d-flex aling-items-center flex-wrap">
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
                        <h6>Liste devis </h6>
                    </div>
                    <div class="px-md-4 px-3">
                        @if ($user->devisclient->count() > 0)
                            @php
                                $userdevis = collect($user->devisclient->where('state','0'));
                                $userdevis = $userdevis->sortBy(function($col){
                                    return $col->created_at;
                                },SORT_REGULAR,true);
                            @endphp
                            @foreach ( $userdevis as $devisclient)
                                <div class="col-6 mb-3">
                                    <h5 class="mb-0" style="font-size: 16px; color: #222423;font-weight:600;">{{ $devisclient->title }}</h5>
                                    <span style="font-size: 12px; color: #8f9794;">{{ $devisclient->created_at->diffForHumans() }}</span>
                                </div>
                                @foreach ($devisclient->commandes as $commande)
                                <div class="bock-lits-demande">
                                    <div class="demande">
                                        <div class="row align-items-center">
                                            <div class="col-3 pe-0 col-sm-2">
                                                <img src="{{ asset('assets/images/produits/' . $commande->produit?->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="col-5 col-sm-6">
                                                <h5>{{ $commande->produit?->nom }}</h5>
                                                <p>{{ $commande->produit?->categorie->libelle }}</p>
                                                <p>{{ $commande->quantite }}</p>
                                                <p>{{ $commande->created_at->format('d-m-Y') }}</p>

                                            </div>
                                            <div class="col-4 ms-auto ps-0 col-sm-4">
                                                <input type="hidden" name="id[]" value="{{ $commande->id }}">
                                                <div class="input-group flex-nowrap flex-sm-wrap">
                                                    <input type="text" class="form-control w-50" placeholder="Prix"
                                                    name="price[]" value="{{$commande->prix}}"
                                                    {{$commande->prix == null ? '': 'readonly'}}
                                                >
                                                <select name="devise_id[]" class="form-control w-25">
                                                    @foreach ($devises as $devise)
                                                        <option value="{{ $devise->id }}"> {{ $devise->symbole }} </option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="block-action-btn d-flex justify-content-end pe-0">
                                    <button type="submit" class="btn btn-primary">Repondre</button>
                                </div>
                            @endforeach
                        @else
                                <h3>Aucun devis</h3>
                        @endif
                    </div>
                </div>



            </form>
        </div>
    @endforeach


    @foreach ($devis as $key=> $devi)
        <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-devis_{{ $key }}"
            aria-labelledby="offcanvasRightLabel" style="width: 700px">
                <div class="offcanvas-header px-md-4">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail devis </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body px-md-4">
                    <div class="block-banner-custom mb-2 mb-md-4">
                        <div class="container-fluid px-0">
                            <div class="row align-items-center">
                                <div class="col-lg-2 pe-0 col-4">
                                    <div class="block-name-custom">
                                        {{ $devi->user->nom != '' ? $devi->user->nom[0] . Str::upper(substr($devi->user->nom, -1)) : $devi->user->nom[0] }}
                                    </div>
                                </div>
                                <div class="col-lg-8 ps-0 col-8">
                                    <h5>{{ $devi->user->nom }}</h5>
                                    <div class="block-items d-flex aling-items-center flex-wrap">
                                        <div class="items">
                                            <i class="fas fa-envelope"></i>
                                            <span>{{ $devi->user->email }}</span>
                                        </div>
                                        <div class="items">
                                            <i class="fas fa-phone"></i>
                                            <span>{{ $devi->user->contacts?->first()->telephone }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-md-4 px-3">
                        <div class="col-12 mb-3">
                            <h5 style="font-size: 16px; color: #222423;font-weight:600;" class="mb-0">{{ $devi->title }}</h5>
                            <span style="font-size: 12px; color: #8f9794;">{{ $devi->created_at->diffForHumans() }}</span>
                        </div>
                        @foreach ($devi->commandes as $commande)
                        <div class="bock-lits-demande">
                            <div class="demande">
                                <div class="row align-items-center">
                                    <div class="col-3 pe-0 col-sm-2">
                                        <img src="{{ asset('assets/images/produits/' . $commande->produit?->image) }}"
                                            alt="">
                                    </div>
                                    <div class="col-5 col-sm-6">
                                        <h5>{{ $commande->produit?->nom }}</h5>
                                        <p>{{ $commande->produit?->categorie->libelle }}</p>
                                        <p>{{ $commande->quantite }}</p>
                                        <p>{{ $commande->created_at->format('d-m-Y') }}</p>

                                    </div>
                                    <div class="col-4 ms-auto ps-0 col-sm-4">
                                        <div class="input-group flex-nowrap flex-sm-wrap">
                                            <input type="text" class="form-control w-50"  placeholder="Prix"name="price[]"value="{{$commande->prix}} " readonly >
                                            <input type="text" value="{{$commande->devise->symbole}}" class="form-control w-25" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
        </div>

    @endforeach
@endsection
@section('script')
@endsection
