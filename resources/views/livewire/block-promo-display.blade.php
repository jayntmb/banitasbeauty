<div class="{{ $block_promo_display ? '' : 'block-promo-lg' }}">
    @if ($block_promo_display)
        <div class="container-fluid px-lg-0">
            <div class="row g-lg-0 g-3">
                <div class="col-lg-6 ps-lg-0">
                    <div class="card card-img">
                        <div class="bundel">
                            Les nouveautés
                        </div>
                        <img src="{{ asset('storage/images/block_promo/' . $block_promo_display->image) }}"
                            alt="image du produit en promotion" class="w-100 h-100 object-fit-cover">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-text h-100 d-flex flex-column">
                        <div class="my-auto">
                            <a href="{{ route('produit.show', $block_promo_display->produit_id) }}">
                                <h2 class="text-lg mb-lg-4 mb-3 fw-bold"
                                    style="font-family: 'Courier New', Courier, monospace">
                                    {{ $block_promo_display->product_name }}
                                </h2>
                            </a>
                            <p class="paragraph-lg mb-lg-5 mb-4">
                                {{ $block_promo_display->description }}
                            </p>
                            @livewire('add-to-cart-button', ['produitId' => $block_promo_display->produit_id], key($block_promo_display->produit_id))
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
