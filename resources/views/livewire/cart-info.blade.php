<div>
    <div class="col-lg-3">
        <div class="card card-check">
            <h4>Récaptulatif de votre commande</h4>
            <div class="block-quantity d-flex align-items-center justify-content-between">
                <h5>Nombre des articles</h5>
                <p>{{ Auth::user()->paniers->count() }}</p>
            </div>
            <div class="block-quantity d-flex align-items-center justify-content-between">
                <h5>Quantité totale</h5>
                <p>{{ session()->get('panier_count_total') }}</p>
            </div>
            @if ($mypaniers->where('user_id', Auth::user()->id)->count() == 0)
                <a href="{{ route('produits') }}" class="btn">Voir les produits</a>
            @else
                <a href="{{ route('panier.valide') }}" class="btn">Demander un devis</a>
            @endif
        </div>
    </div>
</div>
