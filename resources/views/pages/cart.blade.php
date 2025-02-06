@extends('layouts.master', ['contentSearchBar' => false])

@section('style')
@endsection

@section('body')
<div class="banner-sm" id="home">
    <img src="{{ asset('assets/images/img-pill.png') }}" alt="" class="img-pill">
    <div class="container">
        <h1 class="fadeUp wow animate__animated animate__fadeIn">Panier</h1>
    </div>

</div>
<div class="content-panier">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-9">
                @if ($mypaniers->where('user_id', Auth::user()->id)->count() == 0)
                    <div class="card card-product-cart">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <h3>Panier vide !</h3>
                                <p>Votre panier est vide pour l'instant !</p>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach ($mypaniers as $panier)
                    <div class="card card-product-cart">
                        <div class="row align-items-start align-items-lg-center align-items-sm-center">
                            <div class="col-lg-2 col-4 col-sm-2">
                                <div class="img-product">
                                    <a href="{{ route('detal-product', [$panier->produit->id]) }}">
                                        <img src="{{ asset('storage/images/produits/' . $panier->produit->image) }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-8 col-sm-10">
                                <div class="row g-3">
                                    <div class="col-lg-4 col-sm-4">
                                        <a href="{{ route('detal-product', [$panier->produit->id]) }}">
                                            <h5>{{ $panier->produit->nom }}</h5>
                                        </a>
                                        <a
                                            href="{{ route('produits.categorie', [$panier->produit->categorie->libelle, $panier->produit->categorie->id]) }}">
                                            <p>{{ $panier->produit->categorie->libelle }}</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4">
                                        <div
                                            class="d-flex justify-content-start justify-content-lg-center align-items-center">
                                            {{-- <form method="post" action="{{ route('panier.update.product') }}"> --}}
                                                {{-- @csrf --}}
                                                {{-- <button class="btn">-</button> --}}
                                                <input type="hidden" name="produit_id" value="{{$panier->produit_id}}" />
                                                <input type="hidden" name="panier_id" value="{{$panier->id}}" />
                                                {{-- <div class="block-quantity d-flex align-items-center"> --}}
                                                    <input type="hidden" name="user_id" class="form-control"
                                                        value="{{ Auth::user()->id ?? '' }}">
                                                    @livewire('panier', ['panier' => $panier])
                                                    {{--
                                                </div> --}}
                                                {{--
                                            </form> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-start text-lg-center col-sm-4">
                                        <a href="{{ route('panier.delete', [$panier->produit->id]) }}"
                                            class="btn btn-delete ps-0">Supprimer</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
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
    </div>
</div>
@endsection

@section('css')
@endsection

@section('script')
{{--
<script>
    const input_value = $('.form-control').attr('value');
    btnplus = document.querySelector(".btn-plus");
    btnplus = document.querySelector(".btn-moins");
    console.log(input_value);
    btnplus.addEventListener("click", () => {
        alert("coucou")
        input_value++
    })
</script> --}}
@endsection
