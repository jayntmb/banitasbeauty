<div class="container">
    <form action="" wire:submit="confirmOrder">
        <div class="row">
            <div class="col-xl-7">
                <div class="card confirm-order">
                    <div class="card-body">
                        <ol class="activity-checkout mb-0 px-4 mt-3">
                            <li class="checkout-item">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-receipt text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-1">Informations de facturation</h5>
                                        <p class="text-muted text-truncate mb-4">Nous avons besoin de quelques
                                            informations
                                            pour continuer</p>
                                        <div class="mb-3">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="billing-name">Prenom et
                                                                Nom*</label>
                                                            <input type="text" name="noms" wire:model="user_data.noms"
                                                                class="form-control"
                                                                id="billing-name"
                                                                placeholder="Entrez votre prénom et votre nom" required>
                                                            @error('user_data.noms')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="billing-email-address">Adresse
                                                                e-mail</label>
                                                            <input type="email" name="email"
                                                                wire:model="user_data.email" class="form-control"
                                                                id="billing-email-address" placeholder="Entrez l'email">
                                                            @error('user_data.email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="billing-phone">Téléphone*</label>
                                                            <input type="text" name="phone" wire:model="user_data.phone"
                                                                class="form-control" id="billing-phone"
                                                                placeholder="Entrez le numéro de téléphone" required>
                                                            @error('user_data.phone')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label">Pays*</label>
                                                            <select class="form-control  form-select"
                                                                wire:model="user_data.country" title="Pays" required>
                                                                <option value="">Sélectionner le pays</option>
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('user_data.country')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="mb-4 mb-lg-0">
                                                            <label class="form-label" for="billing-city">Ville*</label>
                                                            <input type="text" class="form-control"
                                                                wire:model="user_data.city" id="billing-city"
                                                                placeholder="Entrez la ville" required>
                                                            @error('user_data.city')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-truck text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-1">Informations de livraison</h5>
                                        <p class="text-muted text-truncate mb-4">Veuillez indiquer à quelle adresse vous
                                            souhaitez vous faire livrer</p>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div data-bs-toggle="collapse">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="delivery-address">Adresse de
                                                                livraison</label>
                                                            <textarea class="form-control"
                                                                wire:model="user_data.delivery_address"
                                                                id="delivery-address" name="delivery_address" rows="3"
                                                                placeholder="Entrez l'adresse complète"
                                                                required></textarea>
                                                            @error('user_data.delivery_address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="edit-btn bg-light  rounded">
                                                            <a href="#" title="Modifier"
                                                                onclick="event.preventDefault(); document.querySelector('#delivery-address').focus();">
                                                                <i class="bx bx-pencil font-size-16"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="checkout-item">
                                <div class="avatar checkout-icon p-1">
                                    <div class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bxs-wallet-alt text-white font-size-20"></i>
                                    </div>
                                </div>
                                <div class="feed-item-list">
                                    <div>
                                        <h5 class="font-size-16 mb-1">Informations de paiement</h5>
                                        <p class="text-muted text-truncate mb-4">Veuillez indiquer votre moyen de
                                            paiement
                                        </p>
                                    </div>
                                    <div>
                                        <h5 class="font-size-14 mb-3">Méthode de paiement :</h5>
                                        <div class="row">
                                            {{-- <div class="col-lg-3 col-sm-6">
                                                <div data-bs-toggle="collapse">
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="pay-method" id="pay-methodoption1"
                                                            class="card-radio-input">
                                                        <span class="card-radio py-3 text-center text-truncate">
                                                            <i class="bx bx-credit-card d-block h2 mb-3"></i>
                                                            Carte de Crédit / Débit
                                                        </span>
                                                    </label>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="col-lg-3 col-sm-6">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="pay-method" id="pay-methodoption2"
                                                            class="card-radio-input">
                                                        <span class="card-radio py-3 text-center text-truncate">
                                                            <i class="bx bxl-paypal d-block h2 mb-3"></i>
                                                            Paypal
                                                        </span>
                                                    </label>
                                                </div>
                                            </div> --}}

                                            <div class="col">
                                                <div>
                                                    <label class="card-radio-label">
                                                        <input type="radio" name="pay-method" id="pay-methodoption3"
                                                            class="card-radio-input" checked="">

                                                        <span class="card-radio text-center ">
                                                            <i class="bx bx-money d-block h2 mb-3"></i>
                                                            <span>Paiement à la livraison</span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col">
                        <a href="{{ route('boutique') }}" class="btn btn-link text-muted">
                            <i class="mdi mdi-arrow-left me-1"></i> Continuer les achats </a>
                    </div> <!-- end col -->
                    <div class="col">
                        <div class="text-end mt-2 mt-sm-0">
                            <button type="submit" class="btn btn-success" {{ count($commandes) == 0 ? 'disabled' : '' }}>
                                <i class="mdi mdi-cart-outline me-1"></i>
                                Procéder
                            </button>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row-->
            </div>
            <div class="col-xl-5">
                <div class="card checkout-order-summary confirm-order">
                    <div class="card-body">
                        <div class="p-3 bg-light mb-3">
                            <h5 class="font-size-16 mb-0">Résumé de la commande
                            </h5>
                        </div>
                        <div class="table-responsive">
                            @if (count($commandes) > 0)
                                <table class="table table-centered mb-0 table-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0" style="width: 110px;" scope="col">Produit</th>
                                            <th class="border-top-0" scope="col">Description du produit</th>
                                            <th class="border-top-0" scope="col">Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commandes as $commande)
                                            <tr>
                                                <th scope="row">
                                                    <img src="{{ asset('storage/images/produits/' . $commande['details']['first_image'])}}"
                                                        alt="product-img" title="product-img" class="avatar-lg rounded">
                                                </th>
                                                <td>
                                                    <h5 class="font-size-16 text-truncate">
                                                        <a href="#" class="text-dark">
                                                            {{ $commande['details']['nom'] }}
                                                        </a>
                                                    </h5>
                                                    @livewire('product-rating', ['productId' => $commande['id']])
                                                    <p class="text-muted mb-0 mt-1">$ {{ $commande['details']['prix'] }} x
                                                        {{ $commande['quantite'] }}
                                                    </p>
                                                </td>
                                                <td>$ {{ $commande['details']['prix'] * $commande['quantite'] }}</td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Sous-total :</h5>
                                            </td>
                                            <td>
                                                $ {{ $total_amount }}
                                            </td>
                                        </tr> --}}
                                        {{-- <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Remise :</h5>
                                            </td>
                                            <td>
                                                - $ 78
                                            </td>
                                        </tr> --}}

                                        {{-- <tr>
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Frais de livraison :</h5>
                                            </td>
                                            <td>
                                                $ 25
                                            </td>
                                        </tr> --}}

                                        <tr class="bg-light">
                                            <td colspan="2">
                                                <h5 class="font-size-14 m-0">Total :</h5>
                                            </td>
                                            <td>
                                                $ {{ $total_amount }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <span>Vous n'avez ajouté aucun produit à votre panier pour l'instant.</span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </form>
</div>