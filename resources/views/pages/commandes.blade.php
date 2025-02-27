@extends('layouts.master', ['showNavPage' => true])

@section('content')
    <div class="global-div">
        <div class="wrapper" style="margin-top: 120px;">
            <div class="container">
                <div class="row">
                    @if ($commandes->count() == 0)
                        <div class="text-center py-5">
                            <i class="fas fa-search fa-3x mb-3"></i>
                            <p>Vous n'avez passé aucune commande pour l'instant. </p>
                            <p>Explorez nos produits et commandez ce qui vous intéresse</p>
                            <a class="btn btn-primary" href="{{ route('boutique') }}">
                                Explorez nos produits
                            </a>
                        </div>
                    @else
                        @foreach ($commandes as $key => $commande)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-lg ">
                                    <div class="card-header {{ $commande->status == 'Livrée' ? 'bg-success text-white' : 'bg-light text-black' }}">
                                        Commande #{{ $key + 1 }}
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-group list-group-flush">
                                            @php
                                                $total_amount = 0 ;
                                                foreach ($commande->produits as $key => $produit) {
                                                    $total = (int) $produit->prix * (int) $produit->pivot->quantite ;
                                                    $total_amount += $total;
                                                }
                                            @endphp
                                            @foreach ($commande->produits as $item)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h6 class="mb-0">{{ ucfirst($item->nom) }}</h6>
                                                        <small class="text-muted">Quantité: {{ $item->pivot->quantite }}</small>
                                                    </div>
                                                    <span class="badge bg-light text-black rounded-pill">${{ $item->prix }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted">Total: $ {{ $total_amount }}</span>
                                            <span class="badge 
                                                    @if ($commande->status === 'En attente' || $commande->status === 'pending')
                                                        bg-danger
                                                    @elseif ($commande->status === 'En cours')
                                                        bg-warning
                                                    @elseif($commande->status === 'Livrée')
                                                        bg-success
                                                    @else
                                                        bg-danger
                                                    @endif">
                                                {{ $commande->status }}
                                            </span>
                                        </div>
                                        <small class="text-muted">Date: {{ $commande->created_at->format('d-m-Y') ?? '-' }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection