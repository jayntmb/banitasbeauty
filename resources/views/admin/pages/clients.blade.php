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
                        <h2>Clients</h2>
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
                            <div class="card wow mb-6 card-table">
                                <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nom complet</th>
                                                            <th scope="col">Date de création de compte</th>
                                                            <th scope="col">Statut</th>
                                                            <th scope="col">Etat du compte</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($clients as $key => $user)
                                                            <tr>
                                                                <td data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">{{ $key + 1 }}</td>
                                                                <td data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="block-name">
                                                                            {{ 
                                                                                ($user->nom ? strtoupper($user->nom[0]) : '') . 
                                                                                ' ' . 
                                                                                ($user->prenom ? strtoupper($user->prenom[0]) : '') 
                                                                            }}
                                                                        </div>
                                                                        <div class="name d-flex" style="flex-direction: column">
                                                                            <span>
                                                                                {{ "$user->nom $user->postnom $user->prenom" }}</span>
                                                                            <span class="email-user">
                                                                                {{ $user->email }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="date" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">
                                                                    {{ $user->created_at->format('d-m-Y') }}
                                                                </td>
                                                                <td class="date" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">
                                                                    <span
                                                                        class="badge {{ Cache::has("user-is-online-$user->id") ? 'active' : 'unactive' }}">
                                                                        {{ Cache::has("user-is-online-$user->id") ? 'En ligne' : 'Déconnecté(e)' }}
                                                                    </span>
                                                                </td>
                                                                <td class="date" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#offcanvas-client_{{ $key }}"
                                                                    aria-controls="offcanvasRight">
                                                                    <span
                                                                        class="badge {{ $user->statut_id == 1 ? 'active' : 'unactive' }}">
                                                                        {{ $user->statut_id == 1 ? 'Activé' : 'Désactivé' }}
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
    @foreach ($clients as $key => $user)
        <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-client_{{ $key }}"
            aria-labelledby="offcanvasRightLabel" style="width: 700px">
            <div class="offcanvas-header px-md-4">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">Detail du client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body px-md-4">
                <div class="block-banner-custom mb-2 mb-md-4">
                    <div class="block-switch">
                        @if ($user->status_id == 1) <!-- l'id 1 correspond au Statut active -->
                            <a href="{{ route('admin.clients.activation', $user->id) }}" class="btn btn-off btn-action">
                                <i class="fas fa-power-off"></i>
                            </a>
                        @else
                            <a href="{{ route('admin.clients.activation', $user->id) }}" class="btn btn-on btn-action">
                                <i class="fas fa-power-off"></i>
                            </a>
                        @endif
                    </div>

                    <div class="container-fluid px-0">
                        <div class="row align-items-center g-3">
                            <div class="col-lg-2 px-0">
                                <div class="block-name-custom">
                                    {{ 
                                        ($user->nom ? strtoupper($user->nom[0]) : '') . 
                                        ' ' . 
                                        ($user->prenom ? strtoupper($user->prenom[0]) : '') 
                                    }}
                                </div>
                            </div>
                            <div class="col-lg-8 ps-0">
                                <h5>{{ $user->nom }} <span
                                        class="badge {{ $user->statut_id == 1 ? 'active' : 'unactive' }}">{{ $user->statut_id == 1 ? 'Activé' : 'Désactivé' }}</span>
                                </h5>
                                <div class="block-items d-flex aling-items-center flex-wrap">
                                    <div class="items">
                                        <a href="mailto:{{$user->email}}">
                                            <i class="fas fa-envelope"></i>
                                            <span>{{ $user->email }}</span>
                                        </a>
                                    </div>
                                    @if ($user->phone)
                                        <div class="items">
                                            <a href="tel:{{$user->phone}}">
                                                <i class="fas fa-phone"></i>
                                                <span>{{ $user->phone }}</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h6>Commandes récentes</h6>
                    <div class="block-all-activ">
                        @if ($user->commandes->count() > 0)
                            <table class="table table-devis-prog" style="width: 100%; overflow-x: scroll;">
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
                                    @foreach ($user->commandes as $key => $commande)
                                        <tr id="{{$commande->id}}" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvas-demande_{{ $commande->id }}" aria-controls="offcanvasRight">
                                            <td>
                                                {{ $key + 1 }}
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{asset('assets/admin/images/avatar.jpg')}}" alt="">
                                                    <div class="name d-flex" style="flex-direction: column">
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
                        @else
                            <p>Le client n'a passé aucune commande de produit pour l'instant.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @foreach ($user->commandes as $key => $commande)
            <div class="offcanvas  offcanvas-end" tabindex="-1" id="offcanvas-demande_{{ $commande->id }}"
                aria-labelledby="offcanvasRightLabel" style="width: 700px">
                <form action="{{ route('admin.commande.update') }}" method="POST" class="devis">
                    @csrf
                    @method('PUT')
                    <div class="offcanvas-header px-md-4">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel">Détails de la commande</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body px-md-4">
                        <div class="block-banner-custom mb-2 mb-md-4">
                            <div class="container-fluid px-0">
                                <div class="row align-items-center">
                                    <div class="col">
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
                                    <div class="col-6">
                                        <span style="font-size: x-medium;">Passée {{ $item->created_at->diffForHumans() }}</span>
                                    </div>

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
                            <form action="{{ route('admin.commande.update') }}" method="post" id="status_form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$commande->id}}" name="commande_id">
                                <input type="hidden" id="commande_status_{{$commande->id}}" name="commande_status" value="">

                                <button type="button"
                                    onclick="updateStatus('Annulée', {{$commande->id}}); showLoading('.buttonload-cancelled', {{$commande->id}});"
                                    class="btn btn-danger text-white me-2">
                                    <i class="fa fa-refresh fa-spin buttonload-cancelled-{{$commande->id}} d-none"></i>
                                    <span class="buttonload-cancelled-span-{{$commande->id}}">Annuler</span>
                                </button>

                                <button type="button"
                                    onclick="updateStatus('En attente', {{$commande->id}}); showLoading('.buttonload-awaiting', {{$commande->id}});"
                                    class="btn btn-warning text-white me-2">
                                    <i class="fa fa-refresh fa-spin buttonload-awaiting-{{$commande->id}} d-none"></i>
                                    <span class="buttonload-awaiting-span-{{$commande->id}}">Mettre en attente</span>
                                </button>

                                <button type="button"
                                    onclick="updateStatus('En cours', {{$commande->id}}); showLoading('.buttonload-pending', {{$commande->id}});"
                                    class="btn btn-warning text-white">
                                    <i class="fa fa-refresh fa-spin buttonload-pending-{{$commande->id}} d-none"></i>
                                    <span class="buttonload-pending-span-{{$commande->id}}">Marquer comme en cours de livraison</span>
                                </button>

                                <button type="button"
                                    onclick="updateStatus('Livrée', {{$commande->id}}); showLoading('.buttonload-delivered', {{$commande->id}});"
                                    class="btn btn-success text-white mt-2">
                                    <i class="fa fa-refresh fa-spin buttonload-delivered-{{$commande->id}} d-none"></i>
                                    <span class="buttonload-delivered-span-{{$commande->id}}">Marquer comme livrée</span>
                                </button>

                                <button type="submit" class="d-none" id="submit_form_{{$commande->id}}"></button>
                            </form>
                        </div>
                    @else
                        <div class="block-action-btn d-flex justify-content-end">
                            <p class="btn btn-success">Déjà livrée</p>
                        </div>
                    @endif
                </form>
            </div>
        @endforeach
    @endforeach
@endsection
@push('scripts')
    <script>
        function updateStatus(status, formId) {
            // Met à jour la valeur du champ caché avec le statut du bouton cliqué
            document.getElementById('commande_status_' + formId).value = status;

            // Déclenche l'envoi du formulaire après avoir mis à jour le statut
            document.getElementById('submit_form_' + formId).click();
        }

        function showLoading(buttonClass, orderId) {
            // Affiche l'icône de chargement et change le style du bouton
            document.querySelector(buttonClass + '-' + orderId).classList.remove('d-none');
            document.querySelector(buttonClass + '-span-' + orderId).classList.add('d-none');
        }
    </script>
@endpush