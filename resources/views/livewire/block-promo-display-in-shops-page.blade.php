<div class="block-promo-lg pb-0 reverse">
    <div class="container-fluid px-lg-0">
        <div class="row g-lg-0 g-3">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="content-text h-100 d-flex flex-column">
                    <div class="my-auto">
                        <h2 class="text-lg mb-lg-4 mb-3">
                            {{ $block_promo_display->product_name }}
                        </h2>
                        <p class="paragraph-lg mb-lg-5 mb-4">
                            {{ $block_promo_display->description }}
                        </p>
                        @livewire('add-to-cart-button', ['produitId' => $block_promo_display->produit_id], key($block_promo_display->produit_id))
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pe-lg-0 order-1 order-lg-2">
                <div class="card card-img">
                    <img src="{{ asset('storage/images/block_promo/' . $block_promo_display->image) }}" alt="image de promotion"
                        class="w-100 h-100 object-fit-cover">
                </div>
            </div>
        </div>
    </div>
</div>
