<div class="offcanvas offcanvas-end offcanvas-cart" tabindex="-1" id="offcanvasCart"
    aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="mb-0">VOTRE PANIER</h5>
        <span style="font-size: 0.85em" class="cart-count">{{ count($cart) }} produits</span>
        <button type="button" class="btn-close tooltip-hover" data-bs-dismiss="offcanvas" data-position-tooltip="right"
            aria-label="Close">
            <i class="bi bi-x-lg"></i>
            <span class="tooltip-indicator sm">Fermer</span>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="all-article-cart-sm">
            @foreach ($cart as $item)
                <div class="card card-article-card-sm cart-item" data-id="{{$item['id']}}">
                    <div class="content-card">
                        <div class="row g-2 g-lg-3">
                            <div class="col-3">
                                <div class="img-article">
                                    <img src="{{ asset('storage/images/produits/' . $item['details']['first_image']) }}"
                                        class="w-100" alt="{{ $item['details']['nom'] }}">
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="info-article-cart d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-2">
                                        <h6 class="mb-0 name-article">
                                            {{ $item['details']['nom'] }}
                                        </h6>
                                        <a href="#" class="btn-trash ms-auto tooltip-hover remove-btn"
                                            data-position-tooltip="right" data-id="{{ $item['id'] }}">
                                            <i class="bi bi-trash"></i>
                                            <span class="tooltip-indicator sm">Retirer</span>
                                        </a>
                                    </div>
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center block-content-quantity sm">
                                            <button class="btn decrement-btn">
                                                <i class="bi bi-dash"></i>
                                            </button>
                                            <input type="text" class="form-control quantity-input" minlength="1"
                                                value="{{ $item['quantite'] }}" data-id="{{ $item['id'] }}">
                                            <button class="btn increment-btn">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="price">
                                        {{ $item['details']['prix'] }}$
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="offcanvas-footer">
        <div class="d-flex align-items-center block-total">
            <h6>Total:</h6>
            <div class="total-price ms-auto">
                {{ $total }}$
            </div>
        </div>
        <div class="d-flex">
            <a href="/panier" class="btn w-50 btn-default d-flex align-items-center justify-content-center">
                Voir le panier
            </a>
            <a href="#" class="btn w-50 btn-default d-flex align-items-center justify-content-center">
                Check out
            </a>
        </div>
    </div>
</div>

@script
<script>
    $wire.on('cartUpdated', () => {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        Toast.fire({
            icon: 'success',
            title: 'Panier mis à jour avec succès !'
        });
    });
</script>
@endscript
