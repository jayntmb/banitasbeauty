<div>
    <div class="banner-sm">
        <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-left text-white">
                        <h2>Commandes reçues</h2>
                        <p>Vous avez reçu {{ $pending_orders }} commandes à traiter.</p>

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
                                        <h4 class="mb-0">Liste de commandes</h4>
                                        <div class="group-btn">
                                            {{-- <button class="btn btn-primary"><i
                                                    class="fas fa-sort-alpha-up"></i></button>
                                            <button class="btn btn-primary"><i
                                                    class="fas fa-sort-alpha-down"></i></button>
                                            --}}
                                        </div>
                                        <ul class="nav nav-tabs nav-switch mt-3 mt-sm-0" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                                    aria-controls="home-tab-pane" aria-selected="true">Commandes
                                                    en attente</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                                    data-bs-target="#historiques" type="button" role="tab"
                                                    aria-controls="profile-tab-pane" aria-selected="false">Commandes
                                                    traitees</button>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane show active fade" id="home-tab-pane"
                                                    role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                                    <div class="row row-action">
                                                        <div class="col-lg-4">
                                                            <input required="" type="text"
                                                                class="form-control form-control-sm search-bar-table form-control-bg"
                                                                placeholder="Recherche">
                                                        </div>
                                                    </div>
                                                    @if ($commandes->count() == 0)
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
                                                                                                                    <th scope="col">Produit</th>
                                                                                                                    <th scope="col">Quantite</th>
                                                                                                                    <th scope="col">Prix unitaire</th>
                                                                                                                    <th scope="col">Total</th>
                                                                                                                    <th scope="col">Etat</th>
                                                                                                                    <th scope="col">Date</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                @foreach ($commandes->where('status', '!=', 'Livrée') as $key => $commande)
                                                                                                                                                                            <tr id="{{$commande->id}}" data-bs-toggle="offcanvas"
                                                                                                                                                                                data-bs-target="#offcanvas-demande_{{ $commande->id }}"
                                                                                                                                                                                aria-controls="offcanvasRight">
                                                                                                                                                                                <td>
                                                                                                                                                                                    {{ $key + 1 }}
                                                                                                                                                                                </td>

                                                                                                                                                                                <td>
                                                                                                                                                                                    <div class="d-flex align-items-center">
                                                                                                                                                                                        <img src="{{asset('assets/admin/images/avatar.jpg')}}"
                                                                                                                                                                                            alt="">
                                                                                                                                                                                        <div class="name d-flex"
                                                                                                                                                                                            style="flex-direction: column">
                                                                                                                                                                                            <span>
                                                                                                                                                                                                {{ "$commande->nom_client $commande->prenom_client" }}</span>
                                                                                                                                                                                            <span class="email-commande">
                                                                                                                                                                                                {{ $commande->email_client }}
                                                                                                                                                                                            </span>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    <ol type="a">
                                                                                                                                                                                        @foreach ($commande->produits as $item)
                                                                                                                                                                                            <li>
                                                                                                                                                                                                {{ ucfirst($item->nom) }}
                                                                                                                                                                                            </li>
                                                                                                                                                                                        @endforeach
                                                                                                                                                                                    </ol>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    <ol type="a">
                                                                                                                                                                                        @foreach ($commande->produits as $item)
                                                                                                                                                                                            <li>
                                                                                                                                                                                                {{ $item->pivot->quantite }}
                                                                                                                                                                                            </li>
                                                                                                                                                                                        @endforeach
                                                                                                                                                                                    </ol>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    <ol type="a">
                                                                                                                                                                                        @foreach ($commande->produits as $item)
                                                                                                                                                                                            <li>
                                                                                                                                                                                                $ {{ $item->prix }}
                                                                                                                                                                                            </li>
                                                                                                                                                                                        @endforeach
                                                                                                                                                                                    </ol>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    <ul>
                                                                                                                                                                                        @php
                                                                                                                                                                                            $total = 0;
                                                                                                                                                                                            foreach ($commande->produits as $produit) {
                                                                                                                                                                                                $total_commande = (int) $produit->prix * (int) $produit->pivot->quantite;
                                                                                                                                                                                                $total += $total_commande;
                                                                                                                                                                                            }
                                                                                                                                                                                        @endphp
                                                                                                                                                                                        $ {{ $total }}
                                                                                                                                                                                    </ul>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    @if ($commande->status === 'En attente' || $commande->status === 'pending')
                                                                                                                                                                                        <span class="badge text-bg-danger">
                                                                                                                                                                                    @elseif ($commande->status === 'En cours')
                                                                                                                                                                                        <span class="badge text-bg-warning">
                                                                                                                                                                                    @elseif($commande->status === 'Livrée')
                                                                                                                                                                                        <span class="badge text-bg-success">
                                                                                                                                                                                    @else
                                                                                                                                                                                        <span class="badge text-bg-danger">
                                                                                                                                                                                    @endif
                                                                                                                                                                                                    {{ $commande->status }}
                                                                                                                                                                                                </span>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td class="date">
                                                                                                                                                                                    {{ $commande->created_at->format('d-m-Y') ?? '-' }}
                                                                                                                                                                                </td>
                                                                                                                                                                            </tr>
                                                                                                                @endforeach
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <div class="block-empty block-empty-table d-none">
                                                                                                            <i class="fas fa-search"></i>
                                                                                                            <p>Aucun produit trouvé pour votre recherche</p>
                                                                                                        </div>
                                                                                                        {{ $commandes->links('pagination::bootstrap-5') }}
                                                                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="tab-pane fade" id="historiques" role="tabpanel"
                                                    aria-labelledby="home-tab" tabindex="0">
                                                    @if ($commandes->where('status', 'Livrée')->count() > 0)
                                                        <div class="row row-action">
                                                            <div class="col-lg-4">
                                                                <input required="" type="text"
                                                                    class="form-control form-control-sm search-bar-table form-control-bg"
                                                                    placeholder="Recherche">
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($commandes->where('status', 'Livrée')->count() == 0)
                                                        <div class="block-empty-table">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <h3>Vous n'avez validé aucune commande pour l'instant </h3>
                                                        </div>
                                                    @else
                                                                                                    <div class="table-responsive">
                                                                                                        <table class="table table-devis-prog">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th scope="col">#</th>
                                                                                                                    <th scope="col">Nom complet</th>
                                                                                                                    <th scope="col">Produit</th>
                                                                                                                    <th scope="col">Quantite</th>
                                                                                                                    <th scope="col">Prix unitaire</th>
                                                                                                                    <th scope="col">Total</th>
                                                                                                                    <th scope="col">Etat</th>
                                                                                                                    <th scope="col">Date</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                @foreach ($commandes->where('status', 'Livrée') as $key => $commande)
                                                                                                                                                                            <tr id="{{$commande->id}}" data-bs-toggle="offcanvas"
                                                                                                                                                                                data-bs-target="#offcanvas-demande_{{ $commande->id }}"
                                                                                                                                                                                aria-controls="offcanvasRight">
                                                                                                                                                                                <td>
                                                                                                                                                                                    {{ $key + 1 }}
                                                                                                                                                                                </td>

                                                                                                                                                                                <td>
                                                                                                                                                                                    <div class="d-flex align-items-center">
                                                                                                                                                                                        <img src="{{asset('assets/admin/images/avatar.jpg')}}"
                                                                                                                                                                                            alt="">
                                                                                                                                                                                        <div class="name d-flex"
                                                                                                                                                                                            style="flex-direction: column">
                                                                                                                                                                                            <span>
                                                                                                                                                                                                {{ "$commande->nom_client $commande->prenom_client" }}</span>
                                                                                                                                                                                            <span class="email-commande">
                                                                                                                                                                                                {{ $commande->email_client }}
                                                                                                                                                                                            </span>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    <ol type="a">
                                                                                                                                                                                        @foreach ($commande->produits as $item)
                                                                                                                                                                                            <li>
                                                                                                                                                                                                {{ ucfirst($item->nom) }}
                                                                                                                                                                                            </li>
                                                                                                                                                                                        @endforeach
                                                                                                                                                                                    </ol>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    <ol type="a">
                                                                                                                                                                                        @foreach ($commande->produits as $item)
                                                                                                                                                                                            <li>
                                                                                                                                                                                                {{ $item->pivot->quantite }}
                                                                                                                                                                                            </li>
                                                                                                                                                                                        @endforeach
                                                                                                                                                                                    </ol>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    <ol type="a">
                                                                                                                                                                                        @foreach ($commande->produits as $item)
                                                                                                                                                                                            <li>
                                                                                                                                                                                                $ {{ $item->prix }}
                                                                                                                                                                                            </li>
                                                                                                                                                                                        @endforeach
                                                                                                                                                                                    </ol>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    <ul>
                                                                                                                                                                                        @php
                                                                                                                                                                                            $total = 0;
                                                                                                                                                                                            foreach ($commande->produits as $produit) {
                                                                                                                                                                                                $total_commande = (int) $produit->prix * (int) $produit->pivot->quantite;
                                                                                                                                                                                                $total += $total_commande;
                                                                                                                                                                                            }
                                                                                                                                                                                        @endphp
                                                                                                                                                                                        $ {{ $total }}
                                                                                                                                                                                    </ul>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td>
                                                                                                                                                                                    @if ($commande->status === 'En attente' || $commande->status === 'pending')
                                                                                                                                                                                        <span class="badge text-bg-danger">
                                                                                                                                                                                    @elseif ($commande->status === 'En cours')
                                                                                                                                                                                        <span class="badge text-bg-warning">
                                                                                                                                                                                    @elseif($commande->status === 'Livrée')
                                                                                                                                                                                        <span class="badge text-bg-success">
                                                                                                                                                                                    @else
                                                                                                                                                                                        <span class="badge text-bg-danger">
                                                                                                                                                                                    @endif
                                                                                                                                                                                                    {{ $commande->status }}
                                                                                                                                                                                                </span>
                                                                                                                                                                                </td>
                                                                                                                                                                                <td class="date">
                                                                                                                                                                                    {{ $commande->created_at->format('d-m-Y') ?? '-' }}
                                                                                                                                                                                </td>
                                                                                                                                                                            </tr>
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
    @foreach ($commandes as $key => $commande)
        <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-demande_{{ $commande->id }}"
            aria-labelledby="offcanvasRightLabel" style="width: 700px">
            <div class="offcanvas-header px-md-4">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Détails de la commande</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body px-md-4">
                <div class="block-banner-custom mb-2 mb-md-4">
                    <div class="container-fluid px-0">
                        <div class="row align-items-center">
                            <div class="col-lg-2 px-0">
                                <div class="block-name-custom">
                                    {{ 
                                                                    ($commande->prenom_client ? strtoupper($commande->prenom_client[0]) : '') .
            ' ' .
            ($commande->nom_client ? strtoupper($commande->nom_client[0]) : '') 
                                                                }}
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <h5>{{ "$commande->prenom_client $commande->nom_client " }}</h5>
                                <div class="block-items d-flex aling-items-center">
                                    <div class="items">
                                        <i class="fas fa-envelope"></i>
                                        <a href="mailto:{{$commande->email_client}}">
                                            <span>{{ $commande->email_client }}</span>
                                        </a>
                                    </div>
                                    <div class="items">
                                        <i class="fas fa-phone"></i>
                                        <a href="tel:{{$commande->phone_client}}">
                                            <span>{{ $commande->phone_client }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-md-4 px-3">
                    <h6>Liste de produits dans lacommandes </h6>
                </div>
                <div class="px-md-4 px-3">
                    @if ($commande->produits->count() > 0)
                        @foreach ($commande->produits as $item)
                            <div class="bock-lits-demande">
                                <div class="demande">
                                    <div class="row align-items-center">
                                        <div class="col-2 pe-0">
                                            <img src="{{ asset("storage/images/produits/$item->first_image") }}"
                                                alt="{{ $item->nom }}">
                                        </div>
                                        <div class="col-6">
                                            <h5>{{ $item->nom }}</h5>
                                            <p>{{ $item->categorie->libelle }}</p>
                                            <p>Qté : {{ $item->pivot->quantite }}</p>
                                            <p>{{ $item->created_at->format('d-m-Y') }}</p>

                                        </div>
                                        <div class="col-3 ms-auto ps-0">
                                            <input type="hidden" value="{{ $item->id }}">
                                            <div class="input-group">
                                                <input type="text" class="form-control w-75" placeholder="Prix"
                                                    value="{{$item->prix}} " readonly>
                                                <p class="form-control w-25">$</p>
                                            </div>
                                            <p>Total : {{ (int) $item->prix * (int) $item->pivot->quantite }}
                                                $
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Aucun produit dans la commande.</p>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-end p-4">
                @php
                    $total = 0;
                    foreach ($commande->produits as $produit) {
                        $total_commande = (int) $produit->prix * (int) $produit->pivot->quantite;
                        $total += $total_commande;
                    }
                @endphp
                Montant total : <strong> {{ " $total" }} $</strong>
            </div>

            @if ($commande->status === "pending" || $commande->status === "En attente" || $commande->status === "En cours" || $commande->status === "Annulée")
                <div class="block-action-btn d-flex justify-content-center flex-wrap">
                    <form wire:submit.prevent="updateOrderStatus" id="status_form">
                        <input type="hidden" wire:model="commande_id" value="{{$commande->id}}">
                        <input type="hidden" wire:model="commande_status">

                        <div class="d-flex flex-wrap justify-content-center">
                            <button type="button"
                                wire:click="updateOrderStatus('Annulée', {{$commande->id}})"
                                wire:loading.class="disabled" class="btn btn-danger text-white me-2">
                                <span class="buttonload-cancelled-span-{{$commande->id}}">Annuler</span>
                            </button>

                            <button type="button"
                                wire:click="updateOrderStatus('En attente', {{$commande->id}})"
                                wire:loading.class="disabled" class="btn btn-warning text-white me-2">
                                <span class="buttonload-awaiting-span-{{$commande->id}}">Mettre en attente</span>
                            </button>

                            <button type="button"
                                wire:click="updateOrderStatus('En cours', {{$commande->id}})"
                                wire:loading.class="disabled" class="btn btn-warning text-white">
                                <span class="buttonload-pending-span-{{$commande->id}}">Marquer comme en cours de
                                    livraison</span>
                            </button>

                            <button type="button"
                                wire:click="updateOrderStatus('Livrée', {{$commande->id}})"
                                wire:loading.class="disabled" class="btn btn-success text-white mt-2">
                                <span class="buttonload-delivered-span-{{$commande->id}}">Marquer comme livrée</span>
                            </button>
                        </div>
                        <button type="submit" class="d-none" id="submit_form_{{$commande->id}}"></button>
                    </form>
                </div>
            @else
                <div class="block-action-btn d-flex justify-content-end">
                    <p class="btn btn-success">Déjà livrée</p>
                </div>
            @endif
        </div>
    @endforeach
</div>