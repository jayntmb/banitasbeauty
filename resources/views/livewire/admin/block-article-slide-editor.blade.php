<div>
    <!-- Bouton pour ouvrir la modale -->
    <a href="#" wire:click.prevent="openModal" class="card-link text-decoration-none">
        <div class="card h-100 shadow-lg">
            <div class="card-body text-center">
                <i class="fas fa-edit fa-3x mb-3 text-primary"></i>
                <h5 class="card-title">Bloc de Promotions et Arrivage</h5>
                <p class="card-text text-dark">
                    <i class="fas fa-edit"></i> Mettre les produits en promotion.
                </p>
            </div>
        </div>
    </a>

    <style>
        .image-container {
            position: relative;
            display: inline-block;
        }

        .close-button {
            position: absolute;
            top: -18px;
            right: -8px;
            background: transparent;
            border: none;
            cursor: pointer;
            font-size: 50px;
            transition: color 0.3s;
        }

        .close-button:hover {
            color: red;
            /* Change la couleur du bouton au survol */
        }
    </style>

    <!-- Modale -->
    @if ($showModal)
        <div class="modal-backdrop fade show"></div>
        <div class="modal fade show d-block" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-green text-white">
                        <h5 class="modal-title">Modifier les produits en promo et les arrivages</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex gap-4">
                            <div class="d-flex gap-1">
                                <label for="promo" class="btn btn-primary text-white">Les prduits en promotion</label>
                                <input type="checkbox" hidden name="" wire:change="displayFormPromo" id="promo">
                            </div>
                            <div class="d-flex gap-1">
                                <label for="arrivage" class="btn btn-dark text-light">Les arrivages</label>
                                <input type="checkbox" name="" hidden wire:change="displayFormArrivage" id="arrivage">
                            </div>
                        </div>

                        <form wire:submit.prevent="updateBlockPromos">
                            <!-- For promotion -->
                            @if ($forPromo)
                                <!-- product_name -->
                                <div class="form-group my-2">
                                    <label for="searchProduct">Ajouter un produit</label>
                                    <input type="text" id="searchProduct" wire:model.live="searchTerm" class="form-control"
                                        placeholder="Saisissez le nom du produit...">

                                    @if (!empty($searchResults))
                                        <ul class="list-group mt-2 z-3 bg-white rounded-md text-dark">
                                            @foreach ($searchResults as $product)
                                                <li class="list-group-item cursor-pointer hover:bg-secondary list-group-item-action text-dark"
                                                    wire:click="selectPromoProduct({{ $product->id }})">
                                                    {{ $product->nom }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($promoImages)
                                    <div class="mb-4 d-flex justify-content-center flex-wrap gap-3">
                                        @foreach (array_unique($promoImages) as $product_name => $image)
                                            <!-- Aperçu des images -->
                                            <div class="image-container">
                                                <button type="button" class="close-button" aria-label="Close"
                                                    wire:click="removeProduct('{{ $product_name }}', 'fromPromo')">&times;</button>
                                                <img src="{{ asset('assets/images/produits/' . $image) }}" alt="Image actuelle" class="img-fluid mt-2"
                                                    style="width: 250px; height: 260px;"><br>
                                                <span>{{ $product_name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endif

                            <!-- For arrivage -->
                            @if ($forArrivage)
                                <!-- product_name -->
                                <div class="form-group my-2">
                                    <label for="searchProduct">Marquer un produit comne arrivage</label>
                                    <input type="text" id="searchProduct" wire:model.live="searchTerm" class="form-control"
                                        placeholder="Rechercher un produit...">

                                    @if (!empty($searchResults))
                                        <ul class="list-group mt-2 z-3 bg-white rounded-md text-dark">
                                            @foreach ($searchResults as $product)
                                                <li class="list-group-item cursor-pointer list-group-item-action text-dark"
                                                    wire:click="selectArrivageProduct({{ $product->id }})">
                                                    {{ $product->nom }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($arrivageImages)
                                    <div class="mb-4 d-flex justify-content-center flex-wrap gap-3">
                                        @foreach (array_unique($arrivageImages) as $arrivage_name => $image)
                                            <!-- Aperçu des images -->
                                            <div class="image-container">
                                                <button type="button" class="close-button" aria-label="Close"
                                                    wire:click="removeProduct('{{ $arrivage_name }}', 'fromArrivage')">&times;</button>
                                                <img src="{{ asset('assets/images/produits/' . $image) }}" alt="Image actuelle" class="img-fluid mt-2"
                                                    style="width: 250px; height: 260px;"><br>
                                                <span>{{ $arrivage_name }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endif

                            <!-- Bouton de soumission -->
                            @if ($forPromo || $forArrivage)
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg" wire:loading.attr="disabled">
                                        <span>
                                            <i class="fas fa-save me-2"></i> Enregistrer
                                        </span>
                                        <span wire:loading>
                                            <i class="fas fa-spinner fa-spin me-2"></i>
                                        </span>
                                    </button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
