<div class="block-promo-lg">
    <div class="container-fluid px-lg-0">
        <div class="row g-lg-0 g-3">
            <div class="col-lg-6 ps-lg-0">
                <div class="card card-img">
                    <div class="bundel">
                        Les nouveautés
                    </div>
                    <img src="{{ asset('assets/images/produits/' . $block_promo_display->image) }}" alt="image du produit en promotion"
                        class="w-100 h-100 object-fit-cover">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-text h-100 d-flex flex-column">
                    <div class="my-auto">
                        <a href="{{ route('produit.show', $block_promo_display->produit_id) }}">
                            <h2 class="text-lg mb-lg-4 mb-3 fw-bold" style="font-family: 'Courier New', Courier, monospace">
                                {{ $block_promo_display->product_name }}
                            </h2>
                        </a>
                        <p class="paragraph-lg mb-lg-5 mb-4">
                            {{ $block_promo_display->description }}
                        </p>
                        <a href="{{ route('panier.store', ['id' => $block_promo_display->produit_id, 'quantite' => 1]) }}"
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
