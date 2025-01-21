<div class="block-promo-lg">
    @php
        $popularProduct = $produits->first();
    @endphp
    <div class="container-fluid px-lg-0">
        <div class="row g-lg-0 g-3">
            <div class="col-lg-6 ps-lg-0">
                <div class="card card-img">
                    <div class="bundel">
                        Les nouveautés
                    </div>
                    <img src="{{ asset('assets/images/produits/' . $popularProduct->first_image) }}" alt="image de promotion"
                        class="w-100 h-100 object-fit-cover">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-text h-100 d-flex flex-column">
                    <div class="my-auto">
                        <a href="{{ route('produit.show', $popularProduct->id) }}">
                            <h2 class="text-lg mb-lg-4 mb-3">
                                {{ $popularProduct->nom }}
                            </h2>
                        </a>
                        <p class="paragraph-lg mb-lg-5 mb-4">
                            Découvrez la magie de <span>{{ $popularProduct->nom }} </span> notre liner sourcils
                            waterproof haute précision. Sa formule longue tenue et
                            son applicateur ultra-fin vous permettent de dessiner et structurer vos sourcils avec une
                            précision professionnelle. Résistant à l'eau et à la transpiration, il reste impeccable
                            toute la journée pour un regard parfaitement défini. Sublimez vos sourcils en toute
                            simplicité !.
                        </p>
                        <a href="{{ route('panier.store', ['id' => $popularProduct->id, 'quantite' => 1]) }}"
                            class="btn btn-lg btn-primary" onmouseover="this.style.backgroundColor='white'"
                            onmouseout="this.style.backgroundColor=''">
                            Ajouter au panier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
