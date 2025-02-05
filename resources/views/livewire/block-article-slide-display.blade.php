<div class="block-article-slide">
    <div class="container-fluid px-lg-0 ">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <h2 class="title mb-lg-3">
                    Nos meilleures ventes
                </h2>
                <p class="paragraph mb-lg-5">
                    Nos best-sellers sont là pour vous offrir le meilleur de Banila's Beauty
                </p>
            </div>
            <div class="col-lg-12 px-lg-0">
                <div class="content-card-articles d-flex align-items-center">
                    @if ($produits->count() == 0)
                        <div class="alert alert-warning text-center mx-auto">
                            Aucun produit n'est mis en promotion pour le moment
                        </div>
                    @else
                        @foreach ($produits->unique() as $produit)
                            <div class="card card-article">
                                <div class="card-img">
                                    <div class="bundel">
                                        Meilleure vente
                                    </div>
                                    <a href="" onclick="addToWishList(event, {{ $produit->id }})"
                                        class="like tooltip-hover" data-position-tooltip="right">
                                        <svg viewBox="0 0 24 24" width="512" height="512">
                                            <path
                                                d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z" />
                                        </svg>
                                        <span class="tooltip-indicator sm">Ajouter aux favoris</span>
                                    </a>
                                    <a href="{{ route('produit.show', $produit->id) }}">
                                        <img src="{{ asset('storage/images/produits/' . $produit->first_image) }}"
                                            alt="{{ $produit->nom }}">
                                    </a>
                                </div>
                                <div class="content-text mt-2 mt-lg-2">
                                    <div class="face">
                                        <a href="{{ route('produit.show', $produit->id) }}">
                                            <h3 class="mb-lg-2">{{ $produit->nom }}</h3>
                                        </a>
                                        @php
                                            $averageRating = $produit->averageRating();
                                        @endphp
                                        <div class="d-flex align-items-center gap-2 block-rate mb-lg-2 mb-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i
                                                    class="bi bi-star-fill {{ $i <= $averageRating ? 'active' : '' }}"></i>
                                            @endfor
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="price">
                                                {{ $produit->prix }}$
                                            </div>
                                            <a href="{{ route('panier.store', ['id' => $produit->id, 'quantite' => 1]) }}"
                                                class="btn btn-primary btn-default ms-auto disabled opacity-0">
                                                Ajouter au panier
                                            </a>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <a href="{{ route('produit.show', $produit->id) }}">
                                            <h3 class="mb-lg-2">{{ $produit->nom }}</h3>
                                        </a>
                                        <div class="d-flex align-items-center mb-2 mb-lg-2">
                                            <div class="block-colors d-flex align-items-center gap-2">
                                                <div class="bubble-color" style="--data-bg: #d47755">
                                                    <input type="radio" name="radio-color-1">
                                                    <div class="circle-active"></div>
                                                </div>
                                                <div class="bubble-color" style="--data-bg: #ff96b5">
                                                    <input type="radio" name="radio-color-1">
                                                    <div class="circle-active"></div>
                                                </div>
                                            </div>
                                            <div class="price ms-auto">
                                                {{ $produit->prix }}$
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ">
                                            <a href="{{ route('panier.store', ['id' => $produit->id, 'quantite' => 1]) }}"
                                                class="btn btn-primary btn-default">
                                                Ajouter au panier
                                            </a>
                                            <div class="d-flex block-rate align-items-center gap-2 ms-auto">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="bi bi-star-fill {{ $i <= $averageRating ? 'active' : '' }}"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="text-center mt-lg-5 mt-4">
                    <a href="/boutique" class="btn btn-lg btn-primary">
                        Voir tous les produits
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
